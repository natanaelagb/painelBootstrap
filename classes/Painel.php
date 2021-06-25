<?php
	
	/**
	 * 
	 */
	class Painel 
	{
		
		public static function login(){
			return isset($_SESSION['login']) ? true : false;
		}

		public static function alert($header,$message,$class){
			echo "<div id='alert-div' class='alert alert-dismissible $class'>
							<h4 class='alert-heading'>$header</h4>
							<p class='mb-0'>$message</p>
							<button type='button' class='btn-close'></button>
						</div>";
		}
		
		public static function logout(){
			session_destroy();
			header("Location: ".INCLUDE_PATH_PAINEL);
		}
		
	}

?>