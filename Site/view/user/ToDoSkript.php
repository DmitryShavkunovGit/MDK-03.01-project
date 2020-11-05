<?php
		
require"../../db.php";
require "HelpSkript.php";
//Устанавливаем доступы к базе данных:
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = ''; //пароль, по умолчанию пустой
		$db_name = 'enterprise_products'; //имя базы данных

//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name);

		
if(isset($_POST['Ordering']))
{
	
	$id= $_POST['id'];
	$userID = $_SESSION['logged_user']->id;
	$amount = $_POST['amount'];
	
	if(!empty($amount) and ($id != 'none') ){
		
		$kostil = ShowOne($id);
		
		
		
		if($kostil >= $amount){	
		$otvet= $kostil - $amount;
		
		if($kostil2 = SqlOtvet($otvet,$id)){
		
						if(InsertIntoOrder($userID,$id,$amount)){
							
							echo "<h1 id='nadpis'>Вы заказали товар под №$id в количестве:$amount</h1>";
						}else{"Что-то пошло не так(";}
		
		}

    }else {echo"<h1 id='nadpis'>На складе недостаточно товра для заказа</h1>";}
	}
	else {echo "<h1 id='nadpis'>Вы не заполнели товар и количество</h1></br>";}
}
?>
<style>
#nadpis{
	/* сверху | справа | снизу | слева */
	margin: 5% 0 2em 35%;
	font-weight: bold;
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


<a href = "ToDoOrder.php">НАЗАД</a>
