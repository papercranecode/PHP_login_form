<?php
$cardNumbers = [
    "41112222333344445",
    "4111 2222 3333 4444",
    "4111x2222x3333x4444",
    "4111-2222-3333-4444",
    "4111-2222-3333-4444-5555",
];

foreach ($cardNumbers as $number) { //cardNumbers is the array, numbers is each item in the array

    $output = card_reformat($number);
    echo $output; 
    echo "<br />";
}

function card_reformat($input) {
    $output = preg_replace('/[^0-9]/', '', $input);
    // echo strlen($output);
    if (strlen($output) !== 16) {
        return "Invalid card length";
    }

    $output = substr_replace($output, "-", 4, 0);
    $output = substr_replace($output, "-", 9, 0);
    $output = substr_replace($output, "-", 14, 0);

    return $output;
}

//take out everything that isnt a number
//check length
//insert hyphens every 4 space