<?php
        //Funkcje pomocnicze:
        function dodaj() {
            $dane = "";
            if (isset($_REQUEST["nazw"])) {
            $dane .= htmlspecialchars($_REQUEST['nazw'])." ";
            }
            if (isset($_REQUEST["wiek"])) {
                $dane .= htmlspecialchars($_REQUEST['wiek'])." ";
            }
            if (isset($_REQUEST["kraj"])) {
                $kraje = join(",",$_REQUEST['kraj']);
                $dane .= htmlspecialchars($kraje." ");
            }
            if (isset($_REQUEST["email"])) {
                $dane .= htmlspecialchars($_REQUEST['email'])." ";
            }
            if (isset($_REQUEST["jezyk"])) {
                $jezyki = join(",",$_REQUEST['jezyk']);
                $dane .= htmlspecialchars($jezyki." ");
            }
            if (isset($_REQUEST["zaplata"])) {
                $dane .= htmlspecialchars($_REQUEST['zaplata'])."\n";
            }

            $d_root = $_SERVER['DOCUMENT_ROOT'];

            $plik = fopen("$d_root/dane.txt", "a");
            fwrite($plik, $dane);
            fclose($plik);

        }
        function pokaz() {
            $d_root = $_SERVER['DOCUMENT_ROOT'];

            $plik = fopen("$d_root/dane.txt", "r");
            $dane = file("dane.txt");
            $ile = count($dane);
            for($i=0; $i < $ile; $i++){
                print_r($dane[$i]."<br/>");
            }
            fclose($plik);
        }
        function pokaz_zamowienie($tut) {
            $plik = fopen("dane.txt", "r");
            $dane = file("dane.txt");
            $ile = count($dane);
            for($i=0; $i < $ile; $i++){
                if( strstr($dane[$i], $tut) ){
                    print_r($dane[$i]."<br/>");
                }
            }
            fclose($plik);
        }
        //Skrypt właściwy do obsługi akcji (żądań):
        if (isset($_REQUEST["submit"])) { //jeśli kliknięto przycisk o name=submit
            $akcja = $_REQUEST["submit"]; //odczytaj jego value
            switch ($akcja) {
            case "Zapisz":dodaj();break;
            case "Pokaz":pokaz();break;
            case "Java":pokaz_zamowienie("Java");break;
            case "PHP":pokaz_zamowienie("PHP");break;
            case "CPP":pokaz_zamowienie("CPP");break;
            }
        }

        $server_data = $_SERVER;
        print_r("<br/><br/>");
        foreach ($server_data as $data){
            print_r($data."<br/>");
        }
        
?>