<?php

$function = getFunctionName();

try {
    $function();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

function showCreateForm(): void
{
    global $mysqli;

    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);

    require_once __DIR__ . '/../templates/pages/students/create.php';
}

/**
 * @throws Exception
 */
function create(): void
{
    global $mysqli;

    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $classroomId = filter_input(INPUT_POST, 'classrooms');
    $grade = filter_input(INPUT_POST, 'grade');

    if ($fullname == null || $fullname == false) {
        echo "Invalid name input.";
    } elseif ($email == null || $email == false) {
        echo "Invalid email input.";
    } elseif ($classroomId == null || $classroomId == false || $classroomId == 0) {
        echo "Invalid classroom selection.";
    } elseif ($grade == null || $grade == false) {
        echo "Invalid grade input.";
    } else {
            $sql = sprintf("INSERT INTO students (student_id, fullname, email, classroom_id, grade) VALUES(NULL, '%s', '%s', %d, %d)", $fullname, $email, $classroomId, $grade);
            $statement = $mysqli->prepare($sql);
            $statement->execute();

            $redirectUrl = "/students";
            echo "<meta http-equiv='refresh' content='0; url=$redirectUrl'>";
    }
}

/**
 * @throws Exception
 */
function showUpdateForm(): void
{
    global $mysqli;

    $id = htmlspecialchars($_GET['id']);
    $sql = sprintf("SELECT * FROM students WHERE student_id=%d", $id);
    $result = $mysqli->query($sql);
    $student = $result->fetch_array(MYSQLI_ASSOC);

    if ($student === false) {
        throw new Exception('Student ' . $id . ' not found!');
    }

    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);


    require_once __DIR__ . '/../templates/pages/students/update.php';
}

/**
 * @throws Exception
 */
function update(): void
{
    global $mysqli;

    $studentId = htmlspecialchars($_GET['id']);
    $fullname = filter_input(INPUT_POST, 'fullname');
    $email = filter_input(INPUT_POST, 'email');
    $classroomId = filter_input(INPUT_POST, 'classrooms');
    $grade = filter_input(INPUT_POST, 'grade');

    if ($fullname == null || $fullname == false) {
        echo "Invalid name input.";
    } elseif ($email == null || $email == false) {
        echo "Invalid email input.";
    } elseif ($classroomId == null || $classroomId == false || $classroomId == 0) {
        echo "Invalid classroom selection.";
    } elseif ($grade == null || $grade == false) {
        echo "Invalid grade input.";
    } else {
        $sql = sprintf("UPDATE students SET fullname='%s', email='%s', classroom_id=%d, grade=%d WHERE student_id=%d", $fullname, $email, $classroomId, $grade, $studentId);

        $statement = $mysqli->prepare($sql);
        $statement->execute();

        echo '<meta http-equiv="refresh" content="1; url=\'/students\'" />';
    }
}

/**
 * @return void
 */
function read(): void
{
    global $mysqli;

    $sql = "SELECT s.*, c.name as classroom_name FROM students s LEFT JOIN classrooms c ON c.classroom_id=s.classroom_id";
    $result = $mysqli->query($sql);
    $students = $result->fetch_all(MYSQLI_ASSOC);

    require_once __DIR__ . '/../templates/pages/students/list.php';
}

function delete(): void
{
    global $mysqli;
    $studentId = htmlspecialchars($_GET['id']);
    $sql = sprintf("DELETE FROM students WHERE student_id=%d", (int)$studentId);
    $statement = $mysqli->prepare($sql);
    $statement->execute();

    $redirectUrl = "/students";
    echo "<meta http-equiv='refresh' content='0; url=$redirectUrl'>";
}

require_once __DIR__ . '/../db/db-close.php';