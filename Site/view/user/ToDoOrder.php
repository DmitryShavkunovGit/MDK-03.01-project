<?php
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
		
require"../../db.php"
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
	margin: 2% 0 2em 35%;
	border-bottom: 1px solid #ddd;
	border-collapse: collapse;
}


th, td {
  padding: 10px;
  text-align: left;
border-bottom: 1px solid #ddd;
}
#mainTable{
	/* сверху | справа | снизу | слева */
	margin: 2% 0 2em 27%;
	border-bottom: 1px solid #ddd;
	border-collapse: collapse;
	
}
tr:hover {
	background-color: #9FF781;
	}
a:link, a:visited {
  background-color: green;
  color: lightgrey;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 32px;
  display: inline-block;
  margin:2% 0 0 45%;
}

a:hover, a:active {
	color: white;
  background-color:darkgreen;
}
#nadpis{
	/* сверху | справа | снизу | слева */
	margin: 1% 0 0 40%;
</style>


<div class='all'>
<h1 id="nadpis">Товары в наличии<h1>
<table  id="mainTable" style ="font-size:24px">
	<tr>
		<th>Номер продукта</th>
		<th>Название</th>
		<th>Количество</th>
		<th>Срок годности</th>
		<th>Описание</th>
                 
	</tr>
	</div>
	<?php
		$query = "SELECT * FROM `in stock`";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			$result .= '<td>' . $elem['id_product'] . '</td>';
			$result .= '<td>' . $elem['name'] . '</td>';
			$result .= '<td>' . $elem['amount'] . '</td>';
			$result .= '<td>' . $elem['shelf life'] . '</td>';
			$result .= '<td>' . $elem['description'] . '</td>';
			
			
			
			$result .= '</tr>';
		}
		
		echo $result;
	?>
	
</table> 

<form action="ToDoSkript.php" method="post">
<table  id="forma1" > 
   <tr> 
   <td><pre><b>Заказать:</b></pre></td>
       <td> 
         <select name="id">
		 <option value="none" hidden="">Выберите номер продукта</option>
		 <?php

		$query2 = "SELECT `id_product` FROM `in stock`";
		$result = mysqli_query($link, $query2);
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		$result = '';
		foreach ($data as $elem) {
			 $a = $elem['id_product'];
			$result .= "<option value= $a >" . $elem['id_product'] . '</option>';
			
			
		}
		
		echo "$result" ;
		 ?></select>
      </td>
	  <td> 
         <input type="text" name="amount"  placeholder="Количество"/> 
      </td>
      <td> 
         <input type="submit" name="Ordering"  value="Заказать"/> 
      </td>
</table>
</form>
<a href="../../index.php">Назад</a>