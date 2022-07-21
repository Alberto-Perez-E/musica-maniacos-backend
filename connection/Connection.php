<?php

    class Connection extends Mysqli {
        function __construct() {
            parent:: __construct('localhost', 'root', '', 'clientes');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'Coneción exítosa a la BD' : die('Error al conectarse a la BD');            
        } //end __construct
    } //end class Connection 