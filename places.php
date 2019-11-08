<?php
$bristolArea = [
    "Oli" => "Bedminster",
    "Kit" => "Bedminster",
    "Gareth" => "Montpelier",
    "Claudia" => "Easton",
];

foreach($bristolArea AS $person => $area) {
    echo $person . " lives in " . $area . "<br />";
}

var_dump($bristolArea);

?>