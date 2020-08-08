<?php
include_once "lib/Database.php";
include_once "classes/Student.php";
$db=new Database();
$st = new Student();

$_id = $_REQUEST['id'];
$_is_deleted = 0;


if (isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $trushStudentData = $st->restoreStudentData($_id,$_is_deleted);
}
header("location:index.php");
?>