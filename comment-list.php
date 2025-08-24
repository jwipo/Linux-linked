<?php
// 댓글 파일 경로
$commentFile = __DIR__ . "/comments.txt";
$comments = [];

if (file_exists($commentFile)) {
  $lines = file($commentFile, FILE_IGNORE_NEW_LINES);
  foreach ($lines as $line) {
    [$name, $comment] = explode("|", $line);
    $comments[] = [
      'name' => htmlspecialchars($name),
      'comment' => nl2br(htmlspecialchars($comment))
    ];
  }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>댓글 목록</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background: #f7f9fc">
  <div class="container mt-5">
    <div class="white-box p-4 bg-white rounded shadow-sm">
      <h4 class="mb-4">💬 등록된 댓글 목록</h4>
      <?php if (empty($comments)): ?>
        <p class="text-muted">아직 댓글이 없습니다.</p>
      <?php else: ?>
        <ul class="list-group">
          <?php foreach ($comments as $item): ?>
            <li class="list-group-item">
              <strong><?= $item['name'] ?></strong><br>
              <?= $item['comment'] ?>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <a href="/index.php" class="btn btn-outline-primary mt-4">⬅ 메인으로 돌아가기</a>
    </div>
  </div>
</body>
</html>

