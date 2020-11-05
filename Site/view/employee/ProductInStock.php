<?php
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
		


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
<table id="prod"  style ="font-size:18px">
	<tr>
		<th>Номер продукта</th>
		<th>Название</th>
		<th>Количество</th>
		<th>Единица измерения</th>
		<th>Категория</th>
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
			$result .= '<td>' . $elem['unit'] . '</td>';
			$result .= '<td>' . $elem['categori'] . '</td>';
			$result .= '<td>' . $elem['shelf life'] . '</td>';
			$result .= '<td>' . $elem['description'] . '</td>';
			
			
			
			$result .= '</tr>';
		}
		
		echo $result;
	?>
</table>
<form action="ProductInStock2.php" method="post">
<table  id="forma"> 
   <tr> 
   <td><pre><b>Добавить новый товар:</b></pre></td>
      <td> 
         <input type="text" name="name"  placeholder="Название продукта"/>
      </td>
	  
      <td> 
         <input type="text" name="amount"  placeholder="Количество"/> 
      </td>
	  <td> 
		 <select name="categori">
		 <option value="none" hidden="">Выберите категорию</option>
<?php
		 $query2 = "SELECT `name` FROM `categories`";
		$result = mysqli_query($link, $query2) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		$row_cnt = mysqli_num_rows($result);
		$result = '';
		foreach ($data as $elem) {
			 $a = $elem['name'];
			$result .= "<option value= \"$a\" >" . $elem['name'] . '</option>';
			
			
		}
		
		echo "$result" ;
?>
		</select>

      </td>
	  <td>
	  <select name="unit">
		 <option value="none" hidden="">Единица измерения</option>
	  <?php

		 $query2 = "SELECT `name` FROM `unit`";
		$result = mysqli_query($link, $query2) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		$row_cnt = mysqli_num_rows($result);
		$result = '';
		foreach ($data as $elem) {
			 $a = $elem['name'];
			$result .= "<option value= $a >" . $elem['name'] . '</option>';
			
			
		}
		
		echo "$result" ;
?>
		</select>

      </td>
	  <td>
         <input type="date" name="shelf_life" size="30"  placeholder="Срок годности"/> 
      </td>
	  <td>
         <input type="text" name="description"  placeholder="Описание"/> 
      </td>
      <td> 
         <button  type="submit" name="done"  >Добавить</button> 
      </td> 
	  
   </tr> 
</table>
</form>


<form action="delProd.php" method="post">
<table  id="forma" > 
   <tr> 
   <td><pre><b>Удалить товар:</b></pre></td>
      <td> 
         <input type="number" name="nomer"  placeholder="Номер продукта"/>
      </td>
      <td> 
         <input type="submit" name="remove"  value="Удалить"/> 
      </td>
</table>
</form>




<a href="employee.php">Назад</a>