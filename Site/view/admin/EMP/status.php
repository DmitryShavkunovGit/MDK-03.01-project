<?php
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
		
require"../../../db.php";

$role =$_SESSION['logged_user']->role;
if($role != "admin")
{
	header("Location:../index.php");
}

?>
<style>
   select {
    width: 190px; 
	hight: 50px;
   }
   #forma1{
/* сверху | справа | снизу | слева */
	margin: 1% 0% 0 36%;
	background-color: skyblue;
}
   #forma2{
/* сверху | справа | снизу | слева */
	margin: 1% 0% 0 35%;
	background-color: skyblue;
}
table{
	/* сверху | справа | снизу | слева */
	margin: 2em 0 2em 45%;
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
  font-size:32;
}

a:hover, a:active {
  background-color:darkgreen;
}


 </style>
<div>
<table style ="font-size:18px">
	<tr>
		<th>Названее</th>
                 
	</tr>
	
</div>
<?php

		$query = "SELECT * FROM `status`";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			$result .= '<td>' . $elem['name'] . '</td>';
			
			
			
			
			$result .= '</tr>';
		}
		
		echo $result;
		
	?>
</table>
<!-- Форма для добавления статусов -->


<form action="status_sript.php" method="post">
<table  id="forma1" > 
   <tr> 
   <td><pre><b>Добавить статус:</b></pre></td>
       <td> 
         <input type="text" name="name"  placeholder="Названее статуса"/> 
      </td>
      <td> 
         <input type="submit" name="done"  value="Добавить"/> 
      </td>
</table>
</form>

<form action="status_sript.php"  method="post">
<table  id="forma2"> 
   <tr> 
   <td><pre><b>Удалить статус:</b></pre></td>
     <td>
	  <select name="status">
		 <option value="none" hidden="">Выберите статус</option>
	  <?php

		 $query2 = "SELECT `name` FROM `status`";
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
         <input type="submit" name="delite"  value="Удалить"/> 
      </td>
</table>
</form>







<a id="nazad" href="../index.php">Назад</a>
