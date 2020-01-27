<?php

require_once "classes/Query.php";

$q = new Query();

$return_value = array();
if (isset($_GET["q"])) {
    switch ($_GET["q"]) {
        case 1:
            $return_value = $q->getAll();
            break;
        case 2:
            $return_value = $q->GetNameWithSalaryGt50();
            break;
        case 3:
            $return_value = $q->GetNameWithPercentileGt70();
            break;
        case 4:
            $return_value = $q->GetCodeNameWithPercentileLs70();
            break;

        case 5:
            $return_value = $q->GetNameWithDomainNotJava();
            break;
        case 6:
            $return_value = $q->GetDomainsWithSalary();
            break;
        case 7:
            $return_value = $q->GetDomainsWithSalaryLs30();
            break;
        case 8:
            $return_value = $q->GetIdWhereEmpCodeIsNull();
            break;
        default:
            echo "Hooooaaaahhhhhhh";
    }
}

$data = $return_value[0];
$columns = $return_value[1];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <h1><a href="index.php">Problem 7</a></h1>
    </nav>
    <div class="data-section">
        <ul class="query-list">
            <li><a href="./data.php?q=1" class="query-links">Query 1 - Get all the data...</a></li>
            <li><a href="./data.php?q=2" class="query-links">Query 2 - Get first name with salary > 50...</a></li>
            <li><a href="./data.php?q=3" class="query-links">Query 3 - Get last name with graduation percentile less 70%...</a></li>
            <li><a href="./data.php?q=4" class="query-links">Query 4 - Get code name with graduation percentile less 70%...</a></li>
            <li><a href="./data.php?q=5" class="query-links">Query 5 - Get full name that are not of domain Java</a></li>
            <li><a href="./data.php?q=6" class="query-links">Query 7 - Get employee domain with sum of its salary</a></li>
            <li><a href="./data.php?q=7" class="query-links">Query 8 - Get employee domain with sum of its salary less than 30k</a></li>
            <li><a href="./data.php?q=8" class="query-links">Query 9 - Get employee id which has not been assigned employee code</a></li>
        </ul>



        <?php if (!empty($data)) : ?>
            <div class="mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <?php foreach ($columns as $value) : ?>
                                <th scope="col"><?php echo $value ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key_i => $row) : ?>
                            <tr>
                                <th scope="row"><?php echo ($key_i + 1); ?></th>
                                <?php foreach ($row as $value) : ?>
                                    <th scope="col"><?php echo $value ?></th>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
    </div>
<?php else : ?>
    <?php // echo $q->error_msg != "" ? $q->error_msg : "Nothing to show" 
    ?>
    <?php if ($q->error_msg != "") : ?>
        <div class="error-msg">
            <?php echo $q->error_msg ?>
        </div>
    <?php else : ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th> </th>
                    <th>Nothing to show</th>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>
<?php endif; ?>

</div>
</body>

</html>