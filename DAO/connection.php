<?php


class connection{
private static $connection = NULL;

function conecta() {

	
	$conexao = new mysqli("localhost", "root", "","lolwtf2");
	
	if (mysqli_connect_errno()) {
    printf("Falha na conexão: %s\n", mysqli_connect_error());
    exit();
}
	return $conexao;

}

public static function getInstance() {
 if (self::$connection == NULL) {
			self::$connection = new Connection();
		}
		return self::$connection;   
}

}
?>