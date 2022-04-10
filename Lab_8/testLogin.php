<a href="loginProcess.php?akcja=wyloguj">Wyloguj</a>
<br>
<h3>Dane zalogowanego użytkownika</h3>
<?php
    session_start();
    include_once 'klasy/Baza.php';
    include_once 'klasy/User.php';
    include_once 'klasy/UserManager.php';
    $db = new Baza("localhost", "root", "", "klienci");
    $sessionID = session_id();
    $sql = "SELECT userId FROM logged_in_users WHERE sessionId = '".$sessionID."'";
    $mysqli = $db->getMysqli();
    $userId = $mysqli->query($sql)->fetch_object()->userId;
    if($userId > 0){
        $sql = "SELECT * FROM users WHERE klienci.users.id = '".$userId."'";
        $data = $mysqli->query($sql)->fetch_object();
        $data_array = get_object_vars($data);
        foreach ($data_array as $item){
            echo $item." ";
            echo "<br>";
        }
    } else {
        header("location:loginProcess.php");
    }
?>