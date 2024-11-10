// Mendapatkan modal dan tombol untuk membuka modal
var modal = document.getElementById("addPesertaModal");
var btn = document.getElementById("addPesertaBtn");
var span = document.getElementsByClassName("close")[0];

// Ketika tombol "Tambah Peserta" diklik, buka modal
btn.onclick = function() {
    modal.style.display = "block";
}

// Ketika pengguna mengklik (x), tutup modal
span.onclick = function() {
    modal.style.display = "none";
}

// Ketika pengguna mengklik di luar modal, tutup modal
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
