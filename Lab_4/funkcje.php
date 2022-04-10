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
        doPliku("dane.txt", $dane);
    } else {
        echo "<br>Niepoprawne dane: " . $errors;
    }
}

function doPliku($nazwa, $dane_tablica)
{
    $dane = "";

    $tags = ["nazw", "wiek", "email", "zaplata"];

    foreach ($tags as $tag) {
        $dane .= $dane_tablica[$tag] . " ";
    }

    $dane .= implode(",", $dane_tablica['jezyk']);
    $dane .= ' ';
    $dane .= implode(",", $dane_tablica['kraj']);
    $dane .= PHP_EOL;

    //$d_root = $_SERVER['DOCUMENT_ROOT'];
    $d_root = ".";

    $plik = fopen("$d_root/$nazwa", "a");
    fwrite($plik, $dane);
    fclose($plik);

    echo "<p>Zapisano: <br /> $dane</p>";
}

function pokaz()
{
    //$d_root = $_SERVER['DOCUMENT_ROOT'];
    $d_root = ".";

    $plik = fopen("$d_root/dane.txt", "r");
    $dane = file("$d_root/dane.txt");
    $ile = count($dane);
    for ($i = 0; $i < $ile; $i++) {
        print_r($dane[$i] . "<br/>");
    }
    fclose($plik);
}
function pokaz_zamowienie($tut)
{
    $plik = fopen("dane.txt", "r");
    $dane = file("dane.txt");
    $ile = count($dane);
    for ($i = 0; $i < $ile; $i++) {
        if (strpos($dane[$i], $tut)) {
            print_r($dane[$i] . "<br/>");
        }
    }
    fclose($plik);
}

function stats()
{
    $less_than_18 = 0;
    $more_than_49 = 0;

    $plik = fopen("dane.txt", "r");
    $dane = file("dane.txt");
    $ile = count($dane);
    for ($i = 0; $i < $ile; $i++) {
        list(, $wiek,) = explode(' ', $dane[$i]);
        if ($wiek < 18) $less_than_18 += 1;
        elseif ($wiek > 49) $more_than_49 += 1;
    }

    print_r("Liczba wszystkich zamówień: $ile <br/><br/>");
    print_r("Liczba zamówień od osób w wieku < 18 lat: $less_than_18 <br/><br/>");
    print_r("Liczba zamówień od osób w wieku >= 50 lat: $more_than_49 <br/><br/>");

    fclose($plik);
}




//$server_data = $_SERVER;
//print_r("<br/><br/>");
//foreach ($server_data as $data) {
//    print_r($data . "<br/>");
//}
