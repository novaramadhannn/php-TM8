// Asumsikan bahwa peran pengguna disimpan dalam variabel 'userRole'
const userRole = "admin"; // atau "user" jika bukan admin

if (userRole === "admin") {
    // Daftar elemen menu yang ingin disembunyikan
    const menusToHide = ["program", "berita", "agenda", "kontak"];
    
    menusToHide.forEach(menuId => {
        const menuElement = document.getElementById(menuId);
        if (menuElement) {
            menuElement.style.display = "none";
        }
    });
}
