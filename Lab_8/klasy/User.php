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


    public function toArray()
    {
        return  [
            "userName" => $this->userName,
            "fullName" => $this->fullName,
            "email" => $this->email,
            "date" => $this->date,
            "passwd" => $this->passwd,
            "status" => $this->status
        ];
    }

    public function saveDB($bd)
    {
        $values = "'".$this->userName."','".$this->fullName."','".$this->email."','".$this->passwd."','".$this->status."','".$this->date."'";
        $sql = "INSERT INTO users (userName, fullName, email, passwd, status, date ) VALUES ($values)";
        print_r("<br>$sql<br>");
        if ($bd->insert($sql)) {
            echo "Zapisano";
        } else {
            echo "blad";
        }
    }

    public static function getAllUsersFromDB($bd)
    {
        $sql = "SELECT * from users";
        echo $bd->select($sql, ["userName", "fullName", "email", "status"]);
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName()
    {
        return $this->fullName;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmai()
    {
        return $this->email;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
}
