<?php
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

	//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);
		require '../header.php';
?>
<link rel="stylesheet" type="text/css" href="tablecss.css">


<div class='all'>
<table border = "1" style ="font-size:25px">
	<tr>
		<th>Номер продукта</th>
		<th>Название</th>
		<th>Категория</th>
		<th>Измерение</th>
		<th>Срок годности</th>
                 
	</tr>
	</div>
	<?php
		$query = "SELECT * FROM `product`";
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		$result = '';
		foreach ($data as $elem) {
			$result .= '<tr>';
			
			$result .= '<td>' . $elem['id_product'] . '</td>';
			$result .= '<td>' . $elem['name'] . '</td>';
			$result .= '<td>' . $elem['categori'] . '</td>';
			$result .= '<td>' . $elem['unit'] . '</td>';
			$result .= '<td>' . $elem['shelf life'] . '</td>';
			
			
			
			$result .= '</tr>';
		}
		
		echo $result;
	?>
	
</table> 
<a href="../index.php">Назад</a>