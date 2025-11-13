<?php
// register.php
session_start();
include 'config.php';

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

if (isset($_POST['register'])) {
    $username = strtolower(trim($_POST['username']));
    $pw = $_POST['password'];
    if (strlen($username) < 3 || strlen($pw) < 4) {
        $error = "Username minimal 3 karakter dan password minimal 4 karakter.";
    } else {
        $check = pg_query_params($conn, "SELECT id FROM users WHERE username=$1", [$username]);
        if (pg_num_rows($check) > 0) {
            $error = "Username sudah digunakan.";
        } else {
            $hash = password_hash($pw, PASSWORD_DEFAULT);
            pg_query_params($conn, "INSERT INTO users (username,password) VALUES ($1,$2)", [$username, $hash]);
            header("Location: login.php?register=success");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center" style="min-height:100vh;">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow mt-4">
        <div class="card-body">
          <h4 class="card-title mb-3">Buat Akun</h4>
          <?php if (!empty($error)): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
          <form method="post" novalidate>
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input name="username" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-success w-100" name="register">Daftar</button>
            <div class="text-center mt-3"><a href="login.php">Sudah punya akun? Login</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
