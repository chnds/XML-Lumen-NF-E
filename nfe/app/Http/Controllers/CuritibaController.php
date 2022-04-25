<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class CuritibaController extends BaseController
{

    public function __construct()
    {
    }

    public function test()
    {
        $url= '';
                
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url."?".'GET'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 1000); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
            $result = curl_exec($ch); 
        $err = curl_error($ch);

        if ($err) {
        echo "cURL Error #:" . $err;
        }  else {
        return $result; 
        }	
        curl_close ($ch); 
        
    }

    public function consultar(request $request)
    {
        $url = '';

        $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

        echo json_encode($age);
        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/json',
                'data' => $arquivo
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false,
        $context);
        echo $result;
    }

    public function cancelar(request $request)
    {
        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Authorization: ', //parametro Authorization, ao qual tera que ser composto da Inscrição-TOKEN
                'content' => $arquivo
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false,
        $context);
        echo $result;
    }

    public function emissao()
    {
            $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Authorization: ', //parametro Authorization, ao qual tera que ser composto da Inscrição-TOKEN
                'content' => $arquivo
            )
        );

        $context = stream_context_create($opts);
        $result = file_get_contents($url, false,
        $context);
        echo $result;
    }



}
