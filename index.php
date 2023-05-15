<?php
session_start();
//require_once("../vendor/autoload.php");

if (!isset($_SESSION["theme"]) && !isset($_SESSION["check"])) {
    $_SESSION["theme"] = "lite";
    $_SESSION["check"] = "";
}

if (isset($_GET["theme"])) {
    $_SESSION["theme"] = $_GET["theme"];
}

$_SESSION["check"] = $_SESSION["theme"] == "lite" ? "" : "checked";

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="src/styles/styles.css">
    <link rel="stylesheet" href="src/styles/flex-grid.css">
    <link rel="stylesheet" href="src/styles/switchBtn.css">
    <link rel="stylesheet" href="src/styles/adaptive_360.css">
    <link rel="stylesheet" href="src/styles/adaptive_361_576.css">
    <link rel="stylesheet" href="src/styles/adaptive_577_768.css">
    <link rel="stylesheet" href="src/styles/adaptive_769_1200.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="app/js/scroll.js"></script>
    <script src="app/js/themeToggle.js"></script>
</head>
<body id="top" class="<?php echo $_SESSION["theme"] ?>">
<header class="header">
    <div class="logo"></div>
    <div class="link">
        <a class="header-link" href="#flex">Любимые игры и книги</a>
    </div>
    <div class="link">
        <a class="header-link" href="#grid">Любимые фильмы</a>
    </div>
    <div class="link">
        <a class="header-link" href="app/php/authorization.php">Авторизация</a>
    </div>
    <div class="link">
        <a class="header-link" href="app/php/registration.php">Регистрация</a>
    </div>
    <div class="container_btn">
        <img class="theme-icon" src="src/images/icons/day-and-night_<?php echo $_SESSION["theme"] ?>.png" alt="">
        <div class="switch-btn">
            <label class="switch">
                <input id="toggleswitch" type="checkbox" <?php echo $_SESSION["check"] ?>>
                <span class="slider round"></span>
            </label>
        </div>
    </div>
</header>
<div class="main">
    <nav class="photoFrame">
        <div class="photo">
            <img src="src/images/photo.jpg" alt="My photo could be there">
        </div>
    </nav>
    <section class="information">
        <div class="fio">
            <h2>Князев Руслан</h2>
        </div>
        <div class="info">
            <div class="personalInfo">
                <p class="about">
                    Добрый день! Немного расскажу о себе. Работаю руководителем по ВЭД. Дополнительно я развиваю и
                    поддерживаю
                    корпоративный портал Bitrix24 в компании, в которой работаю.
                    Я начинающий разработчик, развиваюсь и буду продолжать развиваться в IT сфере. У меня нет опыта
                    коммерческой
                    разработки, есть только учебный, а еще у меня богатый опыт и много полезных компетенций в других
                    областях.
                    На текущем месте работы мой руководитель часто отмечает разносторонний и иногда не стандартный
                    взгляд на
                    решение задач.
                    Выучился на JS-разработчика в Skillbox, поэтому немного умею в React. Заканчиваю факультет
                    Java-разработки в
                    Geekbrains, пишем интернет-магазин на Spring (будет pet-проект), учился Java на курсах JavaRush.
                    Быстро учусь и очень хочу работать и расти профессионально в IT.
                </p>
            </div>
            <div class="feedback">
                <p>
                    На первом занятии понравилась общая дружелюбная атмосфера, внимание преподавателя ко всем ученикам,
                    контент
                    урока, практическая работа и её подробный разбор. Нет того, что можно было бы отметить как "не
                    понравилось".
                    В качестве предложения: занятие идет 3 часа и хорошо бы сделать перерывы между каждым часом по 5-7
                    минут.
                    Итого будет 2 перерыва общей длительностью 10-15 минут. Возможно так будет легче после трудового
                    дня.
                    Спасибо за урок!
                </p>
            </div>
        </div>
    </section>
</div>
<div id="flex" class="container-flex">
    <div class="fvrt-books">
        <div class="title">
            <h1>Любимые книги</h1>
        </div>
        <div class="container2">
            <div class="book book1">
                <div class="cover">
                    <img src="src/images/cover/book/seagull-book.jpg" alt="Обложка книги 'Чайка'">
                </div>
                <div class="description">
                    <p><strong>Рождённый чайкой может стать соколом</strong></p>
                    <p>Чайка не умеет высоко летать и парить. Для этого ей бы понадобились короткие крылья сокола.
                        Она
                        не скользит над водой, а плюхается в море. Не тренируется в небе,
                        ведь её цель — пища. И уж, конечно, не летает ночью. Но чайка Джонатан показывает, что всё
                        это не важно. Он может сделать свои крылья короче. Он может медленно и низко летать, если
                        потренируется. Он может стать соколом, если захочет. Ведь <strong>полёт даёт ему свободу и
                            счастье, а в этом его смысл жизни.</strong></p>
                </div>
            </div>
            <div class="book book2">
                <div class="cover">
                    <img src="src/images/cover/book/star_kings-book.jpg" alt="Обложка книги 'Звездные короли'">
                </div>
                <div class="description">
                    <p>Знал ли Джон Гордон, обычный американский клерк, чем это обернется для него, когда впервые
                        услышал в своей голове чужой голос? Голос представился принцем из далекого
                        будущего, ученым, изобретателем машины, позволяющей обмениваться разумами представителям
                        различных эпох. Он предложил Гордону обменяться телами, чтобы вкусить прелести жизни
                        недоступных им ранее эпох. Гордон согласился, а кто на его месте отказался бы на неделю
                        побыть
                        звездным принцем?</p>
                </div>
            </div>
        </div>
    </div>
    <div class="fvrt-games">
        <div class="title">
            <h1>Любимые игры</h1>
        </div>
        <div class="container2">
            <div class="game game1">
                <div class="cover">
                    <img src="src/images/cover/game/dota-game.jpg" alt="Обложка игры 'Дота2'">
                </div>
                <div class="description">
                    <p><strong>Самая популярная игра в Steam</strong></p>
                    <p>Ежедневно миллионы игроков по всему миру сражаются от лица одного из более сотни героев Dota
                        2, и
                        даже после тысячи часов в ней есть чему научиться. Геймплей, возможности и герои постоянно
                        преображаются.
                        <strong>Одно поле боя и неиссякаемые возможности.</strong>
                        Стоит лишь начать постигать таинства игры, и вы обнаружите удивительное и волнующее игровое
                        многообразие, которое не превосходят другие игры — даже конкуренты.
                    </p>
                </div>
            </div>
            <div class="game game2">
                <div class="cover">
                    <img src="src/images/cover/game/star_craft.jpg" alt="Обложка игры 'Star Craft'">
                </div>
                <div class="description">
                    <p>Три расы, четыре режима и бесконечное множество игровых стилей. StarCraft II — венец развития
                        стратегий в реальном времени. Тренируйтесь, чтобы стать лучшим полководцем в галактике.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="grid" class="container-grid">
    <div class="fvrt-film">
        <div class="film">
            <div class="title">
                <h1>Игра</h1>
            </div>
            <div class="cover">
                <img src="src/images/cover/film/game-film.jpg" alt="Обложка фильма 'Игра'">
            </div>
            <div class="film-description">
                <p>
                    Николас Ван Ортон - само воплощение успеха. Он преуспевает, он невозмутим и спокоен, привык держать
                    любую ситуацию под контролем. На день рождения Николас получает необычный подарок - билет для
                    участия в «Игре».
                </p>
                <p>
                    Ему обещают, что игра вернет яркие чувства, позволит ощутить вкус и остроту жизни. Вступив в игру,
                    Николас начинает осознавать, что это игра всерьез, игра не на жизнь, а на смерть.
                </p>
            </div>
        </div>
    </div>
    <div class="fvrt-film">
        <div class="film">
            <div class="title">
                <h1>Хакеры</h1>
            </div>
            <div class="cover">
                <img src="src/images/cover/film/hakers-film.jpg" alt="Обложка фильма 'Хакеры'">
            </div>
            <div class="film-description">
                <p>
                    Развлекаясь манипуляциями в коммерческих сетях, начинающий хакер делает почти невозможное:
                    взламывает защиту секретного компьютера в крупной корпорации. При этом он случайно
                    подключается к схеме хищения средств, искусно замаскированной кем-то под компьютерный вирус,
                    действие которого может привести к глобальной экологической катастрофе.
                </p>
                <p>
                    Молодой хакер и его приятели в доли секунды превращаются в подозреваемых. Охоту за ними начинает ФБР
                    и главный компьютерщик корпорации Эллингтон по кличке Чума (Фишер Стивенс).
                </p>
            </div>
        </div>
    </div>
    <div class="fvrt-film">
        <div class="film">
            <div class="title">
                <h1>Трасса 60</h1>
            </div>
            <div class="cover">
                <img src="src/images/cover/film/Interstate_60.jpg" alt="Обложка фильма 'Трасса 60'">
            </div>
            <div class="film-description">
                <p>
                    Нил вполне доволен своей жизнью: у него обеспеченные родители, симпатичная невеста и впереди
                    блестящая карьера юриста. Но с недавних пор по ночам ему стала сниться загадочная девушка, которую
                    он никак не может выбросить из головы.
                </p>
                <p>
                    Чудаковатый Грант приглашает Нила совершить поездку по таинственной автостраде 60, которой нет ни на
                    одной карте США. И Нил бросает всё и пускается в самое невероятное и рискованное путешествие в своей
                    жизни, решив во что бы то ни стало разыскать незнакомку из своих снов.
                </p>
            </div>
        </div>
    </div>
    <div class="fvrt-film">
        <div class="film">
            <div class="title">
                <h1>Звёздные войны</h1>
            </div>
            <div class="cover">
                <img src="src/images/cover/film/star_wars-film.jpg" alt="Обложка фильма 'Звёздные войны'">
            </div>
            <div class="film-description">
                <p>
                    «Звездные войны» — одна из самых популярных и масштабных медиафраншиз, которая из года в год
                    пополняется новыми проектами. Первый фильм, «Новая надежда», вышел на экраны кинотеатров в 1977
                    году, и вряд ли даже сам Джордж Лукас мог предположить, насколько разрастется его сага.
                </p>
            </div>
        </div>
    </div>
</div>

</body>
</html>