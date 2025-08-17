<?php
session_start();
include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if ($id && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        header("Location: ../dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 400px;">
  <div class="card shadow-lg">
    <div class="card-body">
      <h3 class="text-center mb-4">🔑 Login</h3>

      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-dark w-100">Login</button>
      </form>
      <p class="mt-3 text-center">No account? <a href="register.php">Register</a></p>
    </div>
  </div>
</div>

</body>
</html>
