<?php

session_start();

include_once "./klasy/User.php";

print_r("<h2>ID sesji: ". session_id() ."</h2>");

$user_z_sesji = $_SESSION['user'];
print_r("<h3>Wartość elementu o kluczu 'user' z sesji:</h3>".$user_z_sesji."<br>");

$user = unserialize($_SESSION['user']);
print_r("<h3>Obiekt po odtworzeniu (deserializacji):</h3>");
$user->show();

session_destroy();

print_r("<br><a href=test1.php>test1.php");