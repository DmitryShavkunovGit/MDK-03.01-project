<?php 
$title="Форма регистрации"; // название формы
require "db.php";
require __DIR__ . '/header.php'; // подключаем шапку проекта

// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

// Пользователь нажимает на кнопку "Зарегистрировать" и код начинает выполняться
if(isset($data['do_signup'])) {

        // Регистрируем
        // Создаем массив для сбора ошибок
	$errors = array();

	// Проводим проверки
        // trim — удаляет пробелы (или другие символы) из начала и конца строки
	if(trim($data['login']) == '') {

		$errors[] = "Введите логин!";
	}






	

	if($data['password'] == '') {

		$errors[] = "Введите пароль";
	}

	
         // функция mb_strlen - получает длину строки
        // Если логин будет меньше 5 символов и больше 90, то выйдет ошибка
	if(mb_strlen($data['login']) < 1 || mb_strlen($data['login']) > 90) {

	    $errors[] = "Недопустимая длина логина";

    }

  

  

    if (mb_strlen($data['password']) < 2 || mb_strlen($data['password']) > 8){
	
	    $errors[] = "Недопустимая длина пароля (от 2 до 8 символов)";

    }

    // проверка на правильность написания Email
   

	// Проверка на уникальность логина
	if(R::count('customers', "login = ?", array($data['login'])) > 0) {

		$errors[] = "Пользователь с таким логином существует!";
	}

	// Проверка на уникальность email

	


	if(empty($errors)) {

		// Все проверено, регистрируем
		// Создаем таблицу customers
		$user = R::dispense('customers');
     
		$user->login = $data['login'];
		
		
		
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);	
		
		
		
		$user->organization = $data['a'];
		$user->telephone = $data['tel']	;
		$user->predstavitel = $data['tel2'];
		$user->email = $data['tel3'];
		$user->adres_dostavki = $data['tel4'];
		$user->role ='user';
		

		// Сохраняем таблицу
		R::store($user);
        echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';

	} else {
                // array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент. 
		echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';
	}
}

?>

<div class="container mt-4">
		<div class="row">
			<div class="col">
	   <!-- Форма регистрации -->
		<h2>Форма регистрации</h2>
		<form action="signup.php" method="post">
			<input type="text" class="form-control" name="login"  placeholder="Введите логин"><br>
			<input type="password" class="form-control" name="password"  placeholder="Введите пароль"><br>
			<input type="text" class="form-control" name="a"  placeholder="Название Организации"><br>
			<input type="telephone" class="form-control" name="tel"  placeholder="Контактный телефон"><br>
			<input type="text" class="form-control" name="tel2"  placeholder="ФИО представителя"><br>
			<input type="text" class="form-control" name="tel3"  placeholder="Контактный Email"><br>
			<input type="text" class="form-control" name="tel4"  placeholder="Адрес доставки"><br>
			<button class="btn btn-success" name="do_signup" type="submit">Зарегистрировать</button>
		</form>
		<br>
		<p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь</a>.</p>
		<p>Вернуться на <a href="index.php">главную</a>.</p>
			</div>
		</div>
	</div>
<?php require __DIR__ . '/footer.php'; ?> <!-- Подключаем подвал проекта -->
