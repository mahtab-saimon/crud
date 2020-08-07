<?php
include_once "inc/header.php";
include_once "lib/Database.php";
include_once "classes/Student.php";
$db=new Database();
$st = new Student();

?>
<?php
if (isset($_REQUEST['del'])){
    $id = $_REQUEST['del'];
    $delStudentData = $st->delStudentById($id);
}
?>
