<?php //there was a space between ? and php

for($I = 1; $I <= 1000; $I++){ //wrong variable name on last bit, unnecessary semicolon before closing brackets
    echo '$I <br />';
}

while($x < 31){ //causes an infinite loop, condition never becomes false
    echo 'Today is the '.$x.'th of June<br/>';
}

echo 'Apple'."<br />"; //these three are echoing out for no reason?
echo 'Pear',"<br />"; //uneccesary comma, but not throwing any errors atm
echo "Banana".'<br />'; // more fruit ; missing semicolon, added in


if (1==1){
    echo "Maths appears to be working<br />"; // String opened with " and closed with ', syntax error

    if (2==2){
        echo 'Maths still appears to be working<br />';
    }else{
        echo 'Oh no! Maths is broken!';
    }
}

if (3==3)
    echo 'Yep, maths is still working<br />'; //this is a separate if statement, but the echo is connected to the above one??

$query = "SELECT FROM users WHERE first_name = 'Oli' AND last_name = 'Ward"; //no database connected, missing * in SELECT FROM
$result = mysqli_query(query); //missing dollar sign, this is not a variable

//1. line 1: removed space between ?? and php at the opening tag
//2. line 4: removed semicolon after $I++
//3. line 4: wrong variable name in last part of the for loop: $l++;, amended to $I++; otherwise the loop would not be able to increment the number each time
//4. line 17: conflicting " and ' on the string "Maths appears to be working<br />', replaced closing ' with "
//5. line 11, 12, 13: these three are echoing out for no reason, should be method or function using them?
//6. line 12: uncessesary comma after 'Pear', but not throwing any errors
//7. line 16: was missing closing bracket, added on line 25 as the below if and else seem to be part of it
//8. line 13: was missing closing semicolon, added one in
//9. line 29: this line is trying to do a query on a database, but none has been defined and database.php not included
//10. line 30: query does not have a dollar sign in front of it, so it is not the variable defined above
//11. line 26: the echo string suggests this if statement should be a part of the above if statement??
//12. line 7 and 8: causes an infinite loop that makes the tab crash as the condition never becomes false
//13. line 29: missing * in SELECT * FROM