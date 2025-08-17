<?php
include("session.php");
include("config/db.php");
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">Admin Dashboard</a>
    <div>
      <span class="text-white me-3">Welcome, <?= $_SESSION['username'] ?></span>
      <a href="auth/logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <a href="posts/create.php" class="btn btn-success mb-3">➕ Create New Post</a>

  <?php while ($row = $result->fetch_assoc()) : ?>
    <div class="card mb-3 shadow-sm">
      <div class="card-body">
        <h4><?= htmlspecialchars($row['title']) ?></h4>
        <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
        <small class="text-muted">Posted on <?= $row['created_at'] ?></small>
        <div class="mt-2">
          <a href="posts/edit.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">✏ Edit</a>
          <a href="posts/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">🗑 Delete</a>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>

</body>
</html>
