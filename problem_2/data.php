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

        default:
            echo "Hooooaaaahhhhhhh";
    }
}

$data = $return_value[0];
$columns = $return_value[1];
?>



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
<?php endif; ?>