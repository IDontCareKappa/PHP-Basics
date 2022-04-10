<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $a = 1234;
        $b = 567.789;
        $c = 1;
        $d = 0;
        $e = true;
        $f = "0";
        $g = "Typy w PHP";
        $h = [1,2,3,4];
        $i = [];
        $j = ["zielony", "czerwony", "niebieski"];
        $k = ["Agata", "Agatowska", 4.67, true];
        $datetime = new DateTime();
        
        print("a = $a <br>");
        print("b = $b <br>");
        print("c = $c <br>");
        print("d = $d <br>");
        print("e = $e <br>");
        print("f = $f <br>");
        print("g = $g <br>");
        print("h = ");
        for($x = 0; $x < count($h); $x++){
            print("$h[$x], ");
        }
        print("i = ");
        for($x = 0; $x < count($i); $x++){
            print("$i[$x], ");
        }
        print("<br>j = ");
        for($x = 0; $x < count($j); $x++){
            print("$j[$x], ");
        }
        print("<br>k = ");
        for($x = 0; $x < count($k); $x++){
            print("$k[$x], ");
        }
        $date = $datetime->format("Y-m-d");
        print("<br>l = $date)<br>");
        
        print("is_bool(a) = ".is_bool($a)."<br>");
        print("is_numeric(b) = ".is_numeric($b). "<br>");
        print("is_string(g) = ".is_string($g). "<br>");
        print("is_array(h) = ".is_array($h). "<br>");
        print("is_object(datetime) = ".is_object($datetime). "<br>");
        
        print("var_dump() = ");
        print(var_dump($h)."<br>");
        print("print_r() = ");
        print(print_r($j)."<br>");
        ?>
    </body>
</html>
