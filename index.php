<?php 
session_start(); 
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillUp Academy - Halaman Utama</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <!-- Navbar -->


    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <h2>Selamat Datang di SkillUp Academy</h2>
            <p>
                SkillUp Academy adalah lembaga pelatihan yang menawarkan berbagai program pelatihan terbaik untuk mengembangkan keterampilan Anda. 
                Bergabunglah bersama kami untuk mengakses berbagai pengetahuan dan pengalaman langsung dari para tenaga pelatih profesional.
            </p>
            <div class="cta">
                <a href="program.php" class="btn">Lihat Program Pelatihan</a>
            </div>
        </div>
    </section>

    <!-- Pop-up Detail Akun -->
    <div id="detail-akun-popup" class="popup">
        <div class="popup-content">
            <span class="close-btn" id="close-popup">&times;</span>
            <h2>Detail Akun</h2>
            <p><strong>Nama:</strong> <?php echo $_SESSION['nama']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>Nomor Telepon:</strong> <?php echo $_SESSION['no_telp']; ?></p>
            <p><strong>Role:</strong> <?php echo $_SESSION['role']; ?></p>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 SkillUp Academy. All Rights Reserved.</p>
            <p>Contact us: <a href="mailto:info@skillupacademy.com">info@skillupacademy.com</a></p>
        </div>
    </footer>

    <!-- Link ke File JavaScript -->
    <script 
    src="js/index.js">
    src="js/nav.js">
</script>

</body>
</html>
