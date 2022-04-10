<?php
//Funkcje pomocnicze:

function dodaj()
{
    echo "<h3>Dodawanie do pliku:</h3>";
    walidacja();
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

include_once "./klasy/Baza.php";

function dodajdoBD($bd)
{
    if ($dane = walidacja()) {
        $dane_nazwy = ["nazw", "wiek", "kraj", "email", "zaplata"];
        $values = "";
        foreach ($dane_nazwy as $nazwa) {
            $values .= "'" . $dane[$nazwa] . "',";
        }
        $values .= "'" . implode(",", $dane['jezyk']) . "'";
        $sql = "INSERT INTO klienci (Nazwisko, Wiek, Panstwo, Email, Platnosc, Zamowienie ) VALUES ($values)";
        print_r("<br>$sql<br>");
        if ($bd->insert($sql)) {
            echo "Zapisano";
        } else {
            echo "blad";
        }
    }
}

function pokazZamowienie($bd, $zamowienie)
{
    $sql = "SELECT * FROM klienci WHERE klienci.klienci.Zamowienie = '$zamowienie'";
    print_r($sql);
    echo $bd->select($sql, ["Nazwisko", "Zamowienie"]);
}
