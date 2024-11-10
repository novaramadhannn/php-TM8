<?php
include 'koneksi.php'; // Menghubungkan ke database

// Mengecek apakah form telah disubmit
if (isset($_POST['submit'])) {
    // Menangkap data dari form
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $username = $_POST['username']; // Tambahkan input username
    $password = $_POST['password'];  // Menangkap password
    $role = $_POST['role'];
    
    // Mengecek apakah email sudah terdaftar di tabel users atau username di tabel akun
    $cekEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $cekEmailResult = mysqli_query($koneksi, $cekEmailQuery);
    
    $cekUsernameQuery = "SELECT * FROM akun WHERE username = '$username'";
    $cekUsernameResult = mysqli_query($koneksi, $cekUsernameQuery);

    if (mysqli_num_rows($cekEmailResult) > 0) {
        $message = "Email sudah terdaftar, silakan gunakan email lain.";
    } elseif (mysqli_num_rows($cekUsernameResult) > 0) {
        $message = "Username sudah terdaftar, silakan gunakan username lain.";
    } else {
        // Menangani file foto
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);
        
        // Cek apakah file gambar valid
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            // Simpan data ke tabel users (tanpa password)
            $queryUsers = "INSERT INTO users (nama, alamat, no_telp, email, foto, role) 
                           VALUES ('$nama', '$alamat', '$no_telp', '$email', '$foto', '$role')";
            
            if (mysqli_query($koneksi, $queryUsers)) {
                // Mendapatkan ID pengguna yang baru saja disimpan
                $user_id = mysqli_insert_id($koneksi);
                
                // Mengenkripsi password menggunakan password_hash
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Simpan data autentikasi ke tabel akun
                $queryAkun = "INSERT INTO akun (user_id, username, password) 
                              VALUES ('$user_id', '$username', '$hashed_password')";
                
                if (mysqli_query($koneksi, $queryAkun)) {
                    // Jika role adalah Tenaga Pelatih (role 3), simpan data ke tabel tenaga_pelatih
                    if ($role == 3) {
                        $queryTenagaPelatih = "INSERT INTO tenaga_pelatih (user_id, nama, alamat, no_telp, email, foto)
                                               VALUES ('$user_id', '$nama', '$alamat', '$no_telp', '$email', '$foto')";
                        
                        if (mysqli_query($koneksi, $queryTenagaPelatih)) {
                            $message = "Pendaftaran tenaga pelatih berhasil!";
                        } else {
                            $message = "Gagal menyimpan data tenaga pelatih: " . mysqli_error($koneksi);
                        }
                    } else {
                        $message = "Pendaftaran berhasil!";
                    }
                } else {
                    $message = "Pendaftaran gagal: " . mysqli_error($koneksi);
                }
            } else {
                $message = "Pendaftaran gagal: " . mysqli_error($koneksi);
            }
        } else {
            $message = "Terjadi kesalahan saat mengunggah foto.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="css/daftar.css">
</head>
<body>

    <div class="container">
        <h2>Form Pendaftaran</h2>
        <form action="daftar.php" method="POST" enctype="multipart/form-data">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea>

            <label for="no_telp">No. Telepon:</label>
            <input type="text" id="no_telp" name="no_telp" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <!-- Input untuk username -->
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <!-- Input untuk password -->
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" required>

            <label for="role">Pilih Role:</label>
            <select name="role" id="role" required>
                <option value="">Pilih Role</option>
                <option value="1">Admin</option>
                <option value="2">Peserta</option>
                <option value="3">Tenaga Pelatih</option>
            </select>

            <button type="submit" name="submit">Daftar</button>
        </form>

        <!-- Pesan hasil pendaftaran -->
        <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>
        
        <!-- Tombol Login -->
        <div class="login-link">
            <p>Sudah Punya akun? <a href="login.php">Login</a></p>
        </div>
    </div>

</body>
</html>
