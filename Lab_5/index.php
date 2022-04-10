<?php 

    include_once "./klasy/User.php";
    include_once "./klasy/RegistrationForm.php";

    $user1 = new User("Tomson", "Tomasz Ostrowski", "tomasz@gmail.com", "tajnehaslo");
    $user2 = new User("Trybson", "Paweł Trybała", "trybson@gmail.com", "krzycztrybson");

    $user1->show();
    $user2->show();

    $user1->setStatus(User::STATUS_ADMIN);
    $user1->show();

    $registrationForm = new RegistrationForm();

    print_r("<h3>getAllUsers()</h3>");
    User::getAllUsers("users.json");

    if (filter_input(INPUT_POST, 'submit',
    FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
    $user3 = $registrationForm->checkUser();
    if ($user3 === NULL)
        echo "<p>Niepoprawne dane rejestracji.</p>";
    else {
        echo "<p>Poprawne dane rejestracji:</p>";
        $user3->show();
        $user3->save("users.json");
        $user3->saveXML("users.xml");
    }

    print_r("<h3>getAllUsersXML()</h3>");
    User::getAllUsersXML("users.xml");
}

?>