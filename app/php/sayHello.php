<?php

echo "<h2>Рады видеть Вас, " . $_GET["login"] . "!</h2>";

if (isset($_COOKIE["lastVisitedSite"])){
    echo "<h2>Последний посещенный сайт - " . $_COOKIE["lastVisitedSite"] . "</h2>";
}