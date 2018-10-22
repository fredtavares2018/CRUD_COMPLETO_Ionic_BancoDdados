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

		$nome = $request->nome;
		$cidade = $request->cidade;

		if ($nome != "") {

		include "conecta.php";

		$cn = mysql_query("INSERT INTO dados 
			VALUES ('',
			'$nome',
			'$cidade',
			'false'
				)")or die(mysql_error());

		echo "Nome: ".$nome."  Cidade: ".$cidade;
		echo "    -> Gravado com Sucesso! ";
	
	} // fim if cliente
	else {
		echo "Algum problema";
	}

}	
?>