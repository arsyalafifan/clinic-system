<?php
    session_start();

    if (!isset($_SESSION['user_username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: user-login.php');
    }
?>

<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .container-lg{
            max-width: 480px !important;
        }
        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }
        .purchase-details{
            float:right;
            display: block;
            font-weight: 600;
        }
        .mb-30{
            margin-bottom: 30px;
        }
    </style>
  </head>
    <body>
        <?php
            require '../database_configuration/config_db.php';
            $id = $_GET['id_periksa'];
            $sql = "SELECT * FROM periksa WHERE username = '{$_SESSION['user_username']}' and id_periksa = LIMIT('$id_periksa')";
            
            $result = mysqli_query($conn, $sql);
        
            while($fetch = mysqli_fetch_assoc($result)){
        ?>
        <div class="container container-lg" method="post">
            <div class="purchase pt-md-50 pt-30">
                <h2 class="fw-bold text-xl mb-30">Register Details</h2>
                <p class="text-lg mb-30">ID Periksa<span class="purchase-details"><?= $fetch['id_periksa'] ?></span></p>
                <p class="text-lg mb-30">Keluhan<span class="purchase-details"><?php echo $fetch['keluhan'] ?></span></p>
                <p class="text-lg mb-30">Tanggal Periksa<span class="purchase-details"><?php echo $fetch['tgl_periksa'] ?></span></p>
                <p class="text-lg mb-30">Waktu<span class="purchase-details"><?php echo $fetch['waktu'] ?></span></p>

                </p>
                <!-- <p class="text-lg mb-20">Total <span class="purchase-details color-palette-4">Rp 55.000.600</span></p> -->
            </div>
        </div>
        <a class = "btn btn-primary" href="user-dashboard.php">Home</a>
        <?php
            }
        ?>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
</html>