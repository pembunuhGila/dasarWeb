<?php
// login.php
session_start();
include 'config.php';

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = strtolower(trim($_POST['username']));
    $pw = $_POST['password'];
    $res = pg_query_params($conn, "SELECT * FROM users WHERE username=$1", [$username]);
    if ($row = pg_fetch_assoc($res)) {
        if (password_verify($pw, $row['password'])) {
            $_SESSION['user'] = $row['username'];
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = "Username atau password salah!";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center" style="min-height:100vh;">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow mt-4">
        <div class="card-body">
          <h4 class="card-title mb-3 text-center">Login</h4>
          <?php if (!empty($error)): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
          <?php if (isset($_GET['register'])): ?><div class="alert alert-success">Registrasi berhasil. Silakan login.</div><?php endif; ?>
          <form method="post">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-success w-100" name="login">Login</button>
            <div class="text-center mt-3"><a href="register.php">Belum punya akun? Daftar</a></div>
            <div class="text-center mt-3"><a href="index.php">Kembali</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
