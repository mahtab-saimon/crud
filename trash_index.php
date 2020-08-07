<?php
include_once "inc/header.php";
include_once "lib/Database.php";
include_once "classes/Student.php";
$db=new Database();
$st = new Student();

?>
<?php

$query ="SELECT * FROM `student` where is_deleted = 1";

?>

<div class="row">
    <div class="col-md-12">
        <div class="card-body text-center">
            <table class="table table-hover table-light">
                <thead>
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
                $getSt = $st->trushStudent();
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
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myBtn">
                                    Delete
                                </button>
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myBtn2">
                                    Restore
                                </button>
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

                        <div class="modal fade" id="myBtn2">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirmation</h5>
                                        <button class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to Restore!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="restore.php?id=<?=$result['id'];?>" class="btn btn-outline-dark">Restore</a>
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
        <div class="card-footer">
            <a href="index.php" class="btn btn-outline-dark btn-block">Go To List</a>

        </div>
    </div>
</div>



<?php
include_once "inc/footer.php";
?>