<div>
    <?php
    //nazw, wiek, kraj[], email, jezyk[], zaplata

    $jezyki = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
    $kraje = ["Polska", "Niemcy", "Francja", "Czechy"];
    $platnosci = ["Eurocard", "Visa", "Przelew bankowy"];
    
    echo "
        <form method='get' action='odbierz4.php'>
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
                <select multiple name='kraj[]'>";

                foreach ($kraje as $kraj){
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
                
                foreach ($jezyki as $jezyk){
                    echo "<input id='Checkbox1' type='checkbox' value=$jezyk name='jezyk[]'>
                    <label for='Checkbox1'>$jezyk</label>";
                }

        echo "
            </div>

            <div style='margin: 10'>
                <h3>Wybierz sposób płatności:</h3>";

                foreach ($platnosci as $platnosc){
                    echo "<input type='radio' name='zaplata' id='radio1' value=$platnosc>
                    <label for='radio1'>$platnosc</label>";
                }
            

        echo "</div>
            <input type='submit'>
            <input type='reset'>
        </form>";

    ?>