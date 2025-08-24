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
  <meta charset="UTF-8" />
  <title>APOS 개발일지</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .white-box {
      background: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0.5px 0.5px 2px 1px #eee;
      margin-bottom: 20px;
    }
    .profile {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      margin-top: 10px;
    }
    h4.section-title {
      margin-top: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body style="background: #f7f9fc;">

<div class="container">
  <!-- 상단 프로필 정보 -->
  <div class="white-box">
    <div class="row">
      <div class="col-md-8">
        <div class="d-flex">
          <div class="flex-shrink-0">
            <img class="profile" src="/봇치짱.jpg" />
          </div>
          <div class="flex-grow-1 ms-3 py-2">
            <h3 class="mb-0">안구건조의HTML개발 블로그</h3>
            <p class="mb-2">@AN9gunzo</p>
            <p>📍 인천</p>
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
          <div class="col-12"><p>Nginx + PHP + MariaDB 연동</p></div>
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
            <div class="text-danger">❌
              <strong>DB 연결 실패</strong><br>
              <span class="small">계정명 또는 비밀번호 오류일 수 있습니다.</span>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 개발일지 날짜별 분단 시작 -->

  <div class="white-box">
  <h4 class="section-title">[01] 시스템 기획 및 구조 설정 <small class="text-muted">2025.03.10</small></h4>
  <p>APOS는 '세상의 끝으로'라는 콘셉트로 시작된 아포칼립스 생존 게임입니다.</p>
  <ul>
    <li>장르: 생존 + 시뮬레이션 + 어드벤처</li>
    <li>플레이어는 4방향 이동만 가능한 1인칭 시점에서 탐험</li>
    <li>엔진 없이 HTML + React + Firebase + Node.js 구성</li>
    <li>맵 티어 구조 (신도시 ~ 방사능 지역 총 6단계)</li>
    <li>게임의 핵심: "불친절함", 자율 탐색 구조, 점수 기반 물물교환</li>
  </ul>
</div>

<div class="white-box">
  <h4 class="section-title">[02] 시뮬레이션 설계 및 NPC 동작 <small class="text-muted">2025.03.13</small></h4>
  <p>상호작용 및 맵 이벤트 중심의 시뮬레이션을 구성했습니다.</p>
  <ul>
    <li>아이템은 건물 내 드롭 / 거리에서는 제한적</li>
    <li>NPC는 맵 전체를 랜덤 이동하며 플레이어 추적 알고리즘 존재</li>
    <li>아이템은 일회성 사용 가능 (예: 암살 도구)</li>
    <li>설치 가능한 함정과 흔적 유도 시스템 구현</li>
    <li>날씨, 방사능, 레드존 등 동적 이벤트 발생 가능</li>
  </ul>
</div>

<div class="white-box">
  <h4 class="section-title">[03] 기능 구성 및 서버 설계 <small class="text-muted">2025.03.18</small></h4>
  <ul>
    <li>닉네임 입력 시 무작위 맵에 스폰</li>
    <li>무단 접근은 자동 메인화면 리다이렉트 검토</li>
    <li>인벤토리 구조 설계 (동적 생성)</li>
    <li>서버는 Firebase에 유저 상태 저장 + Node.js로 이벤트 관리</li>
    <li>맵 상태 / NPC / 아이템 현황은 별도 파일 단위 저장</li>
  </ul>
</div>

<div class="white-box">
  <h4 class="section-title">[04] UI/UX 디자인 & 상태 표시 <small class="text-muted">2025.03.24</small></h4>
  <ul>
    <li>기본 UI 요소: 체력바, 시계, 날씨 아이콘, 지역명, 장비 슬롯</li>
    <li>심박수 UI: 적 근처 접근 시 붉은 파형 + 진동 효과로 경고</li>
    <li>방향 UI: 마우스를 위치하면 앞/좌/우 화살표 표시 → 클릭 이동</li>
    <li>실시간 시간 흐름 표현 (새벽/낮/밤 전환)</li>
    <li>마우스 오버 시 손/돋보기 아이콘 표시로 상호작용 유도</li>
  </ul>
<img src="image.png" width="600" height="350">
</div>

<div class="white-box">
  <h4 class="section-title">[05] 렌더링 병목 해결 및 서버 분리 <small class="text-muted">2025.04.02</small></h4>
  <p>React 렌더링 성능 저하 이슈가 발생하여 기술적인 대응이 필요했습니다.</p>
  <ul>
    <li>이미지 처리용 Node.js 서버를 별도로 분리</li>
    <li>Canvas 기반으로 렌더링 방식 전환 (DOM 과부하 해소)</li>
    <li>WebP 이미지 포맷 도입 (용량 80% 절감)</li>
    <li>WebSocket 도입 검토 중 (비동기 이벤트 처리 용도)</li>
    <li>requestAnimationFrame 활용으로 성능 최적화</li>
  </ul>
</div>

<div class="white-box">
  <h4 class="section-title">[06] 접속 및 저장 시스템 설계 <small class="text-muted">2025.04.19</small></h4>
  <ul>
    <li>Firebase 기반 인증 + 유저 정보 저장</li>
    <li>게임 중단 시 상태(위치/아이템/체력) 저장 가능</li>
    <li>접속 코드 기반 로그인 (회원가입 없이 랜덤 6자리 + 닉네임)</li>
    <li>이메일 인증 후 관리자 수락 → 코드 발급 구조</li>
    <li>디스코드 인증도 연동 고려</li>
  </ul>
</div>

<div class="white-box">
  <h4 class="section-title">[07] 개발 이론 재검토 <small class="text-muted">2025.05.21</small></h4>
  <ul>
    <li>기초 시스템 완료</li>
    <li>고려중인것들:</li>
    <ul>
      <li>플레이어 이동 UI 개선</li>
      <li>맵 자동 생성 로직 구현</li>
      <li>서버 리셋 이벤트 구현 (연 1회)</li>
    </ul>
  </ul>
  <img src="/apos개발.jpg" width="500" height="350">
</div>


  <a href="/index.php" class="btn btn-outline-primary mt-4">⬅ 메인으로 돌아가기</a>

</div>
<br>
</body>
</html>

