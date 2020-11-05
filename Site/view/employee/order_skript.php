<?
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
		
		
$idOrder = $_POST['idOrder'];
$status  = $_POST['status'];

if(isset($_POST['done']))
{
	if($idOrder and $status !='none'){
			$sql="UPDATE `product_order` SET `status` = '$status' WHERE `product_order`.`id_order` = $idOrder;";
			if ($result = mysqli_query($link, $sql)) {
				  echo "<h1 id='nadpis' >Статус обнавлён</h1>";
			} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				  //echo "<h1 id='nadpis' >Error:Не корректное значение</h1>";
			}	
	}else{
		
		echo"Вы не выбрали статус и заказ";
	}
}
?>
<a href="order.php">Назад</a>