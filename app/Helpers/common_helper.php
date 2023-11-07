<?php

    function gg_response( $code, $data = [], $type = 'json' ){

        $response = \Config\Services::response();

        $response->setStatusCode($code);

        switch( $type ){
            case 'json':
                $response->setJSON($data);
                break;
            case 'xml':
                $response->setXML($data);
                break;
            case 'html':
                $response->setBody($data);
                break;
            default:    
                $response->setBody($data);
                break;
        }

        $response->send();
        die();

    }

    function gg_die( $msg ){
        $response = \Config\Services::response();

        $response->setStatusCode(401)->setJson(array("msg" => $msg))->send();
        die();
    }

    function ifEmpty( $data, $msg = null ){

        if( $msg == null ){
            $msg = "No se encontraron registros";
        }

        if( empty($data) ){
            $json = array(
                "msg" => $msg
            );
            gg_response(400, $json);
        }

    }

    function getTokenData(){
        
        // Obtiene el token de la cabecera
        $request = service('request');
        $token = $request->getServer('HTTP_AUTHORIZATION');

        // Valida que el token no esté vacío y que comience con la palabra "Bearer "
        if ( empty($token) || !str_starts_with($token, 'Bearer ') ) {
            return false;
        }

        // Obtiene el bearer token del encabezado, quitando la palabra "Bearer " del inicio
        $bearerToken = str_replace('Bearer ', '', $token);
        
        // Usa el encrypter de CI4 para decodificar el token. hace un try catch del decrypt. Si falla, devuelve un error
        try {
            $tokenData = \Config\Services::encrypter()->decrypt($bearerToken);
        } catch (\Exception $e) {
            return false;
        }

        // Valida que el token decodificado sea un json_encoded en formato texto y lo convierte a objeto. Si no es un json, devuelve un error
        $tokenData = json_decode($tokenData, true);
        if ( !is_array($tokenData) ) {
            return false;
        }

        return $tokenData;
    }

    if (!function_exists('sanitize_formula')) {
        function sanitize_formula($formula) {
            // Validación de la fórmula (permitiendo caracteres adicionales como '?', ':', y '[' ']', además de letras, números y operadores matemáticos)
            // if (preg_match('/^[a-zA-Z0-9\s\.\*\+\-\/\(\)\[\]:?]+$/', $formula)) {
                // Escapar comillas simples y dobles
                $formula = str_replace("'", "\'", $formula);
                $formula = str_replace('"', '\"', $formula);
    
                return $formula;
            // } else {
            //     return false; // Fórmula no válida
            // }
        }
    }
    


?>