<div>
    <h2>Dane odebrane z formularza:</h2>
    <?php
    //nazw, wiek, kraj[], email, jezyk[], zaplata

    //a) pętli foreach (dla tablicy wartości $_REQUEST['jezyki'])

    echo "<h3>foreach</h3>";

    if (isset($_REQUEST['jezyk']) && ($_REQUEST['jezyk'] != "")) {
        $jezyki = $_REQUEST['jezyk'];
        echo "Wybrane tutoriale: ";
        foreach ($jezyki as $jezyk){
            echo $jezyk." ";
        }
    } else echo "Nie wybrano turoriala <br />";
    
    echo "<h3>join()</h3>";

    if (isset($_REQUEST['jezyk']) && ($_REQUEST['jezyk'] != "")) {
        echo "Wybrane tutoriale: ";
        $jezyki = join(",",$_REQUEST['jezyk']);
        echo $jezyki;
    } else echo "Nie wybrano turoriala <br />";

    echo "<h3>var_dump()</h3>";

    foreach($_REQUEST as $key=>$value) {
        if (is_array($value)){
            foreach ($value as $val){
                echo "$key = $val <br />";
                echo var_dump($val)."<br/>";
            }
        } else {
            echo "$key = $value <br />";
            echo var_dump($value)."<br/>";
        }
        echo "<br/>";
    }

    ?>