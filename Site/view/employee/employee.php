<?php
$title="Главная страница"; // название формы
require "../../db.php";



?>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<style type="text/css">
   p { 
    font-size: 120%; 
    font-family: Verdana, Arial, Helvetica, sans-serif; 
    color: #A602F8;
	margin: 5em 0 -1em 0;
   }
</style>
<div class="container mt-4">
<div class="row">
<div class="col">
<center>
<h1>Добро пожаловать на наш сайт!</h1>

</center>
</div>
</div>
</div>

<!-- Если авторизован выведет приветствие -->
<?php 
$username = $_SESSION['logged_user']->login;
$userRole = $_SESSION['logged_user']-> id_position;
	if($userRole == 2)
	{
		$userRole='Приёмщик товара';
	}else if ($userRole == 3){
		$userRole='Водитель';
	}else{
		$userRole =='admin)';
	}
	
 echo "<p align='left'>Привет, $username</br> Твоя роль $userRole</p>";
	echo "</br>";
	
	if($userRole == 'Приёмщик товара'|| $userRole == 2  )
	{
		echo "<a href='ProductInStock.php'>Товары на складе</a></br>";
		echo "<a href='categories.php'>Категории</a></br>";	
		echo "<a href='../../logout.php'>Выйти</a></br>";	
	}
	if($userRole == 'Водитель'|| $userRole == 3  )
	{
		echo "<a href='order.php'>Заказы</a></br>";
		echo "<a href='status.php'>Добавить статус заказа</a></br>";	
		echo "<a href='../../logout.php'>Выйти</a></br>";	
	}
	if($userRole== "admin"){
		
		
		echo "Ты $userRole";
	}
	
	
	echo "</br>";
?>