<?php 
require_once dirname(__DIR__, 1) . "/functions/connection.php";
require_once dirname(__DIR__, 1) . "/functions/vendor.php";
?>


<?php
if(!empty($_GET['search'])){
    $searchAtS = implode("", $_GET);
    $search = rawurlencode($searchAtS);
    $url = "https://swapi.co/api/films/?search=".$search;
    //DO THE CALL TO THE SWAPI API
    callApiSw($url);
}
?>