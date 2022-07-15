<?php
    require_once '../../database_configuration/config_db.php';

    // if(isset($_POST['accept'])){
    //     $id_periksa = $fetch['id_periksa'];
    //     $sql = "UPDATE periksa set status = 'accept' WHERE id_periksa = $id_periksa";
    //     mysqli_query($conn, $sql);
    // }
    if (isset($_GET['id_periksa'])){
  
        // Store the value from get to a 
        // local variable "course_id"
        $id_periksa=$_GET['id_periksa'];
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql="UPDATE `periksa` SET 
             `status`='accepted' WHERE id_periksa='$id_periksa'";
  
        // Execute the query
        $result = mysqli_query($conn,$sql);

        if($result){
            echo "<script>alert('Berhasil mengubah status menjadi accepted'); window.location = '../admin-check-pasien.php';</script>"; 
        }
    }
?>