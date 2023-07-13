<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../navigation.php';
require_once __DIR__ . '/../main.php';
?>


<form method="POST" action="/users/show">
    <h1 class="my-5">Students Report</h1>
    <div class="container">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Select a Classroom:</label>
            <select name="classrooms" class="form-control" id="select-form">
                <option value="0">-- Select a classroom --</option>
                <?php foreach ($classrooms as $classroom) { ?>
                    <option value="<?= $classroom['classroom_id'] ?>"><?= $classroom['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="submit">Show Students</button>
    </div>
</form>

<?php if (!empty($students)) { ?>
    <div class="row mt-5">
        <div class="col-12">
            <h2>Students in <?= $classroomName ?> Classroom:</h2>
        </div>
    </div>
    <div class="row my-5">
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <td><?= $student['fullname'] ?></td>
                            <td><?= $student['email'] ?></td>
                            <td><?= $student['grade'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="row mt-5">
        <div class="col-12">
            <h2>No Students Found.</h2>
        </div>
    </div>
<?php } ?>

<?php
require_once __DIR__ . '/../footer.php';
?>