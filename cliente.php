<?php

    require_once "lib_soap/nusoap.php";
    $cliente = new nusoap_client("http://localhost/soapws/producto.php");
      
    $error = $cliente->getError();
    if ($error) 
       {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
       }
      
    $result = $cliente->call("getProd", array("categoria" => "libros"));
      
    if ($cliente->fault) 
       {
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre><br>";
       }
		    else 
		      {
		        $error = $cliente->getError();
		        if ($error) 
		          {
		            echo "<h2>Error</h2><pre>" . $error . "</pre>";
		          }
		          else {
		               echo "<h2>Libros</h2><pre>";
		               echo $result;
		               echo "</pre>";
		               }
		      }

?> 
