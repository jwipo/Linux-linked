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
  <title>LEMP 스택 소개</title>
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
      <h3>LEMP 스택 소개</h3>
      <p><strong>LEMP</strong>는 Linux, Nginx, MariaDB(MySQL), PHP의 약자로 구성된 웹 서버 소프트웨어 스택입니다.</p>
      <ul>
        <li><strong>Linux</strong> : 운영체제 (Ubuntu 등)</li>
        <li><strong>Nginx</strong> : 웹 서버</li>
        <li><strong>MariaDB</strong> : 데이터베이스 관리 시스템 (MySQL 대체)</li>
        <li><strong>PHP</strong> : 서버 사이드 스크립트 언어</li>
      </ul>
    </div>

    <div class="white-box mt-4">
  <h3>Ubuntu에서 LEMP 설치 가이드</h3>

  <ol>
    <li><strong>패키지 업데이트</strong><br>
      시스템 패키지를 최신 상태로 유지합니다.<br>
      <code>sudo apt update && sudo apt upgrade</code>
    </li>

    <li class="mt-3"><strong>Nginx 설치</strong><br>
      웹 서버를 설치하고 서비스 상태를 확인합니다.<br>
      <code>sudo apt install nginx</code><br>
      <code>sudo systemctl status nginx</code><br>
      설치 후 브라우저에서 <code>http://서버IP</code> 접속 시 "Welcome to nginx" 페이지가 나타나면 성공입니다.<br><br>
      <em>※ 설정파일 경로</em>: <code>/etc/nginx/nginx.conf</code><br>
      <em>※ 웹 루트 디렉토리</em>: <code>/var/www/html</code>
    </li>

    <li class="mt-3"><strong>MariaDB 설치 및 보안 설정</strong><br>
      데이터베이스 서버 설치:<br>
      <code>sudo apt install mariadb-server mariadb-client</code><br><br>

      설치 후 보안 설정:<br>
      <code>sudo mysql_secure_installation</code><br>
      설정 흐름:
      <ul>
        <li>루트 암호 설정</li>
        <li>익명 사용자 제거</li>
        <li>원격 root 로그인 차단</li>
        <li>테스트 DB 제거</li>
        <li>권한 테이블 새로고침</li>
      </ul>
      <em>※ DB 접속 명령</em>: <code>sudo mariadb -u root</code>
    </li>

    <li class="mt-3"><strong>PHP 설치</strong><br>
      PHP 실행 환경 및 MySQL 연동 모듈을 설치합니다.<br>
      <code>sudo apt install php php-fpm php-mysql</code><br>
      <code>php -v</code> 명령어로 PHP 버전 확인 가능<br>
      PHP-FPM 상태 확인:
      <code>sudo systemctl status php8.x-fpm</code><br>
      <em>※ PHP 설정 경로</em>: <code>/etc/php/8.x/fpm/pool.d/www.conf</code>
    </li>

    <li class="mt-3"><strong>Nginx와 PHP 연동 설정</strong><br>
      PHP-FPM과 연동을 위해 설정 파일을 수정합니다.<br>
      <code>sudo vi /etc/nginx/sites-available/default</code><br><br>

      설정 예시:
<pre><code>server {
    listen 80 default_server;
    root /var/www/html;
    index index.php index.html;

    location / {
        try_files $uri $uri/ =404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/run/php/php8.x-fpm.sock;
    }
}</code></pre>
      설정 적용 전 문법 확인:
      <code>sudo nginx -t</code><br>
      설정 적용:
      <code>sudo systemctl reload nginx</code>
    </li>

    <li class="mt-3"><strong>PHP 동작 확인용 info.php 생성</strong><br>
      PHP가 정상 작동하는지 확인하기 위해 테스트 파일을 생성합니다.<br>
      <code>echo "&lt;?php phpinfo(); ?&gt;" | sudo tee /var/www/html/info.php</code><br>
      브라우저 접속: <code>http://서버IP/info.php</code><br>
      PHP 환경 정보가 출력되면 성공<br>
      완료 후 보안을 위해 삭제:<br>
      <code>sudo rm /var/www/html/info.php</code>
    </li>
  </ol>
</div>
 <div class="text-end">
    <a href="/index.php" class="btn btn-outline-primary float-start mt-3">⬅ 메인으로 돌아가기</a>
  </div>

    </div>
  </div>
</body>
</html>


