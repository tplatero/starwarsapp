<?php 

   //CUrl for search SWAPI
   function callApiSw($url){

      $curl = curl_init();

      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);


      $result = curl_exec($curl);

      if(!$result){
         die("Connection with the database fail, please try again.");
      }

      curl_close($curl);
      $obj = json_decode($result);
      if($obj->count > 0) {
         $data = $obj->results[0];
         $_COOKIE = $data;

         if (isset($data->characters)){
            $characters = characters($data);
            $_ENV = $characters;
         }
      }
   }

   //CUrl for Search the characters of the films and retrieve their names
   function characters($result){
      
      $charNumb = count($result->characters);
      $charNames = array();

      for ($i = 0; $i < $charNumb; $i++) {
         $curl = curl_init();

         curl_setopt($curl, CURLOPT_URL, $result->characters[$i]);
         curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
         ));
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      
      
         $result_obj = curl_exec($curl);
         $result_char = json_decode($result_obj);
         $name = $result_char->name;

         array_push($charNames, $name);
      }

      return $charNames;
   }
?>
