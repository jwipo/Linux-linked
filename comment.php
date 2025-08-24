<?php
// 입력값 받아오기 + 보안처리
$name = htmlspecialchars($_POST['name']);
$comment = htmlspecialchars($_POST['comment']);
$date = date("Y-m-d H:i:s");

// 저장할 파일 경로
$commentFile = __DIR__ . "/comments.txt";

// 한 줄에 저장할 형식: 날짜|이름|내용
$line = "$date|$name|$comment\n";

// 파일에 추가 저장
file_put_contents($commentFile, $line, FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>댓글 저장 결과</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body style="background: #f7f9fc">
  <div class="container mt-5">
    <div class="white-box p-4 bg-white rounded shadow-sm">
      <h4 class="mb-3">✅ 댓글이 저장되었습니다!</h4>
      <p><strong>작성자:</strong> <?= $name ?></p>
      <p><strong>내용:</strong> <?= nl2br($comment) ?></p>
      <p><strong>작성시간:</strong> <?= $date ?></p>

      <a href="/index.php" class="btn btn-outline-primary mt-4">⬅ 메인으로 돌아가기</a>
      <a href="/comment-list.php" class="btn btn-outline-secondary mt-2">📃 댓글 전체 보기</a>
    </div>
  </div>
</body>
</html>

