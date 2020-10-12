<a id="btn_top" href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/img/back_to_top.png"
                              class="to_the_top"></a>
<div id="home_img_bar">
	<div class="slideBox">
		<div class="slide_image_box">
			<a href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/banner_1.png"
			                 alt="첫번째 이미지"></a>
			<a href="#"><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/banner_2.png"
			                 alt="두번째 이미지"></a>
		</div>
		<div class="slide_nav">
			<a href="#" id="prev">prev</a>
			<a href="#" id="next">next</a>
		</div>
		<div class="slide_indicator">
			<a href="#" class="active">1</a>
			<a href="#">2</a>
		</div>
	</div>
</div>
<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
?>
<div class="container">
	<div class="search">
		<form action="http://localhost/todagtodag/hospital/hospital.php" method="POST">
			<input type="text" placeholder="검색어를 입력하세요 ex)병원명.." name="keyword">
			<button><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/search.png" alt="검색"></button>
		</form>
	</div>

	<div class="location">
		<h1>내 주변 병원</h1><span><img src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/home/img/placeholder.png"></span>
		<div>
			<div></div>
			<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/hospital/hospital.php">
			<span id="hospital_more">
				<h2>병원 찾기 ></h2>
			</span></a>
		</div>
	</div>
	<div class="today_health_info">
		<h1>오늘의 건강 정보</h1>
		<div></div>
	</div>
	<div class="notice">
		<h1>공지사항</h1>
		<div></div>
	</div>
</div>
