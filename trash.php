<?php
include_once "lib/Database.php";
include_once "classes/Student.php";
$db=new Database();
$st = new Student();

$_id = $_REQUEST['id'];
$_is_deleted = 1;


if (isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $trushStudentData = $st->trushStudentData($_id,$_is_deleted);
}
?>