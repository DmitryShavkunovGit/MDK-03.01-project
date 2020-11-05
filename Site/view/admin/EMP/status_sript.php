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
	$description=$_POST['description'];
	
	if($name!="" ){
	$insert = "INSERT INTO `status` (`name`) VALUES ('$name')";
	$result = mysqli_query($link, $insert);
	echo"<h1 id='nadpis'>Статус добавлен</h1></br>";
	}
	else
	{
		echo "<h1 id='nadpis'>Вы не ввели название дял статуса</h1></br>";
	}



echo"<a id='verh' href='status.php'>Назад</a></br>";
echo"<a id='niz' href='employee.php'>На главную</a>";
}
if(isset($_POST['delite']))
{
	$categori=$_POST['status'];
	if($categori=='none'){
		echo"<h1 id='nadpis' >Выберите категорию для удаления</h1>";
	}else{
	$del = "DELETE FROM `status` WHERE `status`.`name` = '$categori'";//"DELETE FROM `categories` WHERE `categories`.`name` = \'Строительные материалы\'"
	if ($result = mysqli_query($link,$del)) 
	{
      echo "<h1 id='nadpis' >Статус удален</h1>";
	}else
	{
		echo "Error: " . $del . "<br>" . mysqli_error($link);

		echo"<h1 id='nadpis' >Что то пошло не по плану </h1>";
	} }
	
	
echo"<a id='verh' href='status.php'>Назад</a></br>";
echo"<a id='niz' href='../index.php'>На главную</a>";
}
?>
<style>
#nadpis{
	/* сверху | справа | снизу | слева */
  margin:5% 0 0 35%;
}
#verh{
/* сверху | справа | снизу | слева */
  margin:25% 0 0 43%;
	
}
#niz{
/* сверху | справа | снизу | слева */
  margin:1% 0 0 41%;
}
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size:32;
}

a:hover, a:active {
  background-color:darkgreen;
}
</style>