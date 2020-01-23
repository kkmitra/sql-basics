<?php

require_once "classes/Query.php";

$q = new Query();

$marks = array();
if(isset($_GET["q"])) {
    switch($_GET["q"]) {
        case 1:
            $marks = $q->getAll();
        break;

        case 2:
            $marks = $q->getData(Query::GetNameWithSalaryGt50());
        break;
    }
}

print_r($marks);

?>

<?php if (!empty($marks)) : ?>
    <div class="mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Domain</th>
                    <th scope="col">Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marks as $key => $value) : ?>
                    <tr>
                        <th scope="row"><?php echo ($key + 1); ?></th>
                        <td><?php echo $value->Firstname; ?></td>
                        <td><?php echo $value->Lastname; ?></td>
                        <td><?php echo $value->Domain; ?></td>
                        <td><?php echo $value->Salary; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>