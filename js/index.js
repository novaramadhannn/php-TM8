// Mendapatkan elemen popup dan tombol detail akun
var popup = document.getElementById('detail-akun-popup');
var btn = document.getElementById('detail-akun-btn');
var closeBtn = document.getElementById('close-popup');

// Ketika tombol detail akun diklik, tampilkan pop-up
btn.onclick = function() {
    popup.style.display = "block";
}

// Ketika tombol close diklik, sembunyikan pop-up
closeBtn.onclick = function() {
    popup.style.display = "none";
}

// Ketika klik di luar pop-up, sembunyikan pop-up
window.onclick = function(event) {
    if (event.target == popup) {
        popup.style.display = "none";
    }
}
