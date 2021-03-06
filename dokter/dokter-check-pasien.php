<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../template/css/styles.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/32f82e1dca.js"
      crossorigin="anonymous"
    ></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <title>Admin</title>
    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
        bottom: .5em;
        }
    </style>
</head>
<body>
    <aside class="sidebar offcanvas-lg offcanvas-start">
      <div class="d-flex justify-content-end m-4 d-block d-lg-none">
        <button
          data-bs-dismiss="offcanvas"
          data-bs-target=".sidebar"
          class="btn p-0 border-0 fs-4"
          aria-label="Button Close"
        >
          <i class="fas fa-close"></i>
        </button>
      </div>
      <div class="logo-brand mt-lg-5">
        <img
          src="../template/assets/images/logo.png"
          alt="Logo Shoso"
          width="52"
          height="50"
        />
        <div>
          <h6 class="title-store">Clinic System</h6>
          <p class="tagline-store">Dokter System Access</p>
        </div>
      </div>
      <hr />
      <nav class="menu flex-fill">
        <div class="section-menu">
          <a href="dokter-dashboard.php" class="item-menu" onclick="handleClickMenu(this)">
            <svg 
            fill="currentColor" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"/>
          </svg>
            <p>Home</p>
          </a>
          <a href="dokter-check-pasien.php" class="item-menu active" onclick="handleClickMenu(this)">
            <svg fill="currentColor">
              <mask id="path-1-inside-1_1_101" fill="white">
                <path
                  d="M5.9995 2.00305C5.99706 1.99898 5.99116 1.99898 5.98872 2.00305C5.00741 3.63857 3.6386 5.00738 2.00308 5.98869C1.99901 5.99113 1.99901 5.99702 2.00308 5.99946C3.6386 6.98077 5.00741 8.34959 5.98872 9.98511C5.99116 9.98917 5.99706 9.98917 5.9995 9.98511C6.98081 8.34959 8.34962 6.98077 9.98514 5.99946C9.98921 5.99702 9.98921 5.99113 9.98514 5.98869C8.34962 5.00738 6.98081 3.63857 5.9995 2.00305ZM16.6586 2.00677C16.6551 2.00102 16.6468 2.00102 16.6434 2.00677C15.2556 4.31973 13.3198 6.25553 11.0068 7.64331C11.0011 7.64676 11.0011 7.65509 11.0068 7.65854C13.3198 9.04632 15.2556 10.9821 16.6434 13.2951C16.6468 13.3008 16.6551 13.3008 16.6586 13.2951C18.0464 10.9821 19.9822 9.04632 22.2951 7.65854C22.3009 7.65509 22.3009 7.64676 22.2951 7.64331C19.9822 6.25553 18.0464 4.31973 16.6586 2.00677ZM7.65859 11.0068C7.65514 11.001 7.6468 11.001 7.64335 11.0068C6.25557 13.3197 4.31978 15.2555 2.00681 16.6433C2.00106 16.6468 2.00106 16.6551 2.00681 16.6585C4.31978 18.0463 6.25557 19.9821 7.64335 22.2951C7.6468 22.3008 7.65514 22.3008 7.65859 22.2951C9.04637 19.9821 10.9822 18.0463 13.2951 16.6585C13.3009 16.6551 13.3009 16.6468 13.2951 16.6433C10.9822 15.2555 9.04637 13.3197 7.65859 11.0068ZM17.9887 14.003C17.9912 13.999 17.9971 13.999 17.9995 14.003C18.9808 15.6386 20.3496 17.0074 21.9851 17.9887C21.9892 17.9911 21.9892 17.997 21.9851 17.9995C20.3496 18.9808 18.9808 20.3496 17.9995 21.9851C17.9971 21.9892 17.9912 21.9892 17.9887 21.9851C17.0074 20.3496 15.6386 18.9808 14.0031 17.9995C13.999 17.997 13.999 17.9911 14.0031 17.9887C15.6386 17.0074 17.0074 15.6386 17.9887 14.003Z"
                />
              </mask>
            <svg 
            fill="currentColor" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M448 336v-288C448 21.49 426.5 0 400 0H96C42.98 0 0 42.98 0 96v320c0 53.02 42.98 96 96 96h320c17.67 0 32-14.33 32-31.1c0-11.72-6.607-21.52-16-27.1v-81.36C441.8 362.8 448 350.2 448 336zM128 166c0-8.838 7.164-16 16-16h53.1V96c0-8.838 7.164-16 16-16h52c8.836 0 16 7.162 16 16v54H336c8.836 0 16 7.162 16 16v52c0 8.836-7.164 16-16 16h-54V288c0 8.836-7.164 16-16 16h-52c-8.836 0-16-7.164-16-16V234H144c-8.836 0-16-7.164-16-16V166zM384 448H96c-17.67 0-32-14.33-32-32c0-17.67 14.33-32 32-32h288V448z"/>
          </svg>
            <p>Cek Pasien</p>
          </a>
        </div>
      </nav>
      <footer>
        <p>??2022 Clinic System. All rights reserved.</p>
      </footer>
    </aside>
    <main class="content flex-fill">
      <section>
        <button
          aria-controls="sidebar"
          data-bs-toggle="offcanvas"
          data-bs-target=".sidebar"
          aria-label="Button Hamburger"
          class="sidebarOffcanvas mb-5 btn p-0 border-0 d-flex d-lg-none"
        >
          <i class="fa-solid fa-bars"></i>
        </button>
        <nav class="nav-content gap-5">
          <div class="d-flex gap-3 align-items-center">
            <img
              src="../template/assets/images/photo.webp"
              alt="Photo Profile"
              class="photo-profile"
            />
            <div>
              <?php  if (isset($_SESSION['dokter_username'])) : ?>
    	          <p class="title-content mb-2">Welcome, <strong><?php echo $_SESSION['dokter_username']; ?></strong></p>
              <?php endif ?>
              <!-- <p class="subtitle-content">
                Finish your profile.
                <a href="#" class="btn-link">Edit now</a>
              </p> -->
            </div>
          </div>
          <div class="search-wrapper">
            <!-- Default dropleft button -->
            <div class="btn-group dropleft">
              <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                Profile Option
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="dokter-dashboard.php?logout='1'">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </section>

      <section>
      <div class="d-flex justify-content-between align-items-center gap-3">
          <h4 class="title-section-content">Cek Pasien</h4>
        </div>
      <div class="container">
        <form action="" method="POST">
            <div class="input-group mb-3">
                <input type="text" name="id_periksa" class="form-control" placeholder="ID Periksa" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" name="cari-pasien" type="submit" id="button-addon2">Cari Pasien</button>
                </div>
            </div>
        </form>
        <table id="example" class="table table-responsive-sm table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                <th>No</th>
                <th class="th-sm">Id Periksa
                </th>
                <th class="th-sm">Username
                </th>
                <th class="th-sm">Tanggal Periksa
                </th>
                <th class="th-sm">Keluhan
                </th>
                <th class="th-sm">Waktu
                </th>
                <th class="th-sm">Status
                </th>
                <th class="th-sm">Aksi
                </th>
                </tr>
            </thead>
            <tbody>
            <?php
                require_once '../database_configuration/config_db.php';
                if(isset($_POST['cari-pasien'])){
                    $id_periksa = $_POST['id_periksa'];
                    $no = 1;
                    $sql = "SELECT * FROM periksa WHERE id_periksa = '$id_periksa'";
                    $result = mysqli_query($conn, $sql);

                    // if(count($result) == 1){
                    //     echo "<script>alert('ID Periksa belum disetujui admin'); window.location = '../dokter-check-pasien.php';</script>"; 
                    // }
            
                    while($fetch = mysqli_fetch_assoc($result)){
                
            ?>
            
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo "REG_ID_0" . $fetch['id_periksa']?></td>
                <td><?php echo $fetch['username']?></td>
                <td><?php echo $fetch['tgl_periksa']?></td>
                <td><?php echo $fetch['keluhan']?></td>
                <td><?php echo $fetch['waktu']?></td>
                <td><?php
                        $today = date("Y-m-d");
                        $compare_time = strtotime($fetch['tgl_periksa']);
                        if($compare_time > $today){
                            echo "<span class=\"badge bg-danger text-white\">" ."failed" . "</span>";
                        }else if($compare_time < $today){
                            echo "<span class=\"badge bg-warning text-white\">" . $fetch['status'] . "</span>";
                        }else if($fetch['status'] == 'done'){
                            echo "<span class=\"badge bg-primary text-white\">" . $fetch['status'] . "</span>";
                        }else if($fetch['status'] == 'accepted'){
                            echo "<span class=\"badge bg-success text-white\">" . $fetch['status'] . "</span>";
                        }else if($fetch['status'] == 'rejected'){
                            echo "<span class=\"badge bg-danger text-white\">" . $fetch['status'] . "</span>";
                        }else{
                            echo "<span class=\"badge bg-warning text-white\">" . "pending" . "</span>";
                        }
                    ?>
                </td>
                <td>
                    <?php
                        if($fetch['status']=='accepted'){
                            echo "<a href=dokter-action-pasien.php?id_periksa=".$fetch['id_periksa']." class='btn btn-success btn-block'>Ambil Tindakan</a>";
                        }else if($fetch['status']=='pending' or $fetch['status']=='rejected'){
                            echo "<a href='dokter-action-pasien.php' class='btn btn-secondary btn-block disabled'>Ambil Tindakan</a>";
                        }else{
                            echo "There's no action";
                        }
                    ?>
                </td>
            </tr>
            
            <?php
                }
            ?>
            <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                <th>No</th>
                <th>Id Periksa
                </th>
                <th>Username
                </th>
                <th>Tanggal Periksa
                </th>
                <th>Keluhan
                </th>
                <th>Waktu
                </th>
                <th>Status
                </th>
                <th>Aksi
                </th>
                </tr>
            </tfoot>
        </table>
    </div>
      </section>
    </main>
    <script src="../template/js/index.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>
</html>