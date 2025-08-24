<?php
// 연동 확인용 코드
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
  if ($res) {
    while ($row = $res->fetch_array()) {
      $tables[] = $row[0];
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LEMP 기반 블로그</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
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
	.profile-sub {
	border-radius: 50%;
	}
  .text-none {
    color: black;
    text-decoration: none;
  }
    </style>
  </head>
  <body style="background: #f7f9fc">
   
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
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="16"
                    height="16"
                    fill="currentColor"
                    class="bi bi-geo-alt-fill"
                    viewBox="0 0 16 16"
                  >
                    <path
                      d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
                    />
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
              <div class="col-6">
                <p>Location</p>
              </div>
              <div class="col-6">
                <p>인천</p>
              </div>
              <div class="col-6">
                <p>Age</p>
              </div>
              <div class="col-6">
                <p>비공개</p>
              </div>
            </div>
          
            <div class="col-12"><p>Nginx + PHP + Mariadb 연동</p></div>
<div class="col-12">
  <?php if ($connected): ?>
    <div class="text-success">
      🟢 <strong>정상 연결됨</strong>
      <ul class="mb-0 small"`>
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

    <div class="container mt-4">
      <div class="row">
        <!-- 좌측 카테고리 -->
        <div class="col-md-3">
          <div class="white-box">
            <h4>카테고리</h4>
            <p><a href="/profile.php" class="text-none">• MY프로필</a></p>
            <p><a href="/lemp.php" class="text-none">• LEMP 스택 소개 및 설치</a></p>
	    <p><a href="/개발일지.php" class="text-none">• APOS개발일지</a></p>
	    <p><a href="#" class="text-none">• HTML개발</a></p>
          </div>
        </div>

        <!-- 중앙 본문 -->
        <div class="col-md-6">
          <div class="white-box">
            <h3>공지사항</h3>
            <p>
              이 블로그는 VMware Ubuntu 환경에서 LEMP 스택과 WordPress 그리고 bootstrap을 활용해 구축되었습니다.<br />
              좌측 카테고리 메뉴를 통해 페이지를 이동할 수 있습니다.
            </p>
            <div class="text-end">
              <a href="/comment-list.php" class="btn btn-outline-secondary btn-sm">💬 댓글 전체 보기</a>
            </div>
          </div>
        </div>
	
        <!-- 우측 댓글영역 -->
        <div class="col-md-3">
          <div class="white-box">
            <h4>댓글</h4>
            <form action="/comment.php" method="POST">
              <input type="text" name="name" placeholder="이름" class="form-control mb-2" required />
              <textarea name="comment" placeholder="댓글 입력" class="form-control mb-2" required></textarea>
              <button type="submit" class="btn btn-primary">등록</button>
            </form>
	  </div>
<br>
<div class="white-box">
  <p class="text-muted fw-bold mb-2">현재 사용중인 유저</p>
  
  <div class="d-flex" style="font-size: 12px">
    <div class="flex-shrink-0">
      <img src="/봇치짱.jpg" class="mt-2 profile-sub" width="60px" />
    </div>
    <div class="flex-grow-1 ms-3 py-2">
      <h6 class="mb-0">@AN9gunzo</h6>
      <p class="mb-1">Front-end Designer</p>
      <p class="mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
             fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
          <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
        </svg>
        인천
      </p>
    </div>
  </div>
</div>	

        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>




