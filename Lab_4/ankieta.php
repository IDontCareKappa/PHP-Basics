<body>

    <?php

    $plik = fopen("ankieta.txt", "r+");
    //$dane = file("ankieta.txt");
    $dane = file_get_contents("ankieta.txt");
    $dane = explode(',', $dane);
    $ile = count($dane);
    for ($i = 0; $i < $ile; $i++) {
        var_dump($dane[$i]);
    }
    fclose($plik);

    $tech = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];

    echo "<h1>Wybierz technologie, które znasz:</h1>
        <form method='post' action='ankieta.php'>
        <div>";

    foreach ($tech as $jezyk) {
        echo "<input id='Checkbox' type='checkbox' value=$jezyk name='tech[]'>
                        <label for='Checkbox'>$jezyk</label>";
    }

    echo "<input type='submit' name='submit' value='Wyslij'>
    </div></form>";

    include_once "funkcje.php";

    if (isset($_REQUEST["submit"])) { //jeśli kliknięto przycisk o name=submit

        $jezyki = ["C" => (int)$dane[0], "CPP" => (int)$dane[1], "Java" => (int)$dane[2], "C#" => (int)$dane[3], "HTML" => (int)$dane[4], "CSS" => (int)$dane[5], "XML" => (int)$dane[6], "PHP" => (int)$dane[7], "JavaScript" => (int)$dane[8]];
        
        $args = [
            'tech' => [
                'filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
                'flags' => FILTER_REQUIRE_ARRAY
            ]
        ];

        $dane = filter_input_array(INPUT_POST, $args);
        $dane = array_shift($dane);

        foreach ($dane as $key => $val) {
            $jezyki[$val] += 1;
        }

        $dane = "";

        foreach ($jezyki as $key => $val){
            $dane .= $val;
            $dane .= ',';
        }

        $dane = substr($dane, 0, -1);
        var_dump($dane);

        $plik = fopen("ankieta.txt", "w");
        fwrite($plik, $dane);
        fclose($plik);
    }
    $dane = explode(',', $dane);
    for ($i = 0; $i < count($tech); $i += 1){
        print_r($tech[$i].": ". $dane[$i] ."<br>");
    }

    ?>

</body>