<?php
    $tytul = "Galeria";
    $zawartosc = "<div style='width 60%; margin:auto; text-align: center;'";
    for($i = 1; $i < 10; $i++){
        if($i % 5 == 0){
            $zawartosc .= "</div><div style='width 60%; margin:auto; text-align: center;'";
        }
        $zawartosc .= "<a href='zdjecia/obraz".$i.".JPG''>
                            <img style='width:100px; height:100px; padding:10px;' src='miniaturki/obraz".$i.".JPG' alt='foto' />
                        </a>";
    }
    $zawartosc .= "</div>";
?>