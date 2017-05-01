<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" href="js/chart.js"></script>
    <title>Energy Control
    <?
    session_start();
    if (isset($_SESSION['login']))
    {
        echo " ,". $_SESSION['login'];
    }
    else
    {
        echo ", Вась";
    }
    ?>
    </title>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-bolt"></i></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#hello">Главная</a></li>
                    <li class="active"><a href="#green">О нас</a></li>
                    <li class="active"><a href="#pay">Оплата</a></li>
                    <li class="active"><a href="#skills">Новости</a></li>
                    <li class="active"><a href="#contact">Система</a></li>
                    <li class="active"><a href="#contact">Контакты</a></li>
                    <li class="active"><a href="second-page.php">Жильцы</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="hello">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <h1>EnergyControl</h1>
                    <h2>Amazing energy measurement table</h2>
                    <a href="form.php"><button>АВТОРИЗАЦИЯ</button></a>
                </div>
            </div>
        </div>
    </div>
    <div id="green">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 centered">
                    <img src="img/iphone.png" alt="">
                </div>
                <div class="col-lg-7 centered">
                    <h3>НЕМНОГО О НАС</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                        and scrambled it to make a type specimen book.</p>
                </div>
            </div>
        </div>
    </div>
    <?
    if (!isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
    }

    ?>
    <div id="pay">
    <div class="container">
        <div class="row centered mt grid">   <h3>ОПЛАТА</h3>

                <?
                mysql_connect("localhost", "root", "");
                mysql_select_db('energy');

                //$sql = mysql_query("SELECT * FROM 'paycheck' ");
                require_once("DataBaseConnector.php");
                $db->getTable('paycheck');
                ?>
            <p>
                <button type="button" class="btn btn-theme btn-lg second-btn">Оплатить</button>
                <a href="javascript:(print());"> <button type="button" class="btn btn-theme btn-lg second-btn">Распечатать</button> </a>
            </p>
        </div>
    </div>
        <div class="row mt centered">
            <div class="col-lg-7 col-lg-offset-1 mt">
                <p class="lead">Если у вас пробемы с оплатой - пишите <i class="fa fa-arrow-right" aria-hidden="true"></i></p>
            </div>
            <div class="col-lg-3 mt">
                <p>
                    <button type="button" class="btn btn-theme btn-lg">Email Me!</button>
                </p>
            </div>
        </div>
    </div>
    <div id="skills">
        <div class="container">
            <div class="row centered">
                <h3>НОВОСТИ</h3>
                <h4>Стоило ли менять тарифы на газ в Украине?</h4>
                <img src="img/5756df9fe94cd.jpeg">
                <p>Даже после прошлогоднего роста цены на газ в Украине были практически самыми низкими в регионе (диаграмма 1).                     А также тарифы на тепло (График 2). В результате, в Украине 60% котельных выполнили свой срок,                     И 20% сетей полностью изношены. Понятно, что в этой ситуации потери в системе теплоснабжения очень велики. Таким образом, чтобы изменить ситуацию,
                    Правительству необходимо было поднять цены до рыночных цен, что он и сделал в апреле 2017 года.</p>
                <h5>Источник: <a href="#">Меморандум Украины и МВФ</a></h5>
            </div>
        </div>
    </div>
    <section id="contact"></section>
    <div id="social">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="col-md-3">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </div>
                    <div class="col-md-3">
                        <a href=""><i class="fa fa-vk"></i></a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="col-md-3">
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="f">
        <div class="container">
            <div class="row">
                <p>Created with<i class="fa fa-heart"></i> By Yuliya.</p>
            </div>
        </div>
    </div>
</body>
</html>
