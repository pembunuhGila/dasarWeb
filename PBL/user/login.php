<?php
// user/login.php
require_once __DIR__.'/../conn.php';
session_start();
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :u AND password = :p AND status='aktif' LIMIT 1");
    $stmt->execute([
        'u' => $username,
        'p' => md5($password) // database kamu menyimpan MD5
    ]);
    $user = $stmt->fetch();

    if ($user) {
        // simpan session
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    } else {
        $err = "Username atau password salah.";
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login</title>
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>

<div style="max-width:420px;margin:120px auto;padding:20px;background:#fff;border-radius:10px;box-shadow:0 8px 30px rgba(0,0,0,0.08)">
  <h2 style="margin-bottom:14px">Login</h2>
  <?php if ($err): ?><div style="color:#c00;margin-bottom:12px"><?= htmlspecialchars($err) ?></div><?php endif; ?>
  <form method="post" action="">
    <label>Username</label><br>
    <input type="text" name="username" required style="width:100%;padding:10px;margin:8px 0;border-radius:6px;border:1px solid #ddd"><br>
    <label>Password</label><br>
    <input type="password" name="password" required style="width:100%;padding:10px;margin:8px 0;border-radius:6px;border:1px solid #ddd"><br>
    <button type="submit" style="background:#0D5CB6;color:#fff;padding:10px 16px;border:none;border-radius:8px;cursor:pointer">Login</button>
  </form>
</div>

</body>
</html>
