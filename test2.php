
<?php
$class['paragraph'] = 'content';
$intro = 'hello';
$line1 = 'This is line 1';
$line2 = 'This is line 2';

echo "<p>$intro" . "<br>" .

$line1 . "</p>" . 

"<p class = {$class['paragraph']} >" $line2 ". </p>";

?>
