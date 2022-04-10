<?php
class User
{
    const STATUS_USER = 1;
    const STATUS_ADMIN = 2;
    protected $userName;
    protected $passwd;
    protected $fullName;
    protected $email;
    protected $date;
    protected $status;

    //metody klasy:
    function __construct($userName, $fullName, $email, $passwd)
    {
        
        $this->status = User::STATUS_USER;
        $this->userName = $userName;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->passwd = password_hash($passwd, PASSWORD_DEFAULT);
        $this->date = new DateTime('NOW');
        $this->date = $this->date->format('Y-m-d');
    }

    public function show()
    {
        print_r("<br>Username: $this->userName<br>Status: $this->status<br>Full name: $this->fullName<br>
                Email: $this->email<br>Account created: $this->date<br>");
    }

    public static function getAllUsers($file_name)
    {
        if(file_exists($file_name)){
            $users = file_get_contents("users.json");
            $users = json_decode($users);
            if(!empty($users)){
                foreach ($users as $user){
                    print_r("<br>Username: $user->userName<br>Status: $user->status<br>
                            Full name: $user->fullName<br>E-mail address: $user->email<br>
                            Account created: $user->date<br>");
                }
            } else {
                print_r("Plik $file_name jest pusty!");
            }
        } else {
            print_r("<br>Plik $file_name nie istnieje!<br>");
        }
    }

    public static function getAllUsersXML($file_name)
    {
        if(file_exists($file_name)){
            $allUsers = simplexml_load_file($file_name);
            echo "<ul>";
            foreach ($allUsers as $user):
                echo "<li>$user->userName, $user->status, $user->fullName, $user->email, $user->date</li>";
            endforeach;
            echo "</ul>";
        } else {
            print_r("<br>Plik $file_name nie istnieje!<br>");
        }
        
    }

    public function toArray(){
        return  [
            "userName" => $this->userName,
            "fullName" => $this->fullName,
            "email" => $this->email,
            "date" => $this->date,
            "passwd" => $this->passwd,
            "status" => $this->status
        ];
    }

    public function save($file_name)
    {
        $file = file_get_contents($file_name);
        if(file_exists($file_name) && !empty($file_name)){
            $data = json_decode($file, true);
            array_push($data, $this->toArray());
            file_put_contents($file_name, json_encode($data));
        } else {
            array_push($data, $this->toArray());
            file_put_contents($file_name, json_encode($data));
        }
        if(!file_exists($file_name)){
            print_r("<br>Nie mozna zapisac danych do pliku! Plik $file_name nie istnieje!<br>");
        }
    }
    
    public function saveXML($file_name)
    {
        $xml = simplexml_load_file($file_name);         //wczytujemy plik XML:
        $xmlCopy=$xml->addChild("user");                //dodajemy nowy element user (jako child)
        $xmlCopy->addChild("userName", $this->userName);//do elementu dodajemy jego właściwości
        $xmlCopy->addChild("fullName", $this->fullName);//o określonej nazwie i treści
        $xmlCopy->addChild("email", $this->email);
        $xmlCopy->addChild("date", $this->date);
        $xmlCopy->addChild("passwd", $this->passwd);
        $xmlCopy->addChild("status", $this->status);
        $xml->asXML($file_name); 
    }

    public function setUserName($userName){
        $this->userName = $userName;
    }

    public function getUserName(){
        return $this->userName;
    }

    public function setFullName($fullName){
        $this->fullName = $fullName;
    }

    public function getFullName(){
        return $this->fullName;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmai(){
        return $this->email;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getDate(){
        return $this->date;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }
}
