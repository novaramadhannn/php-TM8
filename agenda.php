<?php
session_start();
include 'koneksi.php';
include 'navbar.php';

// Mengambil data agenda dari tabel agenda
$sql = "SELECT * FROM agenda ORDER BY tanggal_agenda, waktu_agenda";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - SkillUp Academy</title>
    <link rel="stylesheet" href="css/agenda.css">
</head>
<body>
    <!-- Navbar -->
    

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <h2>Agenda</h2>
            <p>Jadwal acara dan pelatihan SkillUp Academy.</p>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Acara</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pelatihan Digital Marketing</td>
                        <td>15 November 2024</td>
                        <td>09:00 - 12:00</td>
                        <td>Online</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Workshop Web Development</td>
                        <td>17 November 2024</td>
                        <td>13:00 - 16:00</td>
                        <td>Offline</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

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

</body>
</html>

<script 
src="js/index.js">
src="js/navv.js">
</script>

<?php
// Menutup koneksi
$koneksi->close();
?>
