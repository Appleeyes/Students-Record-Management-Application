<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>


<form action="/students" method="POST">
    <h1 class="text-center my-4">Add A Student</h1>
    <div class="container">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Full Name</label>
            <input type="name" name="fullname" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput2" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="johndoe@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput3" class="form-label">Classroom</label>
            <select name="classrooms" id="classroom" class="form-control">
                <option value="0">Select</option>
                <?php foreach ($classrooms as $classroom) { ?>
                    <option value="<?= $classroom['classroom_id'] ?>"><?= $classroom['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput4" class="form-label">Your Grade</label>
            <input type="number" name="grade" class="form-control" id="exampleFormControlInput4" placeholder="enter your grade(must contain number)">
        </div>
        <button class="form-control" id="btn" name="submit">Submit</button>
    </div>
</form>

<?php
require_once __DIR__ . '/../../footer.php';
?>