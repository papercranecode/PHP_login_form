
<!DOCTYPE html>
<html>
	<head>
		<title>Calculator</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  </head>
  
	<body>

    <?php

    // var_dump($_POST);

    if ($_POST) { //we only want the below code to run if there's something in the box, therefore we check for POST
        //var_dump($_POST);

    //we MUST define a result variable that stores the result of the calculation in each instance. input gives a value, therefore it makes sense to name them input and value accordingly

        $inputOne = $_POST['valueOne']; //this is the first box we type into. we declare it as a variable and link to the html
        $inputTwo = $_POST['valueTwo']; //this is the second box we type into

        if ($_POST['dropdown'] == 'add') { //the POST array will list all the information you give it by the name attribute
        $result = $inputOne + $inputTwo; //make sure what you put in square brackets is the same as the name in the HTML
        }

        elseif ($_POST['dropdown'] == 'subtract') { //if the calculation is not addition, the code runs this bit instead etc.
        $result = $inputOne - $inputTwo;
        }

        elseif ($_POST['dropdown'] == 'multiply') { //we are linking the input boxes and storing the result of the calculation
        $result = $inputOne * $inputTwo;
        } 

        elseif ($_POST['dropdown'] == 'divide') {
        $result = $inputOne / $inputTwo;
        }
    }

    ?>

    <!-- This is the form -->
    <form action="calculator.php" method="POST">

    <!-- you need both a name and a value for the calculation to work. ensure to reference them in the correct places in the PHP above: name is our variable name, value is the value we have assigned to the name -->
        <input type="number" name="valueOne" value="inputOne"> 

    <!-- the dropdown is what we use in the if statement above to calculate our results -->
        <select name="dropdown">
            <option value="add">&#43;</option>
            <option value="subtract">&#8722;</option>
            <option value="multiply">&#215;</option>
            <option value="divide">&#247;</option>
          </select>

    <!-- you need both a name and a value for the calculation to work. ensure to reference them in the correct places in the PHP above: name is our variable name, value is the value we have assigned to the name -->
        <input type="number" name="valueTwo" value="inputTwo">
        <br />

        <input type="submit" value="Calculate!" class="btn btn-primary">
        <br />

    <!-- the input name result means it's connected to our result varible we defined earlier. the value is whatever will show up inside the box -->
        <p>Result:</p>
        <input type="result" readonly="readonly" value="<?php echo $result ?>"> <!-- echo out the value directly -->
    </form>

  </body>
</html>