<?php
session_start();
$step = $_GET['step'] ?? null;
switch ($step) {
    case '1':
        $company = $_POST;
        $_SESSION['company_info'] = $company;
        header('Location: ./index.php?step=2');
        break;
    case '2':
        $students = $_POST;
        $_SESSION['students_info'] = $students;
        header('Location: ./index.php?step=3');
        break;
    default:
        echo 'Error';
        break;
}