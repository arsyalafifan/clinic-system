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
          <p class="tagline-store">Datang, langsung berobat</p>
        </div>
      </div>
      <hr />
      <nav class="menu flex-fill">
        <div class="section-menu">
          <a href="user-dashboard.php" class="item-menu" onclick="handleClickMenu(this)">
            <svg 
            fill="currentColor" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"/>
          </svg>
            <p>Home</p>
          </a>
          <a href="user-periksa.php" class="item-menu" onclick="handleClickMenu(this)">
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
            <p>Daftar Berobat</p>
          </a>
          <a href="user-riwayat-berobat.php" class="item-menu active" onclick="handleClickMenu(this)">
            <svg 
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path d="M480 144V384l-96 96H144C117.5 480 96 458.5 96 432v-288C96 117.5 117.5 96 144 96h288C458.5 96 480 117.5 480 144zM384 264C384 259.6 380.4 256 376 256H320V200C320 195.6 316.4 192 312 192h-48C259.6 192 256 195.6 256 200V256H200C195.6 256 192 259.6 192 264v48C192 316.4 195.6 320 200 320H256v56c0 4.375 3.625 8 8 8h48c4.375 0 8-3.625 8-8V320h56C380.4 320 384 316.4 384 312V264zM0 360v-240C0 53.83 53.83 0 120 0h240C373.3 0 384 10.75 384 24S373.3 48 360 48h-240C80.3 48 48 80.3 48 120v240C48 373.3 37.25 384 24 384S0 373.3 0 360z"/>
          </svg>
            <p>Riwayat Berobat</p>
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
              <?php  if (isset($_SESSION['user_username'])) : ?>
    	          <p class="title-content mb-2">Welcome, <strong><?php echo $_SESSION['user_username']; ?></strong></p>
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
                <a class="dropdown-item" href="user-dashboard.php?logout='1'">Logout</a>
              </div>
            </div>
          </div>
        </nav>
      </section>

      <section>
      <?php
            require '../database_configuration/config_db.php';
            $id = $_GET['id'];
            $sql = "SELECT * FROM hasil_pemeriksaan_dokter WHERE id_periksa = $id";
            
            $result = mysqli_query($conn, $sql);
        
            while($fetch = mysqli_fetch_assoc($result)){
        ?>
        <div class="container container-lg" method="post">
            <div class="purchase md-5 pt-3">
                <h2 class="fw-bold text-xl mb-4">Register Details</h2>
                <p class="text-lg mb-4">ID Periksa<span class="purchase-details"><?= $fetch['id_periksa'] ?></span></p>
                <p class="text-lg mb-4">Username<span class="purchase-details"><?php echo $fetch['username_pasien'] ?></span></p>
                <p class="text-lg mb-4">Dokter<span class="purchase-details"><?php echo $fetch['dokter'] ?></span></p>
                <p class="text-lg mb-4">Keluhan<span class="purchase-details"><?php echo $fetch['keluhan'] ?></span></p>
                <p class="text-lg mb-4">Diagnosa<span class="purchase-details"><?php echo $fetch['diagnosa'] ?></span></p>
                <p class="text-lg mb-4">Tindakan<span class="purchase-details"><?php echo $fetch['tindakan'] ?></span></p>
                <p class="text-lg mb-4">Obat<span class="purchase-details"><?php echo $fetch['obat'] ?></span></p>
                <p class="text-lg mb-4">Tanggal Berobat<span class="purchase-details"><?php echo $fetch['tgl_berobat'] ?></span></p>

                </p>
                <!-- <p class="text-lg mb-20">Total <span class="purchase-details color-palette-4">Rp 55.000.600</span></p> -->
            </div>
            <a class = "btn btn-primary btn-block" href="user-dashboard.php">Home</a>
        </div>
        <?php
            }
        ?>
      </section>
    </main>
        <script src="../template/js/index.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    </body>
</html>