<?php
	include "../config.php";

	$name = $_POST['memberName'];
  $description = $_POST['descriptionMember'];

  $sql = Database::connect()->prepare("INSERT INTO `tb_admin.funcionarios` VALUES(?,?,?)");
  $sql->execute(array("NULL",$name,$description));  

?>