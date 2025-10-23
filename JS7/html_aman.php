<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contoh Input dan Output PHP</title>
</head>
<body>
    <form method="POST" action="">
        <label>Masukkan teks:</label>
        <input type="text" name="input" required>
        <button type="submit">Kirim</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data dari form
        $input = $_POST['input'];

        // Amankan data dari karakter berbahaya
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

        // Tampilkan hasil
        echo "<h3>Hasil Input:</h3>";
        echo "<p>$input</p>";
    }
    ?>
</body>
</html>
