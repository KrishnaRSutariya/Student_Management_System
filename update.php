<?php
include('db_connect.php');
if (isset($_POST['update_student'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $contect_no = $_POST['contect_no'];
    $password = $_POST['password'];

    if ($name == "" || empty($name) && $email == "" || empty($email) && $contect_no == "" || empty($contect_no) && $password == "" || empty($password)) {
        header('location:index.php?msg=Please Fill All The Fields ...!');
    } else {
        $query = "update student set name = '$name',email = '$email',contect_no = '$contect_no',password = '$password' where id = " . $_GET['id'];
        $result = mysqli_query($con, $query);
        if ($result) {
            header('location:index.php?message=Record Updated Successfully ...!');
        } else {
            header('location:index.php?msg=Record Is Not Updated Successfully ...!');
        }
    }
}
?>