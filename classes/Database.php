<?php

	/**
	 * 
	 */
	class Database
	{
		private static $pdo;

		public static function connect(){
			try{
				self::$pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}catch(Exception $e){

				echo '<div id="alert-div" class="alert alert-dismissible alert-danger">
								<h4 class="alert-heading">Erro</h4>
								<p class="mb-0">Ocorreu um erro ao conectar com bando de dados. Entre em contato com o administrador do site.</p>
								<button type="button" class="btn-close"></button>
							</div>';
			}
			return self::$pdo;
		}

		public static function update($query,$values){

			$sql = self::connect()->prepare($query);
			$sql->execute($values);
			if($sql->rowCount() == 1){
				Painel::alert("Sucess","Funcionário atualizado com sucesso!","alert-success");
			}else{
				 Painel::alert("Erro","Nenhum dado foi modificado!","alert-danger");
			}
		}

		public static function insert($query,$values){
			$sql = self::connect()->prepare($query);
			$sql->execute($values);
			if($sql->rowCount() == 1){
				Painel::alert("Sucess","Funcionário cadastrado com sucesso!","alert-success");
			}else{
				Painel::alert("Erro","Ocorreu um erro ao cadastrar o funcionário!","alert-danger");
			}
		}

		public static function select($query){
			$sql = self::connect()->prepare($query);
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function delete($query){

			$sql = self::connect()->prepare($query);
			$sql->execute();
			if($sql->rowCount() == 1){
				Painel::alert("Sucess","Funcionário removido com sucesso!","alert-success");
			}else{
				Painel::alert("Erro","Ocorreu um erro ao remover o funcionário!","alert-danger");
			}
		}
		
	}

?>