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
<?php
// Страница авторизации
function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}

//session_start();

mysql_connect("localhost", "root", "");

mysql_select_db("energy");

// // if (isset($_SESSION['login']))
// // {
// //     echo $_SESSION['login'] + " suc";
// // }
// else 
// {
//     //echo "retard";
// }
if(isset($_POST['submit']))

{


    $query = mysql_query("SELECT user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1");

    $data = mysql_fetch_assoc($query);

    


    if($data['user_password'] === md5($_POST['password']))

    {

        $hash = md5(generateCode(10));
        setcookie("id", $data['user_login'], time()+60*60*24*30);
        //setcookie("hash", $hash, time()+60*60*24*30);
        //header("Location: check.php"); exit();
        //$_SESSION['login'] = $_POST['login'];
    }

    else

    {

        print "Вы ввели неправильный логин/пароль";

    }

}
?>