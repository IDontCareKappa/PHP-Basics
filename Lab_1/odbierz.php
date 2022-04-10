<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    if (isset($_REQUEST['nazw']) && ($_REQUEST['nazw'] != "")) {
        $nazwisko = htmlspecialchars(trim($_REQUEST['nazw']));
        echo "Nazwisko: $nazwisko <br />";
    } else echo "Nie wpisano nazwiska <br />";
    //pozostałe instrukcje pobierające dane wysłane
    //z formularza w postaci parametrów żądania
    //...
    ?>
</div>