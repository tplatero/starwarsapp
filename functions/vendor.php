<?php

class View
{
    private $data;

    public function __construct($viewname, $data) {
        $this->data = $data;
        $filename = dirname(__DIR__, 1) . "\\theme\\" . $viewname . ".php";
        
        if(is_readable($filename)){
            include_once(dirname(__DIR__, 1) . "\\theme\\" . $viewname . ".php");
        }
    }
}

//CALL FOR 404 ERROR WHEN NOT FOUND A FILM
function throw404(){
    new View('404', null);
}

?>