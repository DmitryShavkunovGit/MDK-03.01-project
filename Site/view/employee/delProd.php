<?php
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);

if(isset($_POST['remove']))
{
	
	$id = $_POST['nomer'];
	$kostil  = "SELECT `id_product` FROM `in stock` WHERE `id_product`= $id ";
	$result ='';
	if( $result = mysqli_query( $link,$kostil)){
		
		$del = "DELETE FROM `in stock` WHERE `in stock`.`id_product` = $id";
	if ($result = mysqli_query($link,$del)) 
	{
      echo "<h1 id='nadpis' >Товар удалён</h1>";
	}else
	{
		echo"<h1 id='nadpis' >Товар не найдён 1  </h1>";
	}
	
	}else{
		echo"<h1 id='nadpis' >Товар не найдён 2 </h1>";
	} 
		





}

		
	



echo"<a id='verh' href='ProductInStock.php'>В таблицу к товарам.</a></br>";
echo"<a id='niz' href='employee.php'>На главную</a>"

?>

<style>
#nadpis{
	/* сверху | справа | снизу | слева */
  margin:5% 0 0 35%;
}
#verh{
/* сверху | справа | снизу | слева */
  margin:25% 0 -25em 40%;
	
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
}

a:hover, a:active {
  background-color:darkgreen;
}
</style>