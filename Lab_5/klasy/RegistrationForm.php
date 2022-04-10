<?php 

    class RegistrationForm{

        protected $user;

        public function __construct()
        {
            //$userName, $fullName, $email, $passwd
            print_r("
                    <h2>Rejestracja Użytkownika</h2>
                    <form method='post' action='index.php'>
                        <div style='margin: 10'>
                            <label for='userName'>Username: </label>
                            <input type='text' name='userName'>
                        </div>

                        <div style='margin: 10'>
                            <label for='fullName'>Full Name: </label>
                            <input type='text' name='fullName'>
                        </div>

                        <div style='margin: 10'>
                            <label for='email'>E-mail address: </label>
                            <input type='email' name='email'>
                        </div>

                        <div style='margin: 10'>
                            <label for='passwd'>Password: </label>
                            <input type='password' name='passwd'>
                        </div>
                        <input type='submit' value='Wyslij' name='submit'>
                    </form>
            ");
        }

        public function checkUser()
        {
            $args = [
                'userName' => [
                    'filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']
                ],
                'fullName' => [
                    'filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^[a-zA-ZąćęłńóśżźĄĆĘŁŃÓŚŻŹ]{2,20}\s[a-zA-ZąćęłńóśżźĄĆĘŁŃÓŚŻŹ]{2,20}$/']
                ],
                'email' => FILTER_VALIDATE_EMAIL,
                'passwd' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => "/.{4,}/"]]
            ];
        
            $dane = filter_input_array(INPUT_POST, $args);
            $errors = "";

            foreach ($dane as $key => $val) {
                if ($val === false or $val === NULL) {
                    $errors .= $key . " ";
                }
            }

            if(!$errors){
                $this->user = new User($dane['userName'], $dane['fullName'], $dane['email'], $dane['passwd']);
            } else {
                echo "<p>Błędne dane: $errors</p>";
                $this->user = NULL;
            }

            return $this->user;

        }

    }

?>