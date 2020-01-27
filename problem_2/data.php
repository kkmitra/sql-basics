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


<ul>
    <li><a href="./data.php?q=1">Query 1 - Get all the data...</a></li>
    <li><a href="./data.php?q=2">Query 2 - Get first name with salary > 50...</a></li>
    <li><a href="./data.php?q=3">Query 3 - Get last name with graduation percentile less 70%...</a></li>
    <li><a href="./data.php?q=4">Query 4 - Get code name with graduation percentile less 70%...</a></li>
    <li><a href="./data.php?q=5">Query 5 - Get full name that are not of domain Java</a></li>
    <li><a href="./data.php?q=6">Query 7 - Get employee domain with sum of its salary</a></li>
    <li><a href="./data.php?q=7">Query 8 - Get employee domain with sum of its salary less than 30k</a></li>
    <li><a href="./data.php?q=8">Query 9 - Get employee id which has not been assigned employee code</a></li>
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
<?php else : ?>
    <?php echo $q->error_msg != "" ? $q->error_msg : "Nothing to show" ?>
<?php endif; ?>