<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Validasi Email Aman</title>
</head>
<body>
    <h2>Form Validasi Email</h2>
    <?php
    $email = "";
    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? '';
        if (empty($email)) {
            $error = "Email wajib diisi!";
        } 
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Format email tidak valid!";
        } 
        else {
            $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            echo "<p><strong>Data berhasil disimpan!</strong></p>";
            echo "<p>Email tervalidasi dan aman: <b>$email</b></p>";
        }
    }
    ?>

    <!-- Form Input -->
    <form method="POST" action="">
        <label for="email">Masukkan Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <span style="color:red;"><?php echo $error; ?></span><br><br>
        <button type="submit">Kirim</button>
    </form>

</body>
</html>
