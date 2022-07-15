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


        $sql_pemeriksaan_dokter = "SELECT * FROM hasil_pemeriksaan_dokter WHERE id_periksa = '$id_periksa'";
        $result_pemeriksaan_dokter = mysqli_query($conn, $sql_pemeriksaan_dokter);
        $fetch_pemeriksaan_dokter = mysqli_fetch_assoc($result_pemeriksaan_dokter);
  
        // SQL query that sets the status
        // to 1 to indicate activation.
        $sql="UPDATE `periksa` SET 
             `status`='done' WHERE id_periksa='$id_periksa'";
  

        if($fetch_pemeriksaan_dokter['dokter'] != NULL){
            // Execute the query
            mysqli_query($conn,$sql);
            echo "<script>alert('Berhasil mengubah status menjadi Done'); window.location = '../admin-check-pasien.php';</script>"; 
        }else{
            echo "<script>alert('Pasien Belum melakukan pemeriksaan dokter'); window.location = '../admin-check-pasien.php';</script>"; 
        }
    }
?>