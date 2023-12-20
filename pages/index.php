<?php

require_once('../controllers/StudentController.php');
use controllers\StudentController;

$results = array();
$studentController = new StudentController();
$results = $studentController->getStudents();

function searchStudents($search) {
    $studentController = new StudentController();
    $results = $studentController->getStudentByDetails($search);

    ob_start();

    foreach ($results as $result) {
        echo '<div class="hover-item">';
        echo '<div style="display: flex; align-items: center">';
        echo '<div class="profile-icon" style="margin-right: 10px; margin-left: 10px">
               '. substr($result->getFirstName(), 0, 1) .'
               </div>';
        echo '<div class="user-details" style="font-size: medium; horiz-align: center">';
        echo $result->getFirstName() . ' ' . $result->getLastName();
        echo '<div style="font-size: small">';
        echo 'Prelims: ' . $result->getPrelims() . ' | Midterms: ' . $result->getMidterms() . ' | Finals: ' . $result->getFinals();
        echo '<div style="font-size: small; font-weight: bold">';
        echo 'Final Grade: ' . $result->getFinalGrade();
        echo '</div></div></div>';
        echo '<div style="margin-left: auto; margin-right: 10px; justify-content: end">';
        echo '<a class="btn btn-outline-secondary btn-margin" data-bs-toggle="modal" data-bs-target="#updateStudentModal" style="margin-right: 4px"
                    data-student-id="' . $result->getStudentId() . '"
                    data-last-name="' . $result->getLastName() . '"
                    data-first-name="' . $result->getFirstName() . '"
                    data-prelim="' . $result->getPrelims() . '"
                    data-midterm="' . $result->getMidterms() . '"
                    data-finals="' . $result->getFinals() . '">
                <i class="bi bi-pencil-fill"></i>
                Update
            </a>';
        echo '<a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal"
                    data-student-id="' . $result->getStudentId() . '"
                    data-first-name="' . $result->getFirstName() . '"
                    data-last-name="' . $result->getLastName() . '">
                Delete
            </a>';
        echo '</div></div></div>';
    }

    return ob_get_clean();
}

if (isset($_POST['searchStudent'])) {
    echo searchStudents($_POST['searchStudent']);
    exit();
}

if (isset($_POST['ClearSearch'])) {
    $results = $studentController->getStudents();
}

if(isset($_POST['Submit'])){
    $id = $_POST['student-id'];
    $lastName = $_POST['last-name'];
    $firstName = $_POST['first-name'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];

    $res = $studentController->addStudent($lastName, $firstName, $prelim, $midterm, $finals);
    if($res) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['Update'])){
    $id = $_POST['student-id'];
    $lastName = $_POST['last-name'];
    $firstName = $_POST['first-name'];
    $prelim = $_POST['prelim'];
    $midterm = $_POST['midterm'];
    $finals = $_POST['finals'];

    $res = $studentController->updateStudent($id, $lastName, $firstName, $prelim, $midterm, $finals);

    if($res) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['Delete'])){
    $id = $_POST['student-id'];
    $res = $studentController->deleteStudent($id);
    if($res) {
        echo "<meta http-equiv='refresh' content='0'>";
    }
}

if(isset($_POST['SortFirstName'])){
    $results = $studentController->getStudentsAscendingByName();
}

if(isset($_POST['SortFinalGrade'])){
    $results = $studentController->getStudentsDescendingByFinalGrade();
}

if(isset($_POST['CustomSearch'])){
    $gradeType = $_POST['grade-type'];
    $grade = $_POST['grade'];
    $condition = $_POST['condition'];

    switch ($gradeType) {
        case 'prelim':
            if ($condition == 'equal') {
                $results = $studentController->getStudentsByEqualPrelim($grade);
            } elseif ($condition == 'greater') {
                $results = $studentController->getStudentsByEqualOrGreaterThanPrelim($grade);
            } elseif ($condition == 'less') {
                $results = $studentController->getStudentsByEqualOrLessThanPrelim($grade);
            }
            break;
        case 'midterm':
            if ($condition == 'equal') {
                $results = $studentController->getStudentsByEqualMidterm($grade);
            } elseif ($condition == 'greater') {
                $results = $studentController->getStudentsByEqualOrGreaterThanMidterm($grade);
            } elseif ($condition == 'less') {
                $results = $studentController->getStudentsByEqualOrLessThanMidterm($grade);
            }
            break;
        case 'finals':
            if ($condition == 'equal') {
                $results = $studentController->getStudentsByEqualFinals($grade);
            } elseif ($condition == 'greater') {
                $results = $studentController->getStudentsByEqualOrGreaterThanFinals($grade);
            } elseif ($condition == 'less') {
                $results = $studentController->getStudentsByEqualOrLessThanFinals($grade);
            }
            break;
        case 'final-grade':
            if ($condition == 'equal') {
                $results = $studentController->getStudentsByEqualFinalGrade($grade);
            } elseif ($condition == 'greater') {
                $results = $studentController->getStudentsByEqualOrGreaterThanFinalGrade($grade);
            } elseif ($condition == 'less') {
                $results = $studentController->getStudentsByEqualOrLessThanFinalGrade($grade);
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../scripts/javascript.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/site.css">
        <title>Student Database</title>
    </head>

    <body style="background: #d7d9e5; font-family: 'DM Sans', sans-serif">
        <div>
            <div class="row d-flex justify-content-md-center align-items-center vh-100">
                <div class="col-md-5 rounded-rectangle">
                    <h2 class="mb-4" style="font-weight: bold">Student Database</h2>
                    <input type="text" id="searchStudent" placeholder="Search students here" class="form-control" name="searchStudent"/>
                    <br/>
                    <form method="post">
                        <div class="button-container2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal" style="width: 100%; margin-right: 5px">
                                Add new student
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#sortStudentModal" style="width: 100%;">
                                Sort students
                            </button>
                            <input name="ClearSearch" value="Clear search" type="submit" class="btn btn-outline-danger" style="width: 100%; margin-left: 5px">
                        </div>
                    </form>

                    <div class="user-container" id="user-container">
                        <?php foreach($results as $result): ?>
                        <div class="hover-item">
                            <div style="display: flex; align-items: center">
                                <div class="profile-icon" style="margin-right: 10px; margin-left: 10px">
                                    <?= substr($result->getFirstName(), 0, 1) ?>
                                </div>

                                <div class="user-details" style="font-size: medium; horiz-align: center">
                                    <?= $result->getFirstName() ?> <?= $result->getLastName() ?>
                                    <div style="font-size: small">
                                        Prelims: <?= $result->getPrelims() ?> | Midterms: <?= $result->getMidterms() ?> | Finals: <?= $result->getFinals() ?>
                                        <div style="font-size: small; font-weight: bold">
                                            Final Grade: <?= $result->getFinalGrade() ?>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-left: auto; margin-right: 10px; justify-content: end">
                                    <a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#updateStudentModal"
                                            data-student-id="<?= $result->getStudentId()?>"
                                            data-last-name="<?= $result->getLastName()?>"
                                            data-first-name="<?= $result->getFirstName() ?>"
                                            data-prelim="<?= $result->getPrelims() ?>"
                                            data-midterm="<?= $result->getMidterms() ?>"
                                            data-finals="<?= $result->getFinals() ?>">
                                        <i class="bi bi-pencil-fill"></i>
                                        Update
                                    </a>
                                    <a class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal"
                                            data-student-id="<?= $result->getStudentId()?>"
                                            data-first-name="<?= $result->getFirstName() ?>"
                                            data-last-name="<?= $result->getLastName()?>">
                                        <i class="bi bi-trash-fill"></i>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Insert modal -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudentModalLabel">Add new student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="input-first-name" class="form-label" id="input-length-label">First Name</label>
                                        <input id="input-first-name" class="form-control" type="text" name="first-name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="input-last-name" class="form-label" id="input-length-label">Last Name</label>
                                        <input id="input-last-name" class="form-control" type="text" name="last-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="input-prelim" class="form-label" id="input-length-label">Prelim</label>
                                        <input id="input-prelim" class="form-control" type="number" step="0.01" min="0" max="100" name="prelim" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="input-midterm" class="form-label" id="input-length-label">Midterms</label>
                                        <input id="input-midterm" class="form-control" type="number" step="0.01" min="0" max="100" name="midterm" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="input-finals" class="form-label" id="input-length-label">Finals</label>
                                        <input id="input-finals" class="form-control" type="number" step="0.01" min="0" max="100" name="finals" required>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right; margin-top: 10px">
                                <input name="Submit" value="Add student" type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Update modal -->
        <div class="modal fade" id="updateStudentModal" tabindex="-1" aria-labelledby="updateStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateStudentModalLabel">Update student details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input type="hidden" id="student-id" name="student-id">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="first-name" class="form-label" id="input-length-label">First Name</label>
                                        <input id="first-name" class="form-control" type="text" name="first-name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="last-name" class="form-label" id="input-length-label">Last Name</label>
                                        <input id="last-name" class="form-control" type="text" name="last-name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="prelim" class="form-label" id="input-length-label">Prelim</label>
                                        <input id="prelim" class="form-control" type="number" step="0.01" min="0" max="100" name="prelim" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="midterm" class="form-label" id="input-length-label">Midterms</label>
                                        <input id="midterm" class="form-control" type="number" step="0.01" min="0" max="100" name="midterm" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="finals" class="form-label" id="input-length-label">Finals</label>
                                        <input id="finals" class="form-control" type="number" step="0.01" min="0" max="100" name="finals" required>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right; margin-top: 10px">
                                <input name="Update" value="Update details" type="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete modal -->
        <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteStudentModalLabel">Delete selected student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="delete-message"></p>
                        <form method="post">
                            <div class="mb-3">
                                <input id="student-id" class="form-control" type="hidden" name="student-id" required>
                            </div>
                            <div style="text-align: right; margin-top: 10px">
                                <input name="Delete" value="Delete student" type="submit" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sort Student Modal -->
        <div class="modal fade" id="sortStudentModal" tabindex="-1" aria-labelledby="sortStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="sortStudentModalLabel">Sort students</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input name="SortFirstName" value="Sort by first name (ascending order)" type="submit" class="btn btn-outline-primary" style="width: 100%; margin-bottom: 5px">
                            <input name="SortFinalGrade" value="Sort by final grade (descending order)" type="submit" class="btn btn-outline-primary" style="width: 100%; margin-bottom: 5px">
                        </form>
                        <button class="btn btn-outline-primary" data-bs-target="#customSearch" data-bs-toggle="modal" style="width: 100%; margin-bottom: 5px">Custom search</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sort Student by final grade Modal -->
        <div class="modal fade" id="customSearch" tabindex="-1" aria-labelledby="customSearchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="customSearchModalLabel">Search by grade</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="gradeForm">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="grade-type" class="form-label">Grade type</label>
                                        <select class="form-select" id="grade-type" name="grade-type">
                                            <option value="prelim">Prelim</option>
                                            <option value="midterm">Midterm</option>
                                            <option value="finals">Finals</option>
                                            <option value="final-grade">Final grade</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="condition" class="form-label">Condition</label>
                                        <select class="form-select" id="condition" name="condition">
                                            <option value="equal">Equal</option>
                                            <option value="greater">Greater than or equal to</option>
                                            <option value="less">Less than or equal to</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="grade" class="form-label">Grade</label>
                                <input type="number" class="form-control" id="grade" name="grade" step="0.01">
                            </div>
                            <div style="margin-top: 10px">
                                <input name="CustomSearch" value="Search" type="submit" class="btn btn-outline-primary" style="width: 100%">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>