<?php
$numbers = array(10, 25, 7, 45, 30);
$max = $numbers[0];

foreach($numbers as $num) {
    if($num > $max) {
        $max = $num;
    }
}

echo "Numbers: " . implode(", ", $numbers) . "<br>";
echo "Biggest number: $max";
?>
