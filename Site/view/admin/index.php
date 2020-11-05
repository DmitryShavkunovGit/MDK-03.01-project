<?
require "../../db.php";

$role =$_SESSION['logged_user']->role;
if($role != 'admin')
{
	echo "У вас недостаточно прав</br>
	<a href='../../index.php'>Назад</a><br>";
}else{
	
	echo"
<style>
h1 { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 60px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; }
a{
	color: #08088A; font-family: 'Helvetica Neue', sans-serif; font-size: 25px; font-weight: bold; letter-spacing: -1px; text-align: center; text-decoration: none;
}
a:hover { color: #FFFF00 }
</style>

<h1>О клиентах</h1><br>

<a href='USR/AboutUser.php'>Информация о клиентах</a><br>
<a href='EMP/order.php'>Информация о заказах</a><br>
<a href='USR/ToDoOrder.php'>Сделать заказ</a><br>
<a href='EMP/status.php'> Добавление/удалени статуса заказа</a>

<h1>Функции работника</h1>
<a href='EMP/ProductInStock.php'>Товары на складе</a><br>
<a href='EMP/categories.php'>Категории товаров</a><br>


<a href='../../logout.php'>Выход</a>";
}
?>

