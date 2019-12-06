<?php 

Class Usuario{

	private $pdo;
	public $msgErro = "";

	public function conectar($nome, $host, $usuario, $senha){


		global $pdo;
		try {
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
			
		} catch (PDOException $e) {

			$msgErro = $e->getMessage(); 
		}


	}

	public function logar($Number, $senha){

		global $pdo;

		$sql = $pdo->prepare("SELECT CardID FROM users WHERE SerialNumber = :e AND senha = :s");
		$sql->bindValue(":e", $Number);
		$sql->bindValue(":s", $senha);
		$sql->execute();

		if($sql->rowCount() > 0){ //sessao

			$dado = $sql->fetch();
			session_start();
			$_SESSION['id_usuario'] = $dado['CardID'];
			$_SESSION['id'] = $Number;
			return true; //login sucesso

		}else{
			return false; //nao logou
		}


	}

	public function comprar($ficha){

		global $pdo;

	//	session_start();
		$test = $_SESSION['id'];

		$sql = $pdo->prepare("UPDATE  users SET ficha = ficha + :f  WHERE SerialNumber = $test");

//		$sql->bindValue(":e", $Number);
		$sql->bindValue(":f", $ficha);
		

		$sql->execute();
		return true;

	}

	public function acesso(){

		global $pdo;

	//	session_start();
		$test = $_SESSION['id'];

		$sql = $pdo->prepare("UPDATE users SET ficha = ficha - 1  WHERE SerialNumber = $test");		

		$sql->execute();

	}

	public function entrar($Number){

		global $pdo;

		$test = $_SESSION['id'];

		if($Number == $test){


			$sql = $pdo->prepare("SELECT SerialNumber FROM fila WHERE SerialNumber = $test");
			$sql->execute();

			if($sql->rowCount() > 0){ // se já está na fila

				echo "Você já está na fila!";

			}else{ //verificar se tem ficha

				$sql = $pdo->prepare("SELECT ficha FROM users WHERE SerialNumber = $test");
				$sql->execute();

				if($sql->rowCount() > 0){ //sessao

					$dado = $sql->fetch();
					$ficha = $dado['ficha'];

					if($ficha == 0){
						echo "Você não possui ficha(s)!";
					}else{
						$sql = $pdo->prepare("INSERT INTO fila (SerialNumber) VALUES($test)");
						$sql->execute();

						return true;
					}

				}

			}
			
		}
	}
}

?>

