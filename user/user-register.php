<?php
session_start();
include '../database_configuration/config_db.php';

$username = "";
$errors = array();

if(isset($_POST['user-register'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password_confirm = mysqli_real_escape_string($conn, $_POST['password_confirm']);

    if (empty($name)) { array_push($errors, "name is required"); }
    if (empty($gender)) { array_push($errors, "gender is required"); }
    if (empty($birthdate)) { array_push($errors, "birthdate is required"); }
    if (empty($phone)) { array_push($errors, "phone number is required"); }
    if (empty($address)) { array_push($errors, "address is required"); }
    if (empty($username)) { array_push($errors, "username is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if ($password != $password_confirm) {
        array_push($errors, "The two passwords do not match");
    }

    $username_check_query = "SELECT * FROM tb_users WHERE username='$username' LIMIT 1";
    $username_check_result = mysqli_query($conn, $username_check_query);
    $username_check_fetch = mysqli_fetch_assoc($username_check_result);

    if ($username_check_fetch) { // if user exists
        if ($username_check_fetch['username'] === $username) {
          array_push($errors, "Username already exists");
        }
    }

    if (count($errors) == 0) {
        $psswrd = md5($password);//encrypt the password before saving in the database

        $sql = "INSERT INTO tb_users (name, gender, birthdate, phone, address, username, password) VALUES ('$name', '$gender', '$birthdate', '$phone', '$address', '$username', '$psswrd')";

        mysqli_query($conn, $sql);
        $_SESSION['user_username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: user-login.php');
    }
    
}

// if(isset($_POST['user-register'])){
//     $name = $_POST['name'];
//     $gender = $_POST['gender'];
//     $birthdate = date('Y-m-d', strtotime($_POST['birthdate']));
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];
//     $username = $_POST['username'];
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//     $sql = "INSERT INTO `tb_users` (name, gender, birthdate, phone, address, username, password) VALUES ('$name', '$gender', '$birthdate', '$phone', '$address', '$username', '$password')";
//     $sql_username = "SELECT `username` FROM `tb_users` WHERE 'username' = '".$username."'";

//     $insert_data = mysqli_query($conn, $sql);
//     $check_username = mysqli_query($conn, $sql_username);

//     if(!$check_username == $username){
//         if($insert_data == TRUE){
//             echo 'success';
//             header("location: user-login.php");
//         }
//     }

//     mysqli_close($conn);
// }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="../template/css/login.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>User Register</title>
  </head>
  <body>
        <div class="sidenav">
            <div class="login-main-text">
                <h2 style="font-size: 48px; font-weight: 600;">Cepat.<br>Tanggap.<br>Bebas Antri.</h2>
                <p>Register untuk mengakses mendapatkan kemudahan berobat tanpa harus mengantri lagi, tentukan waktumu sendiri.</p>
            </div>
        </div>
      <div class="main">
            <div class="container-sm mt-5">
                <div class="p-4">
                    <h1>Sign Up</h1>
                    <p>Dapatkan kemudahan akses setelah anda mendaftar akun.</p>
                    <form action="" method="POST">
                    <?php include('../errors.php'); ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="dokter">
                                <option value = "" disabled selected>Select your gender</option>
                                <option value = "Male">Male</option>
                                <option value = "Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Birth of Date</label>
                            <input type="date" name="birthdate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Phone Number</label>
                            <input type="tel" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" <?php echo $username; ?>>
                            <p class="text-red">
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="password_confirm" class="form-control">
                        </div>
                        <p>Already have an account? <span><a href="user-login.php">Login</a></span></p>
                        <button type="submit" class="btn btn-primary btn-block" name="user-register">Register</button>
                    </form>
                </div>
            </div>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>