<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>토닥토닥</title>
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/css/common.css">
	<link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/board/media/css/notice.css">
	<link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/btn_top.js" defer></script>
    <script src="http://<?= $_SERVER['HTTP_HOST'] ?>/todagtodag/js/drop_down.js" defer></script>
	<script>
		function check_input() {
			if (!document.board_form.subject.value) {
				alert("제목을 입력하세요!");
				document.board_form.subject.focus();
				return;
			}
			if (!document.board_form.content.value) {
				alert("내용을 입력하세요!");
				document.board_form.content.focus();
				return;
			}
			document.board_form.submit();
		}
	</script>
</head>

<body>
	<header>
		<?php include  $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
	</header>
	<br><br><br>
	<section>
		<div id="board_box">
			<h3 id="board_title">
				영상게시판 > 수정
			</h3>
			<?php
			$num  = $_GET["num"];
			$page = $_GET["page"];

			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
			include_once $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/create_table.php";

			create_table($con, 'media');
			// $con = mysqli_connect("localhost", "user1", "12345", "sample");

			$sql = "select * from media where num=$num";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$name       = $row["name"];
			$subject    = $row["subject"];
			$content    = $row["content"];
			$video_name  = $row["video_name"];
			?>
			<form name="board_form" method="post" action="dml_board.php?num=<?= $num ?>&page=<?= $page ?>&mode=modify" enctype="multipart/form-data">
				<ul id="board_form">
					<li>
						<span class="col1">이름 : </span>
						<span class="col2"><?= $name ?></span>
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
						<span class="col1">동영상 URL</span>
						<span class="col2"><input  autocomplete="off" type="text" name="video_name" value="<?=$video_name?>"></span>
					</li>
				</ul>
				<ul class="buttons">
					<li><button type="button" onclick="check_input()">수정</button></li>
					<li><button type="button" onclick="location.href='media_list.php'">목록</button></li>
				</ul>
			</form>
		</div> <!-- board_box -->
	</section>
	<footer>
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
	</footer>
</body>

</html>