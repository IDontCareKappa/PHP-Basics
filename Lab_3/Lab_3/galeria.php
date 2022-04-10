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
        
        function galeria($rows, $cols){
            $name = 'obraz';
            $nb = 1;
            print("<table>");
            for ($i = 0; $i < $rows; $i++){
                print("<tr>");
                for($j = 0; $j < $cols; $j++){
                    print("<td>");
                    print("<img src = 'miniaturki/$name$nb.JPG' alt = '$name$nb'");
                    print("<\td>");
                    $nb++;
                }
                print("</tr>");
                echo " <br> ";
            }
            print("</table>");
            
                }
        
        galeria(3, 3);
        ?>
    </body>
</html>
