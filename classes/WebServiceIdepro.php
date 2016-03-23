<?php
require_once ('lib/nusoap.php');
class WebServiceIdepro {
    private
        $wsdl,
        $operation,
        $namespace,
        $soapAction,
        $error_ws = true,
        $error = true,
        $response = null
        ;
    public $message = '';

    public function __construct () {
        //$this->wsdl = 'http://172.20.0.1:8080/service/sa/Servicesa.asmx?wsdl';
		$this->wsdl = 'http://172.20.0.1/service/sa/ServiceSA.asmx?wsdl';
        $this->operation = 'ConsultaCliente';
        $this->namespace = 'http://schemas.xmlsoap.org/soap/envelope/';
        $this->soapAction = 'http://tempuri.org/ConsultaCliente';
    }

    public function webServiceConnect ($ci) {
        $soapClient = new nusoap_client($this->wsdl, true);

        $this->error_ws = $soapClient->getError();

        if (empty($this->error_ws)) {
            $params = array(
                'usuario' => 'SudaClieUser',
                'clave' => 'idepsudaclie99547',
                'documentoIdentidad' => $ci);

            $this->response = $soapClient->call($this->operation, $params);

            $this->error = $soapClient->getError();

            if (empty($this->error)) {
                return true;
            } else {
                $this->message = 'Error. No se puede conectar al Web Service!';
                return false;
            }
        } else {
            $this->message = 'No se puede conectar al Web Service!';
            return false;
        }
    }

    public function getResult() {
        if (is_array($this->response) === true) {
            if (is_array($this->response['ConsultaClienteResult']) === true) {
                $data_client = $this->response['ConsultaClienteResult']['Cliente'];

                foreach ($data_client as $key => $value) {
                    $data_client[$key] = trim($data_client[$key]);
                }

                $data = array();
                $data['cl_codigo'] = $data_client['CodigoCliente'];
                $data['cl_nombre'] = $data_client['Nombres'];
                $data['cl_paterno'] = $data_client['ApellidoPaterno'];
                $data['cl_materno'] = $data_client['ApellidoMaterno'];
                $data['cl_ap_casada'] = '';
                if (array_key_exists('ApellidoCasada', $data_client) === true) {
                    $data['cl_ap_casada'] = $data_client['ApellidoCasada'];
                }
                $data['cl_ci'] = $data_client['CarnetIdentidad'];
                $data['cl_extension'] = $data_client['Expedido'];
                $data['cl_complemento'] = $data_client['Complemento'];
                $data['cl_genero'] = $data_client['Sexo'];
                switch ($data['cl_genero']) {
                    case 1: $data['cl_genero'] = 'M';  break;
                    case 2: $data['cl_genero'] = 'F'; break;
                }
                $data['cl_tel_domicilio'] = '';
                if (array_key_exists('TelefonoDomicilio', $data_client) === true) {
                    $data['cl_tel_domicilio'] = $data_client['TelefonoDomicilio'];
                }
                $data['cl_celular'] = $data_client['Celular'];
                if (empty($data['cl_tel_domicilio']) === true && empty($data['cl_celular']) === false) {
                    $data['cl_tel_domicilio'] = $data['cl_celular'];
                    $data['cl_celular'] = '';
                }
                $data['cl_estado_civil'] = $data_client['EstadoCivil'];
                switch ($data['cl_estado_civil']) {
                    case 'CASADO(A)': $data['cl_estado_civil'] = 'CAS';  break;
                    case 'SOLTERO(A)': $data['cl_estado_civil'] = 'SOL'; break;
                    case 'VIUDA': $data['cl_estado_civil'] = 'VIU'; break;
                }
                $data['cl_nombre_completo'] = $data_client['NombreCompleto'];
                $data['cl_saldo'] = $data_client['SaldoBs'];
                if (empty($data['cl_saldo']) === true) {
                    $data['cl_saldo'] = 0;
                }
                $caedec = explode('.', $data_client['Caedec']);
                $data['cl_caedec'] = $caedec[0];
                $data['cl_caedec_desc'] = $data_client['DescripcionCaedec'];
                $data['cl_direccion'] = $data_client['DireccionDomicilio'];
                $date = $data_client['FechaNacimiento'];
                $data['cl_fecha_nacimiento'] = date('Y-m-d', strtotime(str_replace('/', '-', $date)));

                return $data;
            } else {
                $this->message = 'El Titular no existe!';
                return $this->message;
            }
        } else {
            $this->message = 'No existen datos.';
            return $this->message;
        }
    }


} 