<?php

require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>LIST OF CLASSROOMS!</h1>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <?php if (count($classrooms) > 0) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $counter = 1;
                    foreach ($classrooms as $classroom) {
                        echo "<tr>";
                        echo "<td>" . $counter . "</td>";
                        echo "<td>" . $classroom['name'] . "</td>";
                        echo "<td><a href='/classrooms/delete/id/" . $classroom['classroom_id'] . "'>Delete</a>
                                  <a href='/classrooms/update/id/" . $classroom['classroom_id'] . "' class='ml-2'>Update</a></td>";
                        echo "</tr>";
                        $counter++;
                    } ?>
                </tbody>
            </table>
        <?php } else { ?>
            No classrooms Found.
        <?php } ?>
    </div>
</div>

<?php
require_once __DIR__ . '/../../footer.php';
?>