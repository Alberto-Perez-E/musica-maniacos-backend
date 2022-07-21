<?php
    require_once "connection/Connection.php";

    class Cliente {
        
        public static function getAll() {
            $db = new Connection();
            $query = "SELECT * FROM clientes";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'usuario' => $row['usuario'],
                        'correo' => $row['correo'],
                        'contrasena' => $row['contrasena'],
                        'nacimiento' => $row['nacimiento'],
                        'foto' => $row['foto'],
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }// end getAll acceder a toda la inf de la BD

        public static function getWhere($id_cliente) {
            $db = new Connection();
            $query = "SELECT * FROM clientes WHERE id=$id_cliente";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'usuario' => $row['usuario'],
                        'correo' => $row['correo'],
                        'contrasena' => $row['contrasena'],
                        'nacimiento' => $row['nacimiento'],
                        'foto' => $row['foto'],
                    ];
                }//end while
                return $datos;
            }//end if
            return $datos;
        }// end getWhere acceder a toda la inf de la BD

        public static function insert($usuario, $correo, $contrasena, $nacimiento, $foto) {
            $db = new Connection();
            $query = "INSERT INTO clientes (usuario, correo, contrasena, nacimiento, foto)
            VALUES('".$usuario."', '".$correo."', '".$contrasena."', '".$nacimiento."', '".$foto."')";
            $db->query($query);
            if($db->affected_rows) {
                return  TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id_cliente, $usuario, $correo, $contrasena, $nacimiento, $foto) {
            $db = new Connection();
            $query = "UPDATE clientes SET
            usuario='".$usuario."', correo='".$correo."', contrasena='".$contrasena."', nacimiento='".$nacimiento."', foto='".$foto."'
            WHERE id=$id_cliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id_cliente) {
            $db = new Connection();
            $query = "DELETE FROM clientes WHERE id=$id_cliente";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update
        
    }//end class Client 
 