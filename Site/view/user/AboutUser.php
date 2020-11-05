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
<?php
$userId = $_SESSION['logged_user']->id;
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
  font-size: 32px;
  padding: 5px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin:2% 0 0 43%;
}

a:hover, a:active {
	color: white;
  background-color:darkgreen;
#nadpis{
	/* сверху | справа | снизу | слева */
	margin: 1% 0 0 40%;
</style>

<table  id="mainTable" style ="font-size:24px" border=1px>

	<?php
		$query = "SELECT * FROM `customers` WHERE `id`= $userId";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .="<form action='abt_user.php' method='post'>";
			
			$result .= '<tr>';
			$result .= '<th>Организация</th>';
			$result .= "<td>".$elem['organization']."</td>";
			$result .= '<td>'."<input  type='text' name='Organization' placeholder=\"Введите новое значение\"></input>";
			$result .= "&nbsp<input type='submit' name='AddOrg' value='Добавить'> </td>";
			$result .= '</tr>';
			
			$result .= '<tr>';
			$result .=	'<th>Телефон</th>';
			$result .= "<td>".$elem['telephone']."</td>";
			$result .= "<td> <input type='text' name='telephone'  placeholder=\"Введите новое значение\"></input>";
			$result .= "&nbsp<input type='submit' name='AddTel' value='Добавить'> </td>";
			$result .= '</tr>';
			
			$result .= '<tr>';
			$result .= '<th>Представитель</th>';
			$result .= "<td>".$elem['predstavitel']."</td>";
			$result .= "<td>"."<input type='text' name='predstavitel' placeholder=\"Введите новое значение\"></input>";
			$result .= "&nbsp<input type='submit' name='AddPred' value='Добавить'> </td>";
			$result .= '</tr>';
			
			$result .= '<tr>';
			$result .=	'<th>Email</th>';
			$result .= "<td>".$elem['email'].'</td>';
			$result .= "<td><input type='text' name='email' placeholder=\"Введите новое значение\"></input>";
			$result .= "&nbsp<input type='submit' name='AddEmail' value='Добавить'> </td>";
			$result .= '</tr>';
			
			$result .= '<tr>';
			$result .=	'<th>Адрес доставки</th>';
			$result .= "<td>".$elem['adres_dostavki'];
			$result .= "<td><input type='text' name='adres_dostavki' placeholder=\"Введите новое значение\"></input>";
			$result .= "&nbsp<input type='submit' name='AddAdres' value='Добавить'> </td>";
			$result .= '</tr>';
		}
		
		echo $result;
	?>
	
</table>
<a href="../../index.php">Назад</a>
