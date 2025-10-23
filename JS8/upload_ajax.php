<?php
$maxsize = 5 * 1024 * 1024; // 5 MB
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
$targetDirectory = "images/";

if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if (isset($_FILES['files']) && $_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);
    
    $errors = array();
    $success_messages = array();

    for ($i = 0; $i < $totalFiles; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        
        @$file_ext = strtolower(end(explode('.', $file_name)));
        
        $targetFile = $targetDirectory . $file_name;
        $current_errors = array();

        if (!in_array($file_ext, $allowedExtensions)) {
            $current_errors[] = "Ekstensi tidak diizinkan ($file_ext).";
        }
        
        if ($file_size > $maxsize) {
            $current_errors[] = "Ukuran file ($file_name) melebihi 5 MB.";
        }
        
        if (empty($current_errors)) {
            if (move_uploaded_file($file_tmp, $targetFile)) {
                $success_messages[] = "File $file_name berhasil diunggah.";
            } else {
                $success_messages[] = "Gagal mengunggah file $file_name (Error Server).";
            }
        } else {
            $errors[] = "$file_name: " . implode(", ", $current_errors);
        }
    }
    
    // Output hasil (digabung)
    if (!empty($errors) && !empty($success_messages)) {
        echo implode("<br>", $success_messages) . "<hr>" . implode("<br>", $errors);
    } elseif (!empty($errors)) {
        echo "Validasi Gagal:<br>" . implode("<br>", $errors);
    } else {
        echo implode("<br>", $success_messages);
    }

} else {
    echo "Tidak ada file yang diunggah.";
}
?>