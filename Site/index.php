<?php
$title="Главная страница"; // название формы
require "db.php";
require __DIR__ . '/header.php'; // подключаем шапку проекта


?>

<style type="text/css">
 
</style>
<div class="container mt-4">
<div class="row">
<div class="col">
<center>
<blockquote class="blockquote text-center">
  <h1 class = "display-4">Оптовая база "Запах вкуса"</h1>
  <footer class="blockquote-footer"><h1 class = "display-4"> Ждём ващего заказа</h1></footer>
</blockquote>
</center>
</div>
</div>
</div>

<!-- Если авторизован выведет приветствие -->
<?php if(isset($_SESSION['logged_user'])) : 
$username = $_SESSION['logged_user']->predstavitel;
$userRole = $_SESSION['logged_user']-> role;
$userId = $_SESSION['logged_user']->id;
$employeePosition = $_SESSION['logged_user']->id_position;
if ($userRole ==''){
	if($employeePosition == 2)
	{
		$userRole='Приёмщик товара';
	}else if ($employeePosition == 3){
		$userRole='Водитель';
	}else{
		$userRole =='Вы админ';
	}
	
}

	if($userRole == 'Приёмщик товара')
	{
		echo "<a href='view/employee/ProductInStock.php'>Товары на складе</a></br>";		
		echo "<a href='view/employee/categories.php'>Категори</a>";
		echo "<a href='logout.php'>Выйти</a>";	
	}
	if($userRole == 'Водитель')
	{
		echo "<a href='view/employee/order.php'>Заказы</a></br>";		
		echo "<a href='view/employee/status.php'>Добавить статус</a>";
		echo "<a href='logout.php'>Выйти</a>";
	}
	if($userRole == 'user')
	{	echo"<div class='row'>";
		echo"<div class='col-md-4'> </div>";
		echo"<div class='col-md-4'>";
		 echo "<span class='text-center' style='font-size:24px;'>Здравствуйте, $username</span><br><br>";
		echo "<a href='view/user/AboutUser.php' class='btn btn-outline-dark btn-lg btn-block'>Моя информация</a></br>";
		echo "<a href='view/user/ToDoOrder.php' class='btn btn-outline-dark btn-lg btn-block'>Сделать заказ</a></br>";		
		echo "<a href='view/user/HaveDoneOrder.php' class='btn btn-outline-dark btn-lg btn-block'>Мои заказы</a></br>";
		echo "<a href='logout.php' class='btn btn-outline-dark btn-lg btn-block'>Выйти</a>";
		echo"</div>";
		echo"<div class='col-md-4'></div>";
	}
	if($userRole== "admin"){
		
		echo "<a href='view/user/AboutUser.php'>Моя информация</a></br>";
		echo "<a href='view/user/ToDoOrder.php'>Сделать заказ</a></br>";		
		echo "<a href='view/user/HaveDoneOrder.php'>Мои заказы</a>";
		echo "<a href='logout.php'>Выйти</a>";
	}
	
	echo "</br>";



?>

<?php else : ?>
<!-- Если пользователь не авторизован выведет ссылки на авторизацию и регистрацию -->
<div class="row">
 <div class="col-md-4"></div>
 
  <div class="col-md-4 mt-4">
  <center>
  <a href="login.php" class="btn btn-outline-dark btn-lg btn-block">Войти как клиент</a>
  <a href="employee.php" class="btn btn-outline-dark btn-lg btn-block">Войти как работник</a>
  <a href="signup.php" class="btn btn-outline-dark btn-lg btn-block">Регистрация клиента</a>
</center>
	</div>
	
  <div class="col-md-4"></div>
	
</div>
<?php endif; ?>

<?php require __DIR__ . '/footer.php'; ?> <!-- Подключаем подвал проекта -->
