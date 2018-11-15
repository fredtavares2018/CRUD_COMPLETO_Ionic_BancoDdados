<?php

	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }



		include "conecta.php";

		$SQL = mysql_query("SELECT * FROM usuarios ORDER BY nome desc ")or die(mysql_error());

		  while ($row = mysql_fetch_array($SQL))
			{

			    $i=0;

			    foreach($row as $key => $value)
			    {

			        if (is_string($key))
			        {
			         $fields[mysql_field_name($SQL,$i++)] = $value;
			        }

			    }

			    $emparray[]  =  $fields;

			}

			$JSON = json_encode($emparray);

			echo $JSON;


?>