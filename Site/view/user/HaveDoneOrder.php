<?php

//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
		$userId = $_SESSION['BufferId'];
		
require "../../db.php"
?>

<style>
   select {
    width: 190px; 
	hight: 50px;
   }
   #forma{
	margin: 2% 5% 1% 15%;
	background-color: skyblue;
}
table{
	/* сверху | справа | снизу | слева */
	margin: 2em 0 2em 20%;
	border-bottom: 1px solid #ddd;
	border-collapse: collapse;
}


th, td {
  padding: 10px;
  text-align: left;
border-bottom: 1px solid #ddd;
}
tr:hover {
	background-color: #9FF781;
	}
a:link, a:visited {
  background-color: green;
  color: white;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin:2% 0 0 45%;
}

a:hover, a:active {
  background-color:darkgreen;
}

  </style>

<div class='all'>
<table  style ="font-size:24px">
	<tr>
		<th>Номер заказа</th>
		<th>Номер заказчика</th>
		<th>Адрес доставки</th>
		<th>Номер продукта</th>
		<th>Название продукта</th>
		<th>Количество</th>
		<th>Статус</th>
                 
	</tr>
	</div>
	<?php
	$userId=$_SESSION['logged_user']->id;
		$query = "SELECT * FROM `product_order` WHERE `id_customer`= $userId"; 
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			$result .= '<td>' . $elem['id_order'] . '</td>';
			$result .= '<td>' . $elem['id_customer'] . '</td>';
			$result .= '<td>' . $elem['ShippingAddress'] . '</td>';
			$result .= '<td>' . $elem['id_product'] . '</td>';
			$result .= '<td>' . $elem['product_name'] . '</td>';
			$result .= '<td>' . $elem['amount'] . '</td>';
			$result .= '<td>' . $elem['status'] . '</td>';
			
			
			
			$result .= '</tr>';
		}
		
		echo $result;
		
	?>
	
</table> 


<a href="../../index.php">Назад</a>
