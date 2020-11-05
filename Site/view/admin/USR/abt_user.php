<?php 
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);


require"../../../db.php";


$userId = $_POST['polzovatel'];

if(isset($_POST['AddOrg']))
{
	$org = $_POST['Organization'];
	$query = "UPDATE `customers` SET `organization` = '$org' WHERE `customers`.`id` = $userId";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	if($result){
		echo"<h1>Ваша организация заменена на:$org</h1>";
		echo"<a href='AboutUser.php'>Назад</a>";
	}
}


if(isset($_POST['AddTel']))
{
	$org = $_POST['telephone'];
	$query = "UPDATE `customers` SET `telephone` = '$org' WHERE `customers`.`id` = $userId";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	if($result){
		echo"<h1>Ваша телефон заменён на:$org</h1>";
		echo"<a href='AboutUser.php'>Назад</a>";
	}
}

if(isset($_POST['AddPred']))
{
	$org = $_POST['predstavitel'];
	$query = "UPDATE `customers` SET `predstavitel` = '$org' WHERE `customers`.`id` = $userId";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	if($result){
		echo"<h1>Ваша представитель заменён на:$org</h1>";
		echo"<a href='AboutUser.php'>Назад</a>";
	}
}

if(isset($_POST['AddEmail']))
{
	$org = $_POST['email'];
	$query = "UPDATE `customers` SET `email` = '$org' WHERE `customers`.`id` = $userId";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	if($result){
		echo"<h1>Ваша email заменён на:$org</h1>";
		echo"<a href='AboutUser.php'>Назад</a>";
	}
}

if(isset($_POST['AddAdres']))
{
	$org = $_POST['adres_dostavki'];
	$query = "UPDATE `customers` SET `adres_dostavki` = '$org' WHERE `customers`.`id` = $userId";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	if($result){
		echo"<h1>Ваша телефон заменён на:$org</h1>";
		echo"<a href='AboutUser.php'>Назад</a>";
	}
}

if(isset($_POST['delUsr'])){
	
	$org = $userId;
	$query = "DELETE FROM `customers` WHERE `customers`.`id` = $org";
	$result = mysqli_query($link, $query);
	if($result){
		echo"<h1>Пользователь удалён</h1>";
		echo"<a href='AboutUser.php'>Назад</a>";
	}else{
		echo"<h1>Пользователь не может быть удалён!</h1>";
		echo "<h2> Возможно у пользователя имеються действующие заказы.</h2>";
		echo"<a href='AboutUser.php'>Назад</a>";
	} 
	
}
?>