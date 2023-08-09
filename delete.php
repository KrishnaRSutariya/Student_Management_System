<?php
include('db_connect.php');
if (isset($_POST['delete_student'])) {

    $query = "delete from student where id = " . $_GET['id'];
    $result = mysqli_query($con, $query);
    if ($result) {
        header('location:index.php?message=Record Deleted Successfully ...!');
    } else {
        header('location:index.php?msg=Record Is Not Deleted Successfully ...!');
    }
}
?>