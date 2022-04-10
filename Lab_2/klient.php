<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    
    if (isset($_GET['nazw']) && ($_GET['nazw'] != "")) {
        $nazw = htmlspecialchars(trim($_GET['nazw']));
        echo "Nazwisko: $nazw <br/>";
    } 

    if (isset($_GET['wiek']) && ($_GET['wiek'] != "")) {
        $wiek = htmlspecialchars(trim($_GET['wiek']));
        echo "Wiek: $wiek <br/>";
    } 

    if (isset($_GET['email']) && ($_GET['email'] != "")) {
        $email = htmlspecialchars(trim($_GET['email']));
        echo "Email: $email <br/>";
    } 
    
    ?>