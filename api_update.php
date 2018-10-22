<?php

	if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }


    $postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		$request = json_decode($postdata);

		$id_user = $request->id;
		$nome = $request->nome;
		$cidade = $request->cidade;

		if ($id_user != "") {

		include "conecta.php";

		$cns =mysql_query( "UPDATE dados 
			SET 

			nome='{$nome}',
			cidade='{$cidade}'

			 WHERE id = '{$id_user}'")or die(mysql_error());

		echo "    -> Atualizado com Sucesso! ";
	
	} // fim if cliente
	else {
		echo "Algum problema";
	}

}	
?>