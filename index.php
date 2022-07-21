<?php 
    require_once "models/Cliente.php";

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    $method = $_SERVER['REQUEST_METHOD'];
     if($method == "OPTIONS") {
         die();
     }

    switch ($_SERVER['REQUEST_METHOD']) {

        case 'GET':
            if(isset($_GET['id'])) {
                echo json_encode(Cliente::getWhere($_GET['id']));
            } // end if 
            else {
                echo json_encode(Cliente::getAll());
            } // end else
            break;

        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Cliente::insert($datos->usuario, $datos->correo, $datos->contrasena, $datos->nacimiento, $datos->foto)) {
                    http_response_code(200);
                } // end if
                else {
                    http_response_code(400);
                } // end else
            } // end if
            else{
                http_response_code(405);
            } // end  else
            break;

        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Cliente::update($datos->id, $datos->usuario, $datos->correo, $datos->contrasena, $datos->nacimiento, $datos->foto)) {
                    http_response_code(200);
                } // end if
                else {
                    http_response_code(400);
                } // end else
            } // end if
            else{
                http_response_code(405);
            } // end  else
            break;
    
        case 'DELETE':
            if(isset($_GET['id'])){
                if(Cliente::delete($_GET['id'])) {
                    http_response_code(200);
                }// end if
                else {
                    http_response_code(400);
                }// end else
            }// end if
            else {
                http_response_code(405);
            }//end else
            break;

            default;
                http_response_code(405);
                break;

    }  // end while