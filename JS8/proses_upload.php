<?php
// Lokasi penyimpanan file yang diunggah (DIUBAH KE IMAGES/)
$targetDirectory = "images/"; 

// --- DEFINISI VALIDASI ---
$maxsize = 5 * 1024 * 1024; // 5 MB
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
// -------------------------

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);
    
    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $targetFile = $targetDirectory . $fileName;
        
        // --- LOGIKA VALIDASI PER FILE ---
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($fileType, $allowedExtensions) && $_FILES['files']['size'][$i] <= $maxsize) {
        // --- AKHIR LOGIKA VALIDASI ---
        
            // Pindahkan file yang diunggah ke direktori penyimpanan
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName: Gagal memindahkan.<br>";
            }
        } else {
            echo "File $fileName GAGAL diunggah: Ekstensi tidak diizinkan atau ukuran > 5MB.<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>