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

#forma1 {
/* сверху | справа | снизу | слева */
	margin: 2% 5% 1% 40%;
}
#forma1 button
{
background-color: red; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 24px;
  margin: 0 0 0 -2em;

}
#forma1 button:hover {
	background: rgba(0,0,0,0);
	color: #3a7999;
	box-shadow: inset 0 0 0 3px #3a7999;
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
  margin: 0 0 0 43%;
}

a:hover, a:active {
  background-color:darkgreen;
}


  </style>
<table style ="font-size:18px">
	<tr>
		<th>Номер заказа</th>
		<th>Номер заказчика</th>
		<th>Адрес доставки</th>
		<th>Номер продукта</th>
		<th>Навание продукта</th>
		<th>Количество</th>
		<th>Статус заказа</th>
                 
	</tr>
	</div>
<?php
		$query = "SELECT * FROM `product_order`";
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

<form action="order_skript.php" method="post">
<table  id="forma"> 
   <tr> 
   <td><pre><b>Изменить статус заказа:</b></pre></td>
      <td> 
          <select name="idOrder">
		 <option value="none" hidden="">Выберите номер заказа</option>
<?php
		 $query2 = "SELECT `id_order` FROM `product_order` ORDER BY `id_order` ASC";
		$result = mysqli_query($link, $query2) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		$row_cnt = mysqli_num_rows($result);
		$result = '';
		foreach ($data as $elem) {
			 $a = $elem['id_order'];
			$result .= "<option value= \"$a\" >" . $elem['id_order'] . '</option>';
			
			
		}
		
		echo "$result" ;
?>
		</select>

      </td>
      </td>
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
			$result .= "<option value= \"$a\" >" . $elem['name'] . '</option>';
			
			
		}
		
		echo "$result" ;
?>
		</select>

      </td>
      <td> 
         <button  type="submit" name="done"  >Добавить</button> 
      </td> 
	  
   </tr> 
</table>
</form>



<form action="order_skript.php" method="post">
<table  id="forma"> 
   <tr> 
   <td><pre><b>Изменить статус заказа:</b></pre></td>
      <td> 
          <select name="idOrder">
		 <option value="none" hidden="">Выберите номер заказа</option>
<?php
		 $query2 = "SELECT `id_order` FROM `product_order` ORDER BY `id_order` ASC";
		$result = mysqli_query($link, $query2) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		$row_cnt = mysqli_num_rows($result);
		$result = '';
		foreach ($data as $elem) {
			 $a = $elem['id_order'];
			$result .= "<option value= \"$a\" >" . $elem['id_order'] . '</option>';
			
			
		}
		
		echo "$result" ;
?>
		</select>

      </td>
      <td> 
         <button  type="submit" name="del"  >Удалить</button> 
      </td> 
	  
   </tr> 
</table>
</form>

<form id="forma1" action="get_reply.php" method="POST">
<button class="btn btn-success" name="_get_reply_order" type="submit">Создать отчёт о доставке</button>
</form>



<a href="../index.php">Назад</a>