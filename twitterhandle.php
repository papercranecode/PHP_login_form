<?php
$test_cases = [];

$test_cases[] = "oliward";
$test_cases[] = "@MR_BUBBLES";
$test_cases[] = "@hashtag%warrior";
$test_cases[] = "l@r@croft";
$test_cases[] = "poo_emoji";
$test_cases[] = "dåra_explåra";
$test_cases[] = "gsdo@[fgr]hr/";

foreach($test_cases AS $test_input) {
    $test_output = twitter_cleaner($test_input);
    echo $test_input . " ---> " . $test_output . "<br />";
}

function twitter_cleaner($input) {
    $output = strtolower($input);

    $output = str_replace('@', '', $output); //what you are searching for, what to replace it with, string you are searching on

    $output = preg_replace("/[^A-Za-z0-9]/", "", $output); //we feed the output each time to avoid resetting

    return "@" . $output; //we concatonate the @ onto the output to put the @ onto the word at the end

}
//instead of a block list, you can use an allow list
?>
