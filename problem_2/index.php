<?php

require_once "classes/Employee.php";

if (isset($_POST["submit"])) {
    $emp = new Employee($_POST);
    if ($emp->insert()) {
        header("Location: data.php");
    } else {
        $emp->error_msg;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Problem 2</title>
</head>

<body>
    <form action="index.php" method="post">
        <div>
            <input type="text" id="first_name" name="first_name" placeholder="Firstname...">
        </div>
        <div>
            <input type="text" id="last_name" name="last_name" placeholder="Lastname...">
        </div>
        <div>
            <input type="text" id="salary" name="salary" placeholder="Salary...">
        </div>
        <div>
            <input type="text" id="percentile" , name="percentile" placeholder="percentile...">
        </div>
        <div>
            <input type="text" id="domain" name="domain" placeholder="domain...">
        </div>
        <div>
            <input type="text" id="code_name" name="code_name" placeholder="code_name">
        </div>
        <div>
            <input type="text" id="id" name="id" placeholder="id">
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>