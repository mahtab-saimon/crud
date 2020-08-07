
<?php
include_once "inc/header.php";
include_once "lib/Database.php";
include_once "classes/Student.php";
$db=new Database();
$st=new Student();

?>
<?php
if (!isset($_REQUEST['stId']) || $_REQUEST['stId'] == NULL){

    header("location:studentList.php");

}
else{
    $id = $_REQUEST['stId'];
}
?>


<?php
$st = new Student();
if (isset($_POST['submit'])){
    $StudentDataUpdate = $st->studentDataUpdate($_POST,$_FILES,$id);
}
?>


<!--Contact section-->
<section id="contact" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center display-3">Update Student Form </h4>
                        <div class="mt-4">
                            <h2 class="display-3">
                            <?php
                            if (isset($StudentDataUpdate)) {
                                echo $StudentDataUpdate;
                            }
                            ?>
                            </h2>
                            <?php
                            $getSt = $st->getStudentById($id);
                            if ($getSt){
                            while ($value = $getSt->fetch_assoc()) {
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstName" id="firstname" value="<?= $value['firstName'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastName" id="lastname" value="<?= $value['lastName'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="stdId">Student Id</label>
                                        <input type="text" name="studentId" id="stdId" value="<?= $value['studentId'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="dep">Select Department</label>
                                        <select name="dep" id="dep" class="form-control">
                                            <option> Select Department</option>
                                            <?php
                                            $getDep = $st->getAllDep();
                                            if ($getDep) {
                                            while ($result = $getDep->fetch_assoc()) {
                                                ?>
                                                <option

                                                    <?php
                                                    if ($value['dep'] == $result['id']) {
                                                        ?>

                                                        selected="selected"
                                                    <?php }
                                                    ?>
                                                        value="<?= $result['id'] ?>"> <?= $result['dep']; ?>
                                                </option>
                                                <?php
                                            } }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email </label>
                                        <input type="email" name="email" id="email" value="<?= $value['email'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" name="phone" id="phone" value="<?= $value['phone'] ?>"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="area">Description</label>
                                        <textarea type="text" rows="5" name="area" id="area" class="form-control">
                                            <?= $value['area'] ?>
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <img src="<?= $value['image'] ?>" height="40px" width="60px" alt="">
                                        <div class="custom-file col-md-11">
                                            <input type="file" class="custom-file-input" name="image" id="uploadImg">
                                            <label class="custom-file-label" for="uploadImg">No Image Selected . . .</label>
                                        </div>
                                    </div>
                                    <input type="submit" value="Submit" name="submit"
                                           class=" btn btn-outline-info btn-block">
                                </form>
                                <?php
                            }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include_once "inc/footer.php";
?>
