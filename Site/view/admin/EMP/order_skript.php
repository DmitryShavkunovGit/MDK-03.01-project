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
echo'<style>
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  /* сверху | справа | снизу | слева */
  margin:5% 0 0 42%;
  font-size:32;
}

a:hover, a:active {
  background-color:darkgreen;
}
h1{
	  margin:5% 0 0 40%;
}

</style>
<div>';

if(isset($_POST['done']))
{
if( ($idOrder != 'none') and ($status  != 'none') ){
			$sql="UPDATE `product_order` SET `status` = '$status' WHERE `product_order`.`id_order` = $idOrder;";
			if ($result = mysqli_query($link, $sql)) {
				  echo "<h1 id='nadpis' >Статус обнавлён</h1>";
				  echo "</div>";
			} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				  //echo "<h1 id='nadpis' >Error:Не корректное значение</h1>";
				  echo "</div>";
			}	
	}else{
		
		echo"<h1>Вы не выбрали статус и заказ</h1>";
		echo "</div>";
	}
}

if(isset($_POST['del']))
{
	$sql="DELETE FROM `product_order` WHERE `product_order`.`id_order` = $idOrder;";
	$result = mysqli_query($link, $sql);
	if($idOrder !='none' ){
			if ($result) {
				  echo "<h1 id='nadpis' >Заказ успешно удалён</h1>";
				  echo "</div>";
			} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($conn);  //echo "<h1 id='nadpis' >Error:Не корректное значение</h1>";
				  echo "</div>";
			}	
	}
}	


?>
<a href="order.php">Назад</a>