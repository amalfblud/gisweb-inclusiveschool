<?php
  session_start();
  include "header.php";
  include "koneksi.php";
	if($_SESSION['status']!="login"){
		header("location:login.php?pesan=belum_login");
	}
?>

<!DOCTYPE html>
<html>
    
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include "menu_sidebar.php"; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "menu_topbar.php"; ?>
                <br>
                <br>
                <br>
                <br>
                <center><img src="img/logo3.png" alt="logobeyondbarriers" width="150px"> </center>
                <br>
                <h2>
                    <center><b>SISTEM INFORMASI SEKOLAH</b> </center>
                </h2>
                <h2>
                    <center><b>SEKOLAH INKLUSI DAN SEKOLAH LUAR BIASA KOTA BALIKPAPAN</b> </center>
                </h2>
            </div>
            <!-- End of Main Content -->
            <?php include "footer.php"; ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
</body>

</html>