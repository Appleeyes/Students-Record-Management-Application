<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../navigation.php';
require_once __DIR__ . '/../main.php';
?>

<div class="row mt-5">
    <div class="col-12">
        <h1>Administration Page!</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h1>Students Administration!</h1>
        <ul>
            <li><a href="students/create">Add A Student</a></li>
            <li><a href="students">List Of Students</a></li>
        </ul>
    </div>
</div>
<div class="row my-5">
    <div class="col-12">
        <h1>Classrooms Administration!</h1>
        <ul>
            <li><a href="classrooms/create">Create A Classroom</a></li>
            <li><a href="classrooms">List Of Classrooms</a></li>
        </ul>
    </div>
</div>

<?php
require_once __DIR__ . '/../footer.php';
?>