<?php
//wykorzystaj lekko zmodyfikowane wcześniej tworzone funkcje
//pomocnicza funkcja generująca formularz:
function drukuj_form()
{
    $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "PHP"];
    $kraje = ["Polska", "Niemcy", "WielkaBrytania", "Czechy"];
    $platnosci = ["MasterCard", "Visa", "Przelew"];

    $zawartosc = "
        <form action='?strona=formularz' method='POST' >
            <div style='margin: auto; width: 60%; padding: 10px; text-align:center;'>
                <label for='nazw'>Nazwisko: </label>
                <input type='text' name='nazw'>
            </div>

            <div style='margin: auto; width: 60%; padding: 10px; text-align:center;'>
                <label for='wiek'>Wiek: </label>
                <input type='number' name='wiek'>
            </div>

            <div style='margin: auto; width: 60%; padding: 10px; text-align:center;'>
                <label for='kraj'>Kraj: </label>
                <select multiple name='kraj[]'>";

    foreach ($kraje as $kraj) {
        $zawartosc .= "<option value=$kraj>$kraj</option>";
    }

    $zawartosc .= "
                </select>
            </div>
            <div style='margin: auto; width: 60%; padding: 10px; text-align:center;'>
                <label for='email'>Email: </label>
                <input type='email' name='email'>
            </div>

            <div style='margin: auto; width: 60%; padding: 10px; text-align:center;'>
                <h3>Wybierz tutorial:</h3>";

    foreach ($jezyki as $jezyk) {
        $zawartosc .= "<input id='Checkbox1' type='checkbox' value=$jezyk name='jezyk[]'>
                    <label for='Checkbox1'>$jezyk</label>";
    }

    $zawartosc .= "
            </div>

            <div style='margin: auto; width: 60%; padding: 10px; text-align:center;'>
                <h3>Wybierz sposób płatności:</h3>";

    foreach ($platnosci as $platnosc) {
        $zawartosc .= "<input type='radio' name='zaplata' id='radio1' value=$platnosc>
                    <label for='radio1'>$platnosc</label>";
    }


    $zawartosc .= "</div>
            <div style = 'width: 10%; margin: auto; padding: 10px; text-align:center;'>
                <input type='submit' value = 'Dodaj' name = 'submit'>
                <input type='submit' value = 'Pokaż' name = 'submit'>
            </div>
        </form>";


    return $zawartosc;
}
function walidacja()
{
    $args = [
        'nazw' => [
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']
        ],
        'wiek' => FILTER_VALIDATE_INT,
        'kraj' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'jezyk' => [
            'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'flags' => FILTER_REQUIRE_ARRAY
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'zaplata' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
    ];

    $dane = filter_input_array(INPUT_POST, $args);

    var_dump($dane);

    $errors = "";

    foreach ($dane as $key => $val) {
        if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
    }

    if ($errors === "") {
        return $dane;
    } else {
        echo "<br>Niepoprawne dane: " . $errors;
        return false;
    }
}

function dodajdoBD($bd)
{
    if ($dane = walidacja()) {
        $dane_nazwy = ["nazw", "wiek", "email", "zaplata"];
        $values = "";
        foreach ($dane_nazwy as $nazwa) {
            $values .= "'" . $dane[$nazwa] . "',";
        }
        $values .= "'" . implode(",", $dane['kraj']) . "',";
        $values .= "'" . implode(",", $dane['jezyk']) . "'";
        $sql = "INSERT INTO klienci (Nazwisko, Wiek, Email, Platnosc, Panstwo, Zamowienie ) VALUES ($values)";
        print_r("<br>$sql<br>");
        if ($bd->insert($sql)) {
            echo "Zapisano";
        } else {
            echo "blad";
        }
    }
}
//uchwyt do bazy klienci:
include_once 'C:\xampp\htdocs\Lab_11\klasy\Baza.php';
$tytul = "<h2>Formularz zamowienia</h2>";
$zawartosc = drukuj_form();

echo $tytul;
echo $zawartosc;

$bd = new Baza("localhost", "root", "", "klienci");
if (filter_input(INPUT_POST, "submit")) {
    $akcja = filter_input(INPUT_POST, "submit");
    switch ($akcja) {
        case "Dodaj":
            dodajdoBD($bd);
            break;
        case "Pokaż":
            $zawartosc .= $bd->select(
                "select * from klienci",
                ["Nazwisko", "Email", "Zamowienie"]
            );
            break;
    }
}
