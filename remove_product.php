<?php
	session_start();
if(!isset($_SESSION['isLogin'])){
  header('Location: http://localhost/webFinalProject/index.php');
}

	include 'dbconnect.php';

	$id=$_GET['id'];
	$sql = "DELETE FROM products WHERE id=:id";
	$query=$conn->prepare($sql);
	$query->bindParam(':id', $id);
	$query->execute();
	header('Location: http://localhost/webFinalProject/user_products.php');
?>