<?php
// 에러 출력 설정
error_reporting(E_ALL);
ini_set('display_errors', 1);

// DB 접속 정보
$host = 'localhost';
$user = 'wpdbadmin';
$pass = 'admin001';
$dbname = 'wpdb';

// MySQL 연결 시도
$conn = new mysqli($host, $user, $pass, $dbname);

// HTML 시작
echo '<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>📡 DB 연결 테스트</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; padding: 30px; font-family: sans-serif; }
    .white-box { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px #ddd; }
  </style>
</head>
<body>
<div class="container">
  <div class="white-box">
    <h2>🔧 PHP + Nginx + MariaDB 연동 테스트</h2>';

if ($conn->connect_error) {
  echo "<p class='text-danger'>❌ MariaDB 연결 실패: " . $conn->connect_error . "</p>";
} else {
  echo "<p class='text-success'>✅ <strong>MariaDB 연결 성공!</strong></p>";
  echo "<p>현재 접속 중인 데이터베이스: <code>$dbname</code></p>";

  // 테이블 목록 출력
  $result = $conn->query("SHOW TABLES");
  if ($result && $result->num_rows > 0) {
    echo "<h5>📄 테이블 목록</h5><ul class='list-group'>";
    while ($row = $result->fetch_array()) {
      echo "<li class='list-group-item'>" . htmlspecialchars($row[0]) . "</li>";
    }
    echo "</ul>";
  } else {
    echo "<p class='text-muted'>테이블 없음 또는 쿼리 실패.</p>";
  }
}
echo '  </div>
</div>
</body>
</html>';

// 연결 종료
$conn->close();
?>

