<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/question/css/notice.css">
	<script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/service/question/js/notice.js" defer></script>
</head>

<body>
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
	</header>
	<section>
		<div id="board_box">
			<h3 id="board_title">
				문의게시판
			</h3>
			<hr>
			<?php
			$num  = $_GET["num"];
			$page = $_GET["page"];

			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

			create_table($con, 'question');
			create_table($con, 'question_ripple');
			// $con = mysqli_connect("localhost", "user1", "12345", "sample");

			$sql = "select * from question where num=$num";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$name       = $row["name"];
			$subject    = $row["subject"];
			$content    = $row["content"];
			$read_pw	= $row["read_pw"];
			$file_name  = $row["file_name_0"];
			?>
			<form name="board_form" method="post" action="dmi_question.php?num=<?= $num ?>&page=<?= $page ?>&mode=modify" enctype="multipart/form-data">
				<ul id="board_form">
					<li>
						<span class="col1">이름 : </span>
						<span class="col2"><?= $name ?></span>
					</li>
					<li id="read_pw">
						<span class="col1">비밀번호 : </span>
						<span class="col2"><input  autocomplete="off" type="text" name="read_pw"></span>
					</li>
					<li>
						<span class="col1">제목 : </span>
						<span class="col2"><input autocomplete="off" name="subject" type="text" value="<?= $subject ?>"></span>
					</li>
					<li id="text_area">
						<span class="col1">내용 : </span>
						<span class="col2">
							<textarea name="content"><?= $content ?></textarea>
						</span>
					</li>
					<li>
						<span class="col1"> 첨부 파일</span>
						<span class="col2"><input type="file" name="upfile"></span>
					</li>
				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">수정하기</button></li>
					<li><button type="button" onclick="location.href='question_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>