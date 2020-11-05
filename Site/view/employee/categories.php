<?php
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
		
/*$search = ' '; 
$replace = '_';
$subject = 'Категория товара';
echo str_replace($search, $replace, $subject);*/


?>
<style>
table{
	/* сверху | справа | снизу | слева */
	margin: 1% 0 10px 35%;
	border-bottom: 1px solid #ddd;
	border-collapse: collapse;
}
   #forma1{
/* сверху | справа | снизу | слева */
	margin: 1% 0% 0 35%;
	background-color: skyblue;
}
   #forma2{
/* сверху | справа | снизу | слева */
	margin: 1% 0% 0 39%;
	background-color: skyblue;
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
<table id="prod"  style ="font-size:18px">
	<tr>
		<th>Название категории</th>
		<th>Описание</th>
                 
	</tr>
<?php
		$query = "SELECT * FROM `categories`";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			
			$result .= '<td>' . $elem['name'] . '</td>';
			$result .= '<td>' . $elem['description'] . '</td>';
			
			
			
			$result .= '</tr>';
		}
		
		echo $result;
	?>

<form action="catSript.php" method="post">


<table  id="forma1"> 
   <tr> 
      <td> 
         <input type="text" name="name"  placeholder="Название категории"/>
      </td>
	   <td> 
         <input type="text" name="description"  placeholder="Описание категории"/>
      </td>
      <td> 
         <button  type="submit" name="done"  >Добавить</a></button> 
      </td> 
	  
   </tr> 
</table>
</form>
<form action="catSript.php" method="post">


<table  id="forma2"> 
   <tr> 
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
         <button  type="submit" name="delite"  >Удалить</a></button> 
      </td> 
	  
   </tr> 
</table>
</form>
<a href="employee.php">Назад</a>