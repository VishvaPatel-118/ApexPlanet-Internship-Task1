<?php
include("config/db.php");
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">My Blog</a>
    <div>
      <a href="auth/login.php" class="btn btn-outline-light btn-sm">Login</a>
      <a href="auth/register.php" class="btn btn-warning btn-sm">Register</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="mb-4">📝 Latest Posts</h2>

  <?php while ($row = $result->fetch_assoc()) : ?>
    <div class="card mb-3 shadow-sm">
      <div class="card-body">
        <h4 class="card-title"><?= htmlspecialchars($row['title']) ?></h4>
        <p class="card-text"><?= nl2br(htmlspecialchars($row['content'])) ?></p>
        <small class="text-muted">Posted on <?= $row['created_at'] ?></small>
      </div>
    </div>
  <?php endwhile; ?>
</div>

</body>
</html>
