<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Contoh Input dan Output Aman</title>
</head>
<body>
    <form method="POST" action="">
        <label>Masukkan teks:</label>
        <input type="text" name="input" required>
        <button type="submit">Kirim</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['input'] ?? '';
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        echo "<h3>Hasil Input:</h3>";
        echo "<p>$input</p>";
    }
    ?>
</body>
</html>
