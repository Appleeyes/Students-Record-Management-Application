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

    require_once __DIR__ . '/../templates/pages/classrooms/create.php';
}

/**
 * @throws Exception
 */
function create(): void
{
    global $mysqli;

    $name = filter_input(INPUT_POST, 'name');
    $name = filter_input(INPUT_POST, 'name');

    if ($name == null && $name == false) {
        echo "Invalid name input.";
    } else {
        $sql = sprintf("INSERT INTO classrooms (classroom_id, name) VALUES(NULL, '%s')", $name);
        $statement = $mysqli->prepare($sql);
        $statement->execute();

        $redirectUrl = "/classrooms";
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
    $sql = sprintf("SELECT * FROM classrooms WHERE classroom_id=%d", $id);
    $result = $mysqli->query($sql);
    $classroom = $result->fetch_array(MYSQLI_ASSOC);

    if ($classroom === false) {
        throw new Exception('Classroom ' . $id . ' not found!');
    }

    require_once __DIR__ . '/../templates/pages/classrooms/update.php';
}

/**
 * @throws Exception
 */
function update(): void
{
    global $mysqli;

    $classroomId = htmlspecialchars($_GET['id']);
    $name = filter_input(INPUT_POST, 'name');

    if ($name == null && $name == false) {
        echo "Invalid name input.";
    } else {
        $sql = sprintf("UPDATE classrooms SET name='%s' WHERE classroom_id=%d", $name, $classroomId);

        $statement = $mysqli->prepare($sql);
        $statement->execute();

        echo '<meta http-equiv="refresh" content="1; url=\'/classrooms\'" />';
    }
}

function read(): void
{
    global $mysqli;

    $sql = "SELECT * FROM classrooms";
    $result = $mysqli->query($sql);
    $classrooms = $result->fetch_all(MYSQLI_ASSOC);

    require_once __DIR__ . '/../templates/pages/classrooms/list.php';
}

function delete(): void
{
    global $mysqli;
    $classroomId = htmlspecialchars($_GET['id']);;
    $sql = sprintf("DELETE FROM classrooms WHERE classroom_id=%d", (int)$classroomId);
    $statement = $mysqli->prepare($sql);
    $statement->execute();

    $redirectUrl = "/classrooms";
    echo "<meta http-equiv='refresh' content='0; url=$redirectUrl'>";
}

require_once __DIR__ . '/../db/db-close.php';