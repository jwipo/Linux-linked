<?php
$host = 'localhost';
$user = 'wpdbadmin';
$pass = 'admin001';
$dbname = 'wpdb';

$mysqli = @new mysqli($host, $user, $pass, $dbname);
$connected = !$mysqli->connect_error;
$php_version = phpversion();
$db_version = $connected ? $mysqli->server_info : 'N/A';
$tables = [];

if ($connected) {
  $res = $mysqli->query("SHOW TABLES");
  while ($row = $res->fetch_array()) {
    $tables[] = $row[0];
  }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>내 소개</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .white-box {
      background: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0.5px 0.5px 2px 1px #eee;
    }
    .profile {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-top: 10px;
    }
.profile-real {
width:120px;
height: 130px;
}
  </style>
</head>
<body style="background: #f7f9fc;">
  <div class="container">
    <div class="white-box">
      <div class="row">
        <div class="col-md-8">
          <div class="d-flex">
            <div class="flex-shrink-0">
              <img class="profile" src="../봇치짱.jpg" />
            </div>
            <div class="flex-grow-1 ms-3 py-2">
              <h3 class="mb-0">안구건조의HTML개발 블로그</h3>
              <p class="mb-2 width">@AN9gunzo</p>
              <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                  class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                  <path
                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />
                </svg>
                인천
              </p>
              <p>email : taeyun7527@naver.com</p>
              <p>twitter : <a href="https://x.com/AN9gunzo">@AN9gunzo</a></p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mt-4 mt-md-1" style="font-size: 16px">
          <div class="row">
            <div class="col-6"><p>Location</p></div>
            <div class="col-6"><p>인천</p></div>
            <div class="col-6"><p>Age</p></div>
            <div class="col-6"><p>비공개</p></div>
            <div class="col-12"><p>Nginx + PHP + Mariadb 연동</p></div>
            <div class="col-12">
              <?php if ($connected): ?>
              <div class="text-success">🟢
                <strong>정상 연결됨</strong>
                <ul class="mb-0 small">
                  <li>PHP: <?= $php_version ?></li>
                  <li>MariaDB: <?= $db_version ?></li>
                  <li>DB: <code><?= $dbname ?></code></li>
                  <li>테이블 수: <?= count($tables) ?>개</li>
                </ul>
              </div>
              <?php else: ?>
              <div class="text-danger">
                ❌ <strong>DB 연결 실패</strong><br>
                <span class="small">계정명 또는 비밀번호 오류일 수 있습니다.</span>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-4">
    <div class="white-box">
      <h3><img class="profile-real"src="/와따시데스.jpg"> MY프로필</h3>
      <p><strong>이름:</strong> 박태윤</p>
      <p><strong>전공:</strong> 배재대학교 소프트웨어학과</p>
      <p><strong>관심 분야:</strong> HTML, 프론트&백엔드,  HTML게임개발, 애니, 컴퓨터(소프트웨어, 하드웨어)</p>
<p><strong>현재 진행중인 프로젝트:</strong> APOS웹프로젝트(1인개발)</p>
      <p><strong>이메일:</strong> taeyun7527@naver.com</p>
      <p><strong>개발 목표:</strong> 직접 구현하는 웹 인터페이스를 통해 프론트엔드와 백엔드 전반을 경험하며 풀스택 개발자로 거듭나는 목표를 가지고있습니다 ^^7</p>
      <a href="/index.php" class="btn btn-outline-primary mt-3">⬅ 메인으로 돌아가기</a>
    </div>
  </div>
</body>
</html>

