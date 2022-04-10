<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    
    $brak_danych = false;

    if (isset($_GET['jezyk']) && ($_GET['jezyk'] != "")) {
        echo "Wybrane tutoriale: ";
        $jezyki = join(",",$_GET['jezyk']);
        echo $jezyki;
        echo "<br/>";
    } else echo "Nie wybrano turoriala <br />";

    if (isset($_GET['zaplata']) && ($_GET['zaplata'] != "")) {
        $zaplata = $_GET['zaplata'];
        echo "Sposób zapłaty: $zaplata <br />";
    } else echo "Nie wybrano sposobu zapłaty <br />";
    
    if (isset($_GET['nazw']) && ($_GET['nazw'] != "")) {
        $nazw = htmlspecialchars(trim($_GET['nazw']));
    } else $brak_danych = true;

    if (isset($_GET['wiek']) && ($_GET['wiek'] != "")) {
        $wiek = htmlspecialchars(trim($_GET['wiek']));
    }else $brak_danych = true;

    if (isset($_GET['email']) && ($_GET['email'] != "")) {
        $email = htmlspecialchars(trim($_GET['email']));
    } else $brak_danych = true;

    if (!$brak_danych){
        echo "<p><a href='klient.php?nazw=$nazw&wiek=$wiek&email=$email'>Dane klienta</p>";
    } else echo "Nie podano wszystkich danych!";
    

    ?>