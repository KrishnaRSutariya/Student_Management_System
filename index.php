<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>

    <h1 class="text-center p-4 bg-info text-white">
        Student Management System
    </h1>
    <div class="container">
        <div class="d-flex justify-content-between my-3">
            <h3>Student Data Are Here ...</h3>
            <button class="btn btn-primary" data-toggle="modal" data-target="#add_student_data">ADD STUDENT</button>
        </div>
        <center>
            <h5 class="text-success">
                <?php
                    if(isset($_GET['message'])){
                        echo $_GET['message'];
                    }
                ?>
            </h5>
            <h5 class="text-danger">
                <?php
                    if(isset($_GET['msg'])){
                        echo $_GET['msg'];
                    }
                ?>
            </h5>
        </center>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contect_No</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('db_connect.php');
                $query = "select * from student";
                $result = mysqli_query($con, $query);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                                <tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['name'] . "</td>
                                    <td>" . $row['email'] . "</td>
                                    <td>" . $row['contect_no'] . "</td>
                                    <td>" . $row['password'] . "</td>
                                    <td> <button class='btn btn-warning' data-toggle='modal' data-target='#update_student_data_" . $row['id'] . "'>Update</button> </td>
                                    <td> <button class='btn btn-danger' data-toggle='modal' data-target='#delete_student_data_" . $row['id'] . "'>Remove</button> </td>
                                </tr>
    
                                <!-- UPDATE DATA -->
                                <form action='update.php?id=" . $row['id'] . "' method='post'>
                                    <div class='modal fade' id='update_student_data_" . $row['id'] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Student Updatation Form :- " . $row['id'] . "</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body my-2'>
                                                <div class='form-group'>
                                                    <div class='h6 py-1'>Name :</div>
                                                    <input type='text' name='username' class='form-control' placeholder='Enter Your Name ...' value='" . $row['name'] . "'>
                                                </div>
                                                <div class='form-group'>
                                                    <div class='h6 py-1'>Email :</div>
                                                    <input type='email' name='email' class='form-control' placeholder='Enter Your Email-ID ...' value='" . $row['email'] . "'>
                                                </div>
                                                <div class='form-group'>
                                                    <div class='h6 py-1'>Contect No. :</div>
                                                    <input type='text' name='contect_no' class='form-control' placeholder='Enter Your Contect-No. ...' value='" . $row['contect_no'] . "'>
                                                </div>
                                                <div class='form-group'>
                                                    <div class='h6 py-1'>Password :</div>
                                                    <input type='password' name='password' class='form-control' placeholder='Enter Your Password ...' value='" . $row['password'] . "'>
                                                </div>
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='submit' class='btn btn-success' name='update_student'>UPDATE</button>
                                                <button type='button' class='btn btn-danger' data-dismiss='modal'>CLOSE</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
    
                                <!-- DELETE DATA -->
                                <form action='delete.php?id=" . $row['id'] . "' method='post'>
                                    <div class='modal fade' id='delete_student_data_" . $row['id'] . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Student Deletation Form :- " . $row['id'] . "</h5>
                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                                </button>
                                            </div>
                                            <div class='modal-body my-2'>
                                                Are You Sure ...?
                                                <br/>
                                                You Can <span class='text-danger h6'> Deleted </span> This <b> [" . $row['name'] . " - " . $row['email'] . "] </b> Record ...!
                                            </div>
                                            <div class='modal-footer'>
                                                <button type='submit' class='btn btn-success' name='delete_student'>DELETE</button>
                                                <button type='button' class='btn btn-danger' data-dismiss='modal'>CLOSE</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            ";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- ADD DATA -->
    <form action="insert.php" method="post">
        <div class="modal fade" id="add_student_data" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Student Registration Form :-</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body my-2">
                        <div class="form-group">
                            <div class="h6 py-1">Name :</div>
                            <input type="text" name="username" class="form-control" placeholder="Enter Your Name ...">
                        </div>
                        <div class="form-group">
                            <div class="h6 py-1">Email :</div>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email-ID ...">
                        </div>
                        <div class="form-group">
                            <div class="h6 py-1">Contect No. :</div>
                            <input type="text" name="contect_no" class="form-control"
                                placeholder="Enter Your Contect-No. ...">
                        </div>
                        <div class="form-group">
                            <div class="h6 py-1">Password :</div>
                            <input type="password" name="password" class="form-control"
                                placeholder="Enter Your Password ...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name='add_student'>ADD</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="js/jquery.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>

</body>

</html>