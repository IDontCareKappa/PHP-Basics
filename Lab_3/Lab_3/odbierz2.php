<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    //nazw, wiek, kraj[], email, jezyk[], zaplata

    /*if (isset($_GET['nazw']) && ($_GET['nazw'] != "")) {
        $nazwisko = $_GET['nazw'];
        echo "Nazwisko: $nazwisko <br />";
    } else echo "Nie wpisano nazwiska <br />";

    if (isset($_GET['wiek']) && ($_GET['wiek'] != "")) {
        $wiek = $_GET['wiek'];
        echo "Wiek: $wiek <br />";
    } else echo "Nie wpisano wieku <br />";

    if (isset($_GET['kraj']) && ($_GET['kraj'] != "")) {
        $kraj_arr = $_GET['kraj'];
        echo "Wybrany kraj: ";
        foreach ($kraj_arr as $kraj){
            echo $kraj." ";
        } echo "<br/>";
    } else echo "Nie wybrano kraju <br />";
    
    if (isset($_GET['email']) && ($_GET['email'] != "")) {
        $email = $_GET['email'];
        echo "Email: $email <br />";
    } else echo "Nie wpisano maila <br />";

    if (isset($_GET['jezyk']) && ($_GET['jezyk'] != "")) {
        $jezyk_arr = $_GET['jezyk'];
        echo "Wybrane tutoriale: ";
        foreach ($jezyk_arr as $jezyk){
            echo $jezyk." ";
        } echo "<br/>";
    } else echo "Nie wybrano tutorialu <br />";

    if (isset($_GET['zaplata']) && ($_GET['zaplata'] != "")) {
        $zaplata = $_GET['zaplata'];
        echo "Sposób zapłaty: $email <br />";
    } else echo "Nie wybrano sposobu zapłaty <br />";*/

    echo "<h3>REQUEST:</h3>";
    foreach($_REQUEST as $key=>$value) {
        echo "$key = $value <br />";
        echo var_dump($value)."<br/>";
    }

    echo "<h3>GET:</h3>";
    foreach($_GET as $key=>$value) {
        echo "$key = $value <br />";
        echo var_dump($value)."<br/>";
    }
    
    echo "<h3>POST:</h3>";
    foreach($_POST as $key=>$value) {
        echo "$key = $value <br />";
        echo var_dump($value)."<br/>";
    }
    
    echo "<br/><a href='./formularz.html'>Powrót do formularza</a>";

    ?>
</div>