<?php

// CONEXAO COM O BANCO DE DADOS
$conexao = mysql_connect("localhost","root","");

$teste = mysql_set_charset('UTF8', $conexao);

if($conexao)
{
	if(mysql_select_db("Banco_Dados"))
	{
	}
	else
	{ print "Erro ao selecionar banco";	}

}
else
{
	print "Erro ao conectar ao banco";
}



?>
