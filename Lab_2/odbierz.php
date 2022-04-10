<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    if (isset($_REQUEST['nazw']) && ($_REQUEST['nazw'] != "")) {
        $nazwisko = htmlspecialchars(trim($_REQUEST['nazw']));
        echo "Nazwisko: $nazwisko <br />";
    } else echo "Nie wpisano nazwiska <br />";

    if (isset($_REQUEST['wiek']) && ($_REQUEST['wiek'] != "")) {
        $wiek = htmlspecialchars(trim($_REQUEST['wiek']));
        echo "Wiek: $wiek <br />";
    } else echo "Nie wpisano wieku <br />";

    if (isset($_REQUEST['kraj']) && ($_REQUEST['kraj'] != "")) {
        $kraje = $_GET['kraj'];
        foreach ($kraje as $kraj){
            echo $kraj." ";
        } echo "<br/>";
    } else echo "Nie wybrano państwa <br />";
    
    if (isset($_REQUEST['email']) && ($_REQUEST['email'] != "")) {
        $email = htmlspecialchars(trim($_REQUEST['email']));
        echo "Email: $email <br />";
    } else echo "Nie wpisano maila <br />";

    if (isset($_REQUEST['jezyk']) && ($_REQUEST['jezyk'] != "")) {
        $jezyki = $_GET['jezyk'];
        foreach ($jezyki as $jezyk){
            echo $jezyk." ";
        } echo "<br/>";
    } else echo "Nie wybrano języka <br />";

    if (isset($_REQUEST['zaplata']) && ($_REQUEST['zaplata'] != "")) {
        $zaplata = htmlspecialchars(trim($_REQUEST['zaplata']));
        echo "Zaplata: $zaplata <br />";
    } else echo "Nie wybrano zaplaty <br />";
    
    echo "<br/><a href='./formularz.html'>Powrót do formularza</a>";

    ?>
</div>