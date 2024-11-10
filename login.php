<?php
include 'koneksi.php'; // Menghubungkan ke database

// Memulai sesi
session_start();

if (isset($_POST['submit'])) {
    $username_or_email = isset($_POST['username_or_email']) ? $_POST['username_or_email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Cek keberadaan pengguna berdasarkan username/email dan password di tabel akun
    $query = "SELECT akun.user_id, akun.password, users.nama, users.email, users.no_telp, users.role 
              FROM akun 
              JOIN users ON akun.user_id = users.id 
              WHERE (akun.username = '$username_or_email' OR users.email = '$username_or_email')";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $akun = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $akun['password'])) {
            // Menyimpan informasi pengguna dalam session
            $_SESSION['user_id'] = $akun['user_id'];
            $_SESSION['nama'] = $akun['nama'];
            $_SESSION['email'] = $akun['email'];
            $_SESSION['no_telp'] = $akun['no_telp'];
            $_SESSION['role'] = $akun['role'];

            // Arahkan ke halaman utama
            header('Location: index.php');
            exit();
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Username/Email tidak ditemukan!";
    }
}
?>

<?php
// Menampilkan pesan error jika ada
if (isset($message)) {
    echo "<p>$message</p>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username_or_email">Username atau Email:</label>
            <input type="text" id="username_or_email" name="username_or_email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Login</button>
        </form>

        <!-- Pesan jika login gagal -->
        <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>
        
        <!-- Link ke halaman pendaftaran -->
        <div class="register-link">
            <p>Belum punya akun? <a href="daftar.php">Daftar</a></p>
            <p><a href="index.php">Kembali Ke Beranda</a></p>
        </div>
    </div>

</body>
</html>
