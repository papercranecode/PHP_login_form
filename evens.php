<?php

//version 1
for ($i = 2; $i <= 100; $i += 2) { //start at 2 because we only want the evens. if we start at 0 then 0 is the first number
    echo $i . '<br />';
}

//version 2
for ($i = 2; $i <= 100; $i++) {
    if ($i % 2 === 0) {
    echo $i . '<br />';
    }
}

?>