<header>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php">SkillUp Academy</a>
        </div>
        <ul>
            <!-- Menu Beranda yang selalu tampil -->
            <li><a href="index.php#">Beranda</a></li>

            <!-- Menu untuk semua pengguna (termasuk peserta yang belum login) -->
            <?php if (!isset($_SESSION['user_id']) || (isset($_SESSION['role']) && $_SESSION['role'] !== '1')): ?>
                <li><a href="program.php" id="programm">Program Pelatihan</a></li>
                <li><a href="berita.php" id="berita">Berita</a></li>
                <li><a href="agenda.php" id="agenda">Agenda</a></li>
                <li><a href="programku.php" id="kontak">Program Saya</a></li>
            <?php endif; ?>

            <!-- Menu Kelola Data yang hanya tampil untuk admin -->
            <?php if (isset($_SESSION['user_id']) && isset($_SESSION['role']) && $_SESSION['role'] === '1'): ?>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Kelola Data</a>
                    <div class="dropdown-content">
                        <a href="peserta.php">Peserta</a>
                        <a href="pelatih.php">Pelatih</a>
                        <a href="berita.php">Berita</a>
                        <a href="agenda.php">Agenda</a>
                    </div>
                </li>
            <?php endif; ?>

            <!-- Menampilkan tombol Login atau Logout berdasarkan status sesi -->
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Jika sudah login, tampilkan tombol Logout dan Detail Akun -->
                <li><a href="#" id="detail-akun-btn" class="dropdown-btn">Detail Akun</a></li>
                <li><a href="logout.php" class="logout-btn">Logout</a></li>
            <?php else: ?>
                <!-- Jika belum login, tampilkan tombol Login -->
                <li><a href="login.php" class="login-btn">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
