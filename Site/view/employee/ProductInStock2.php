<?php
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
if(isset($_POST['done']))
{
	$name=$_POST['name'];
	$amount=$_POST['amount'];
	$categori=$_POST['categori'];
	$unit = $_POST['unit'];
	$shelf_life=$_POST['shelf_life'];
	if(empty($shelf_life)){
		$shelf_life="NULL";
		$insert = "INSERT INTO `in stock` (`name`, `amount`, `unit`, `categori`, `shelf life`, `description`) VALUES ('$name', '$amount', '$unit', '$categori', $shelf_life, '$description')";
	}else{
	$insert = "INSERT INTO `in stock` (`name`, `amount`, `unit`, `categori`, `shelf life`, `description`) VALUES ('$name', '$amount', '$unit', '$categori', '$shelf_life', '$description')";
	}
	
	$description=$_POST['description'];
	
	
	
	if ($result = mysqli_query($link, $insert)) {
      echo "<h1 id='nadpis' >Довар добавлен</h1>";
} else {
	  
      echo "<h1 id='nadpis' >Error:Не корректное значение</h1>";
}
	
}

echo"</br><a id='verh' href='ProductInStock.php'>Назад</a>";
echo"</br><a id='niz' href='employee.php'>На главную</a>";
?>
<style>
#nadpis{
	/* сверху | справа | снизу | слева */
  margin:5% 0 0 35%;
}
#verh{
/* сверху | справа | снизу | слева */
  margin:15% 0 -25em 43%;
	
}
#niz{
/* сверху | справа | снизу | слева */
  margin:18% 0 -25em 42%;
}
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color:darkgreen;
}
</style>