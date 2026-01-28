<?php
if (($file = fopen("data.csv", "r")) !== FALSE) {
    echo "<table border='1'>";
    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        echo "<tr>";
        foreach($data as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    fclose($file);
}
?>
