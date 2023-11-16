<?php

    // ***** INICIO DE Respuestas

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

    function ifEmpty( $data, $msg = null, $returnFalse = false ){

        if( $msg == null ){
            $msg = "No se encontraron registros";
        }

        if( empty($data) ){
            if( $returnFalse ){
                return false;
            }
            
            gg_die( $msg );
        }

    }

    // ***** FIN DE Respuestas

    // ***** INICIO DE Validaciones

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

    // ***** FIN DE Validaciones

    // ***** INICIO DE Funciones de ayuda

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

    function sanitize_ammount($amount) {
        return round($amount * 100 / 100, 2);
    }

    // ***** FIN DE Funciones de ayuda

    // ***** INICIO DE Funciones DB

    function saveIfDup( $model, $arr, $keys = [ 'id' ] ){
        foreach($arr as $el){
            // Verifica si el registro ya existe en la base de datos
            $model->where($keys[0], $el[$keys[0]]);
            
            if( count($keys) > 1 ){
                foreach( $keys as $key => $k ){
                    if( $key > 0 ){
                        $model->where($k, $el[$k]);
                    }
                }
            }
            
            $existente = $model->first();

            // Inserta el registro solo si no existe previamente
            if (!$existente) {
                $model->insert($el);
            }
        }    
    }

    function noTimestamps( $arr ){
        foreach( $arr as $k => $el ){
            foreach( $el as $key => $value ){
                if( $key == 'created_at' || $key == 'updated_at' || $key == 'deleted_at' ){
                    unset( $arr[$k][$key] );
                }
            }
        }

        return $arr;
    }

    function exceptFields( $arr, $fields ){
        foreach( $arr as $k => $el ){
            foreach( $el as $key => $value ){
                // ei $key es igual a alguno de los valores dentro de $fields, hace un unset
                if( in_array($key, $fields) ){
                    unset( $arr[$k][$key] );
                }
            }
        }

        return $arr;
    }

    function getId( $needle, $haystack, $key = 'id', $keyReturn = 'id' ){

        $result = $haystack->where( $key, $needle )->first();

        if( !$result ){
            gg_die( 'No existe este producto' );
        }

        return $result[$keyReturn];
    }

    // ***** FIN DE Funciones DB

?>