<?php

header('Access-Control-Allow-Orgin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Method:DELETE');
header('Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-With');


include('function.php');

$requestMethod = $_SERVER["REQUEST_METHOD"];

if($requestMethod=="DELETE"){


        $deleteCustomer=deleteCustomer($_GET);
        echo $deleteCustomer;

    
   
}else{
    $data=[
        'status'=>405,
        'message'=>$requestMethod. 'Method Not allowed'
    ];
    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode( $data);
}



?>