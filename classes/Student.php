<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php";
include_once $filepath."/../helpers/Format.php";
?>


<?php

class student
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function studentInsert($data, $file)
    {
        $firstName = $this->fm->validation($data['firstName']);
        $firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName = $this->fm->validation($data['lastName']);
        $lastName = mysqli_real_escape_string($this->db->link, $data['lastName']);
        $studentId = $this->fm->validation($data['studentId']);
        $studentId = mysqli_real_escape_string($this->db->link, $data['studentId']);
        $email = $this->fm->validation($data['email']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $area = $this->fm->validation($data['area']);
        $area = mysqli_real_escape_string($this->db->link, $data['area']);
        $dep = $this->fm->validation($data['dep']);
        $dep = mysqli_real_escape_string($this->db->link, $data['dep']);


        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "img/" . $unique_image;
        if ($firstName == "" || $lastName == "" || $studentId == "" || $dep == "" || $email == "" || $phone == "" || $area == "" ) {
            $msg = "<span style='color:red; font_size:18px;'>Fields must not be empty ..</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO student(firstName, lastName, studentId, email ,phone ,area ,image, dep) 
           VALUES('$firstName', '$lastName', '$studentId', '$email', '$phone', '$area', '$uploaded_image','$dep')";
            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                header("location:index.php");
            }
        }
    }
    public function getAllStudent()
    {
        $query = "SELECT student.*, department.dep
FROM student
INNER JOIN department ON student.dep = department.id where student.is_deleted=0;";
        $result = $this->db->select($query);
        return $result;
    }

    public function getStudentById($id)
    {
        $query = "select * from student where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function studentDataUpdate($data, $file, $id)
    {

        $firstName = $this->fm->validation($data['firstName']);
        $firstName = mysqli_real_escape_string($this->db->link, $data['firstName']);
        $lastName = $this->fm->validation($data['lastName']);
        $lastName = mysqli_real_escape_string($this->db->link, $data['lastName']);
        $studentId = $this->fm->validation($data['studentId']);
        $studentId = mysqli_real_escape_string($this->db->link, $data['studentId']);
        $email = $this->fm->validation($data['email']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $area = $this->fm->validation($data['area']);
        $area = mysqli_real_escape_string($this->db->link, $data['area']);
        $dep = $this->fm->validation($data['dep']);
        $dep = mysqli_real_escape_string($this->db->link, $data['dep']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "img/" . $unique_image;
        if ($firstName == "" || $lastName == "" || $studentId == ""  || $email == "" || $phone == "" || $area == ""|| $dep == "" ) {
            $msg = "<span style='color:red; font_size:18px;'>Fields must not be empty ..</span>";
            return $msg;
        } else {
            if (!empty($file_name)) {
                if ($file_size > 1048567) {
                    echo "<span class='success'>Image size should be less 1MB. </span>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);

                    $query = "update student
                                 set
                       firstName='$firstName',
                       lastName='$lastName',
                       studentId='$studentId',       
                       email='$email',
                        phone='$phone',
                        area='$area',
                      image='$uploaded_image',
                      dep='$dep'
                      where id = '$id'    
                ";

                    $updated_rows = $this->db->update($query);
                    if ($updated_rows) {
                        header("location:index.php");
                    }
                }
            } else {
                $query = "update student
                        set
                        firstName='$firstName',
                       lastName='$lastName',
                        studentId='$studentId',
                       email='$email',
                        phone='$phone',
                        area='$area',
                         dep=$dep
                        where id = '$id'";

                $updated_rows = $this->db->update($query);
                if ($updated_rows) {
                    header("location:index.php");
                }


            }
        }
    }

    public function getAllDep(){
        $query = "select * from department";
        $result = $this->db->select($query);
        return $result;
    }

    public function delStudentById($id)
    {
        $unlinkQuery = "select * from student where id ='$id'";
        $getData = $this->db->select($unlinkQuery);
        if ($getData) {
            while ($delImg = $getData->fetch_assoc()) {
                $delimage = $delImg['image'];
                unlink($delimage);
            }
        }
        $query = "delete from student where id ='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            header("location:index.php");
        }
    }
    public function trushStudentData($id,$_is_deleted){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $_is_deleted = mysqli_real_escape_string($this->db->link, $_is_deleted);


        $query = "UPDATE student SET is_deleted = '$_is_deleted' WHERE id = '$id'";
        $updated_rows = $this->db->update($query);
        if ($updated_rows) {
            header("location:index.php");
        }
    }
    public function trushStudent(){
        $query = "select * from student where is_deleted=1";
        $result = $this->db->select($query);
        return $result;
    }

    public function restoreStudentData($id,$_is_deleted){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $_is_deleted = mysqli_real_escape_string($this->db->link, $_is_deleted);


        $query = "UPDATE student SET is_deleted = '$_is_deleted' WHERE id = '$id'";
        $updated_rows = $this->db->update($query);
        if ($updated_rows) {
            header("location:index.php");
        }
    }




}