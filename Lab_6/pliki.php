
    <?php
    //nazw, wiek, kraj[], email, jezyk[], zaplata

    $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
    $kraje = ['Polska', 'Niemcy', 'Wielka Brytania', 'Czechy'];
    $platnosci = ["MasterCard", "Visa", "Przelew bankowy"];

    echo "
        <form method='post' action='pliki.php'>
            <div style='margin: 10'>
                <label for='nazw'>Nazwsiko: </label>
                <input type='text' name='nazw'>
            </div>

            <div style='margin: 10'>
                <label for='wiek'>Wiek: </label>
                <input type='number' name='wiek'>
            </div>

            <div style='margin: 10'>
                <label for='kraj'>Kraj: </label>
                <select name='kraj'>";

    foreach ($kraje as $kraj) {
        echo "<option value=$kraj>$kraj</option>";
    }

    echo "
                </select>
            </div>
            <div style='margin: 10'>
                <label for='email'>Email: </label>
                <input type='email' name='email'>
            </div>

            <div style='margin: 10'>
                <h3>Wybierz tutorial:</h3>";

    foreach ($jezyki as $jezyk) {
        echo "<input id='Checkbox1' type='checkbox' value=$jezyk name='jezyk[]'>
                    <label for='Checkbox1'>$jezyk</label>";
    }

    echo "
            </div>

            <div style='margin: 10'>
                <h3>Wybierz sposób płatności:</h3>";

    foreach ($platnosci as $platnosc) {
        echo "<input type='radio' name='zaplata' id='radio1' value=$platnosc>
                    <label for='radio1'>$platnosc</label>";
    }


    echo "</div>
            <input type='reset' name='submit'>
            <input type='submit' name='submit' value='Zapisz'>
            <input type='submit' name='submit' value='ZapiszPDO'>
            <input type='submit' name='submit' value='Java'>
            <input type='submit' name='submit' value='PHP'>
            <input type='submit' name='submit' value='CPP'>
        </form>";

    //nazw, wiek, kraj[], email, jezyk[], zaplata

    include_once("funkcje.php");
    include_once "klasy/Baza.php";
    include_once "klasy/BazaPDO.php";

    //tworzymy uchwyt do bazy danych:
    $bd = new Baza("localhost", "root", "", "klienci");
    $bdPDO = new BazaPDO("mysql:host=localhost;dbname=klienci", "root", "");
    if (filter_input(INPUT_POST, "submit")) {
        $akcja = filter_input(INPUT_POST, "submit");
        switch ($akcja) {
            case "Zapisz":
                dodajdoBD($bd);
                break;
            case "ZapiszPDO":
                dodajdoBD($bdPDO);
                break;
            case "Pokaż":
                echo $bd->select("select Nazwisko,Zamowienie from klienci", ["Nazwisko", "Zamowienie"]);
                break;
        }
    }
    ?>