<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['input'])) {
    $input = $_POST['input'];
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

    echo "<h2>Input yang Sudah Diamankan:</h2>";
    echo "<p>".$input."</p>";
} else {
    echo "<h2>Masukkan Input:</h2>";
    echo '<form method="POST" action="">
            <textarea name="input" rows="5" cols="50"></textarea><br>
            <input type="submit" value="Kirim">
          </form>';
}
?>