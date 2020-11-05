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
	$insert = "INSERT INTO `categories` (`name`, `description`) VALUES ('$name', '$description')";
	$result = mysqli_query($link, $insert);
	echo"<h1 id='nadpis'>Запрос усешно выполнен!</h1></br>";
	}
	else
	{
		echo "<h1 id='nadpis'>Вы не ввели название категории.</h1></br>";
	}



echo"<a id='verh' href='categories.php'>Назад</a></br>";
echo"<a id='niz' href='employee.php'>На главную</a>";
}
if(isset($_POST['delite']))
{
	$categori=$_POST['categori'];
	if($categori=='none'){
		echo"<h1 id='nadpis' >Выберите категорию для удаления</h1>";
	}else{
	$del = "DELETE FROM `categories` WHERE `categories`.`name` = '$categori'";//"DELETE FROM `categories` WHERE `categories`.`name` = \'Строительные материалы\'"
	if ($result = mysqli_query($link,$del)) 
	{
      echo "<h1 id='nadpis' >Категория удалена</h1>";
	}else
	{
		echo "Error: " . $del . "<br>" . mysqli_error($link);

		echo"<h1 id='nadpis' >Что то пошло не по плану </h1>";
	} }
	
	
echo"<a id='verh' href='categories.php'>Назад</a></br>";
echo"<a id='niz' href='employee.php'>На главную</a>";
}
?>
<style>
#nadpis{
	/* сверху | справа | снизу | слева */
  margin:5% 0 0 35%;
}
#verh{
/* сверху | справа | снизу | слева */
  margin:25% 0 -25em 43%;
	
}
#niz{
/* сверху | справа | снизу | слева */
  margin:25% 0 -25em 42%;
}
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size:12;
}

a:hover, a:active {
  background-color:darkgreen;
}
</style>