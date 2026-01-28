<?php
// Sample data
$data = [
    ["name"=>"John", "age"=>25],
    ["name"=>"Alice", "age"=>22]
];

// Create XML
$xml = new SimpleXMLElement("<students></students>");

foreach($data as $d){
    $student = $xml->addChild("student");
    $student->addChild("name", $d['name']);
    $student->addChild("age", $d['age']);
}

// Save XML
$xml->asXML("students.xml");

echo "XML file created successfully!";
?>
