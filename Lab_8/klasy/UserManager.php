<?php
class UserManager {
    function loginForm() {
        ?>
        <h3>Formularz logowania</h3><p>
        <form action="loginProcess.php" method="post">
        Login: <input type="text" name = "login">
        Password: <input type="text" name = "passwd">
        <input type="submit" value="Zaloguj" name="zaloguj" />
        </form></p> <?php
    }

    function login($db) {
        //funkcja sprawdza poprawność logowania
        //wynik - id użytkownika zalogowanego lub -1
        $args = [
        'login' => FILTER_SANITIZE_ADD_SLASHES,
        'passwd' => FILTER_SANITIZE_ADD_SLASHES];
        //przefiltruj dane z GET (lub z POST) zgodnie z ustawionymi w $args filtrami:
        $dane = filter_input_array(INPUT_POST, $args);
        //sprawdź czy użytkownik o loginie istnieje w tabeli users
        //i czy podane hasło jest poprawne
        $login = $dane["login"];
        $passwd = $dane["passwd"];
        $userId = $db->selectUser($login, $passwd, "users");
        if ($userId >= 0) { //Poprawne dane
            //rozpocznij sesję zalogowanego użytkownika
            //usuń wszystkie wpisy historyczne dla użytkownika o $userId
            //ustaw datę - format("Y-m-d H:i:s");
            //pobierz id sesji i dodaj wpis do tabeli logged_in_users
            session_start();
            $db->delete("DELETE FROM logged_in_users WHERE userId = $userId");
            $values = "'".session_id()."','".$userId."','".(new DateTime('now'))->format("Y-m-d H:i:s")."'";
            $db->insert("INSERT INTO logged_in_users(sessionId, userId, lastUpdate) VALUES ($values)");
        }

        return $userId;
    }
    function logout($db) {
        //pobierz id bieżącej sesji (pamiętaj o session_start()
        //usuń sesję (łącznie z ciasteczkiem sesyjnym)
        //usuń wpis z id bieżącej sesji z tabeli logged_in_users
        session_start();
        $id = session_id();
        $db->delete("DELETE FROM logged_in_users WHERE sessionId = '".$id."'");
        if( isset($_SERVER['HTTP_COOKIE']) ){
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        session_destroy();
    }
    function getLoggedInUser($db, $sessionId) {
    //wynik $userId - znaleziono wpis z id sesji w tabeli logged_in_users
    //wynik -1 - nie ma wpisu dla tego id sesji w tabeli logged_in_users
        $string = "'".$sessionId."'";
        $userId = $db->query("SELECT userId FROM logged_in_users WHERE sessionId=$string");
        return ($userId > 0) ? $userId : -1;
    }
}
?>