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
        <a href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    </div>
    </div>

    <div id="login">
        <h1>Регистрация</h1>
        <form action="" method="POST">
            <fieldset class="clearfix">
                <p><span class="fontawesome-user"></span><input name = "login"  type="text" value="Логин" onBlur="if(this.value == '') this.value = 'Логин'" onFocus="if(this.value == 'Логин') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fontawesome-lock"></span><input name = "password" type="password"  value="Пароль" onBlur="if(this.value == '') this.value = 'Пароль'" onFocus="if(this.value == 'Пароль') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input type="submit" name = "submit" value="ЗАРЕГИСТРИРОВАТЬСЯ"></p>
            </fieldset>
        </form>
        <p><a href="form.php">Вернуться назад</a></p>
    </div>
</body>
</html>
<?

mysql_connect("localhost", "root", "");

mysql_select_db("energy");

if(isset($_POST['submit']))

{

    $err = array();



    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

    {

        $err[] = "Логин может состоять только из букв английского алфавита и цифр";

    }

    

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

    {

        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";

    }

    $query = mysql_query("SELECT COUNT(user_password) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

    if(mysql_result($query, 0) > 0)

    {

        $err[] = "Пользователь с таким логином уже существует в базе данных";

    }

    if(count($err) == 0)

    {

        
        $login = $_POST['login'];
        $password = md5($_POST['password']);
        
       
       mysql_query("INSERT INTO `users` (`user_login`, `user_password`) VALUES('".$login."', '".$password."');");
       echo "Успешно!";


        //header("Location: login.html"); exit();

    }

    else

    {

        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."<br>";

        }

    }

}
