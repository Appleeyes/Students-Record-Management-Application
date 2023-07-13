<?php
require_once __DIR__ . '/../../header.php';
require_once __DIR__ . '/../../navigation.php';
require_once __DIR__ . '/../../main.php';
?>


<form action="/classrooms/update/id/<?= $classroom['classroom_id'] ?>" method="POST">
    <h1 class="text-center my-4">Update Classroom '<?= $classroom['name'] ?>'</h1>
        <div class="container">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="exampleFormControlInput1" value="<?= $classroom['name'] ?>" placeholder="Science">
            </div>
            <button class="form-control" id="btn" name="submit">Submit</button>
        </div>
</form>

<?php
require_once __DIR__ . '/../../footer.php';
?>