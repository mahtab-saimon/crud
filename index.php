<?php
include_once "inc/header.php";
include_once "lib/Database.php";
include_once "classes/Student.php";
$db=new Database();
$st = new Student();

?>

<div class="row">
    <div class="col-md-12">
        <div class="card-body text-center">
                    <table class="table table-hover table-light">
                        <thead class="">
                            <tr>
                                <th scope="col">SL No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getSt = $st->getAllStudent();
                            if ($getSt) {
                            $i = 0;
                            while ($result = $getSt->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?= $result['firstName']; ?> <?= $result['lastName']; ?></td>
                                <td><?= $result['dep']; ?></td>
                                <td><?= $result['email']; ?></td>
                                <td><?= $result['phone']; ?></td>
                                <td>
                                    <img src="<?=$result['image'];?>" class="img-fluid " height="40px" width="60px" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-outline-dark" href="edit.php?stId=<?= $result['id']; ?>">Edit</a>
                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myBtn">
                                        Delete
                                    </button>
                                    <a href="trash.php?id=<?=$result['id']; ?>" class="btn btn-outline-dark" onclick="return confirm('Are you sure you want to trash?')">Trash</a>
                                </td>
                            </tr>
                                <!-- Modal -->

                                <div class="modal fade" id="myBtn">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirmation</h5>
                                                <button class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure to delete!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="delete.php?del=<?=$result['id'];?>" class="btn btn-outline-dark">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            }
                            ?>
                        </tbody>
                    </table>
        </div>
        <div class="card-footer text-center">
            <a href="addNewStudent.php" class="btn btn-outline-dark col-md-5">Add Student</a>
            <a href="trash_index.php" class="btn btn-outline-dark col-md-5">All trash items</a>

        </div>
    </div>
</div>






<?php
include_once "inc/footer.php";
?>