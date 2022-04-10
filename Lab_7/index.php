<?php

include_once "./klasy/User.php";
include_once "./klasy/RegistrationForm.php";

$registrationForm = new RegistrationForm();

include_once "./klasy/Baza.php";

$bd = new Baza("localhost", "root", "", "klienci");

if (filter_input(INPUT_POST, "submit")) {
    $akcja = filter_input(INPUT_POST, "submit");
    switch ($akcja) {
        case "Zapisz":
            $user = $registrationForm->checkUser();
            if ($user === NULL)
                echo "<p>Niepoprawne dane rejestracji.</p>";
            else {
                echo "<p>Poprawne dane rejestracji:</p>";
                $user->show();
                $user->saveDB($bd);
            }
            break;
        case "Pokaż":
            echo $bd->select("select * from users", ["userName", "fullName", "email", "date", "status"]);
            break;
    }
}

print_r("<h3>getAllUsersFromDB()</h3>");
User::getAllUsersFromDB($bd);
