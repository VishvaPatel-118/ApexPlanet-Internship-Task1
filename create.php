<?php
include("../session.php");
include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);

    if ($stmt->execute()) {
        header("Location: ../dashboard.php");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 600px;">
  <div class="card shadow-lg">
    <div class="card-body">
      <h3 class="text-center mb-4">➕ Create New Post</h3>

      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Content</label>
          <textarea name="content" class="form-control" rows="6" required></textarea>
        </div>
        <button class="btn btn-success w-100">Publish Post</button>
        <a href="../dashboard.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
      </form>
    </div>
  </div>
</div>

</body>
</html>
