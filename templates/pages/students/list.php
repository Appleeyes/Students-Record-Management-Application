<?php

require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>LIST OF STUDENTS!</h1>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <?php if (count($students) > 0) { ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Classroom</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student) {
                        echo "<tr>";
                        echo "<td>" . $student['fullname'] . "</td>";
                        echo "<td>" . $student['email'] . "</td>";
                        echo "<td>" . $student['classroom_name'] . "</td>";
                        echo "<td>" . $student['grade'] . "</td>";
                        echo "<td><a href='/students/delete/id/" . $student['student_id'] . "'>Delete</a>
                                  <a href='/students/update/id/" . $student['student_id'] . "' class='ml-2'>Update</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php } else { ?>
            No students Found.
        <?php } ?>
    </div>
</div>

<?php
require_once __DIR__ . '/../../footer.php';
?>