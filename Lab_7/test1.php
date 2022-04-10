<?php
session_start();

include_once "./klasy/User.php";

$user = new User("Tomasz", "Tomasz Ostrowski", "tostrowski@gmail.com", "haslo");

$_SESSION['user'] = serialize($user);

print_r("<h2>ID sesji: ". session_id() ."</h2>");

print_r("<h2>Session:</h2>");
foreach ($_SESSION as $data){
    print_r($data);
    print_r("<br>");
}

print_r("<h2>Cookie:</h2>");
foreach ($_COOKIE as $cookie){
    print_r($cookie);
    print_r("<br>");
}

print_r("<a href=test2.php>test2.php");