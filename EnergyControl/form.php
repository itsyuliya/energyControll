<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style-form.css" media="screen" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <title>Регистрация/Авторищация</title>
</head>
<body>
    <div class="btn-back">
        <a href="index.html"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
    <div id="login">
        <h1>Авторизация</h1>
        <form action="" method="POST">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input name = "login" type="text" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fontawesome-lock"></span><input name = "password" type="password"  value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input type="submit" name = "submit" value="ВОЙТИ"></p>
            </fieldset>
        </form>
        <p>Нет аккаунта? &nbsp;&nbsp;<a href="form-reg.php">Регистрация</a><span class="fontawesome-arrow-right"></span></p>
    </div>
</body>
</html>
<?

// Страница авторизации



# Функция для генерации случайной строки

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}
# Соединямся с БД

mysql_connect("localhost", "root", "");

mysql_select_db("energy");


if(isset($_POST['submit']))

{

    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysql_query("SELECT user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");

    $data = mysql_fetch_assoc($query);

    

    # Соавниваем пароли

    if($data['user_password'] === md5($_POST['password']))

    {

        # Генерируем случайное число и шифруем его

        $hash = md5(generateCode(10));

        

        # Ставим куки

        //setcookie("id", $data['user_login'], time()+60*60*24*30);

        //setcookie("hash", $hash, time()+60*60*24*30);

        

        # Переадресовываем браузер на страницу проверки нашего скрипта

        //header("Location: check.php"); exit();
        echo "YES!";

    }

    else

    {

        print "Вы ввели неправильный логин/пароль";

    }

}

?>