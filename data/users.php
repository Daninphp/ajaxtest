<?php
require_once('dbconn.php');

if(isset($_GET['users'])){
	$db = Konekcija::getInstance()->conn;
	$stmt = $db->prepare("SELECT * FROM users");
	$stmt->execute();
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($users);
}

if(isset($_GET['pagination'])){
	$db = Konekcija::getInstance()->conn;
	$pag = $_POST['pag'];

	if($pag>0){
		$stmt = $db->prepare("SELECT * FROM users LIMIT  $pag");
	} else {
		$stmt = $db->prepare("SELECT * FROM users");
	}

	$stmt->execute();
	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($users);
}

if(isset($_GET['create'])){

	$db = Konekcija::getInstance()->conn;

	$name = $_POST['name'];
	$email = $_POST['email'];
	$stmt = $db->prepare("INSERT INTO users(name, email) VALUES ('$name','$email')");
	$stmt->execute();
}

if(isset($_GET['update'])){

	$db = Konekcija::getInstance()->conn;
	print_r($_POST);
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$stmt = $db->prepare("UPDATE users SET name='$name', email='$email' where id=$id ");
	$stmt->execute();
}

if(isset($_GET['edit'])){

	$db = Konekcija::getInstance()->conn;

	$id = $_POST['id'];
	$stmt = $db->prepare("SELECT * FROM users where id = '$id'");
	$stmt->execute();
	$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($user);
}
if(isset($_GET['delete'])){

	$db = Konekcija::getInstance()->conn;

	$id = $_POST['id'];
	$stmt = $db->prepare("DELETE FROM users where id = '$id'");
	$stmt->execute();
}

