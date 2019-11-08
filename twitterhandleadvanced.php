<?php
$test_cases = [];

$test_cases[] = "oliward";

foreach($test_cases AS $test_input) {
    $test_output = twitter_link($test_input);
    echo $test_input . "https://twitter.com/" . $test_output . "<br />";
}

function twitter_link ($input) {
 
}

?>