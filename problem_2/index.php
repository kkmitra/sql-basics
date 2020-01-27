<?php

if (isset($_POST["submit"])) {
    require_once "classes/Employee.php";

    $emp = new Employee($_POST);
    if ($emp->insert()) {
        header("Location: data.php?q=1");
        exit();
    } else {
        $GLOBALS["error_msg"] = $emp->error_msg;
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

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav>
        <h1>Problem 2</h1>
        <a href="data.php?q=1">View All Data</a>
    </nav>
    <div class="container display-flex flex-center direction-column">
        <?php if(isset($error_msg)):?>
            <div class="error-msg"><?php echo $error_msg?></div>
        <?php endif; ?>
        <form action="index.php" method="post">
            <div>
                <input type="text" id="code_name" name="code_name" placeholder="code_name">
            </div>
            <div class="grid">
                <div>
                    <input type="text" id="first_name" name="first_name" placeholder="Firstname...">
                </div>
                <div>
                    <input type="text" id="last_name" name="last_name" placeholder="Lastname...">
                </div>
            </div>
            <div>
                <input type="text" id="salary" name="salary" placeholder="Salary...">
            </div>
            <div class="grid">
                <div>
                    <input type="text" id="domain" name="domain" placeholder="domain...">
                </div>
                <div>
                    <input type="text" id="percentile" , name="percentile" placeholder="percentile...">
                </div>
            </div>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
</body>

</html>


<!-- TODO: Update UI... -->