<?php
include("../session.php");
include("../config/db.php");

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE posts SET title=?, content=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $content, $id);
    $stmt->execute();
    header("Location: ../dashboard.php");
    exit();
}

$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$post = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5" style="max-width: 600px;">
  <div class="card shadow-lg">
    <div class="card-body">
      <h3 class="text-center mb-4">✏ Edit Post</h3>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($post['title']) ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Content</label>
          <textarea name="content" class="form-control" rows="6" required><?= htmlspecialchars($post['content']) ?></textarea>
        </div>
        <button class="btn btn-primary w-100">Update Post</button>
        <a href="../dashboard.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
      </form>
    </div>
  </div>
</div>

</body>
</html>
