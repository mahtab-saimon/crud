
<?php
include_once "inc/header.php";
include_once "lib/Database.php";
include_once "classes/Student.php";
$db=new Database();

?>
<?php
$st = new Student();
if (isset($_POST['submit'])){
    $insertStudent = $st->studentInsert($_POST,$_FILES);
}
?>


<!--Contact section-->
<section id="contact" class="py-5">
    <div class="container">
        <h2>
            <?php
            if (isset($insertStudent)){
                echo $insertStudent;
            }
            ?>
        </h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center">Student Form</h4>
                        <div class="mt-4">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input type="text" name="firstName" id="firstname" placeholder="Last Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastName" id="lastname" placeholder="Last Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="stdId">Student Id</label>
                                    <input type="text" name="studentId" id="stdId" placeholder="Student Id" class="form-control">
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
                                            <option value="<?= $result['id'] ?>"> <?= $result['dep']; ?></option>
                                            <?php
                                        } }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" name="phone" id="phone" placeholder="Phone Number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="area">Description</label>
                                    <textarea type="text" rows="5" name="area" id="area" placeholder="Student Description" class="form-control"></textarea>
                                </div>

                                <div class="input-group form-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="uploadImg">
                                        <label class="custom-file-label" for="uploadImg">No Image Selected . . .</label>
                                    </div>
                                </div>
                                <input type="submit" value="Submit" name="submit" class=" btn btn-outline-info btn-block">
                            </form>
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
