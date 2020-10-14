<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/db/db_connector.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>HELF :: 관리자페이지</title>
  <link rel="stylesheet" type="text/css" href="./css/admin.css">
  <link rel="shortcut icon" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/img/todagtodag_logo.png">
  <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/todagtodag/css/common.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />

  <script src="http://code.jquery.com/jquery-1.12.4.min.js" charset="utf-8"></script>
  <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,500,700|Nanum+Gothic+Coding:400,700|Nanum+Gothic:400,700,800|Noto+Sans+KR:400,500,700,900&display=swap&subset=korean" rel="stylesheet">
</head>

<body>
  <script src="./chart/highcharts.js"></script>
  <script src="./chart/exporting.js"></script>
  <script src="./chart/export-data.js"></script>
  <script src="./chart/accessibility.js"></script>
  <header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/header.php"; ?>
  </header>
  <section>
    <?php
    // 날짜 셋팅
    $array = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $array2 = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $today = date("Y-m-d");
    for ($i = 0; $i < 12; $i++) {
      $array[$i] = $today;
      // 데이터 셋팅
      $sql = "SELECT * from members where regist_day = '$array[$i]';";
      $result = mysqli_query($con, $sql);
      $row = mysqli_num_rows($result); // 전체 글 수
      $array2[$i] = $row;
      $today++;
    }
    ?>
    <script>
      var arr1 = <?php echo  json_encode($array); ?>;
      var arr2 = <?php echo  json_encode($array2); ?>;
      console.log(arr1);
      console.log(arr2);
    </script>
    <div id="admin_border">
      <div id="snb">
        <div id="snb_title">
          <h1>관리자 페이지</h1>
        </div>
        <div id="admin_menu_bar">
          <br>
          <h3>회원관리</h3><!-- /.menu-title -->
          <ul>
            <li><a href="admin_members.php">회원관리</a></li>
          </ul>

          <br>
          <h3>병원관리</h3>
          <ul>
            <li><a href="admin_hospital.php">병원관리</a></li>
          </ul>

          <br>
          <h3>게시글 관리</h3>
          <ul>
            <li><a href="admin_notice.php">공지사항 관리</a></li>
            <li><a href="admin_free.php">자유게시판 관리</a></li>
            <li><a href="admin_media.php">영상게시판 관리</a></li>
          </ul>

          <br>
          <h3>건강정보 관리</h3>
          <ul>
            <li><a href="admin_health_info.php">건강정보 등록</a></li>
          </ul>

          <br>
          <h3>통계</h3>
          <ul id="sta_ul">
            <li><a href="admin_statistics1.php">매출 분석</a></li>
            <li><a href="admin_statistics2.php">인기 프로그램</a></li>
          </ul>
        </div>
      </div><!--  end of sub -->
      <div id="content">
        <h3>통계 > 월별 가입수</h3><br>

        <div id="container" style="height: 480px; width: 750px; margin-left:20px;"></div>

        <script type="text/javascript">
          Highcharts.chart('container', {
            chart: {
              type: 'line'
            },
            title: {
              text: 'Monthly Signup'
            },
            xAxis: {
              categories: [
                <?php
                for ($i = 0; $i < count($array); $i++) {
                  if ($i < count($array) - 1) {
                    echo "'" . $array[$i] . "',";
                  } else {
                    echo "'" . $array[$i] . "'";
                  }
                }
                ?>
              ]
            },
            yAxis: {
              title: {
                text: '가입수'
              }
            },
            plotOptions: {
              line: {
                dataLabels: {
                  enabled: true
                },
                enableMouseTracking: false
              }
            },
            series: [{
              name: '가입수',
              data: [
                <?php
                for ($i = 0; $i < count($array); $i++) {
                  if ($i < count($array) - 1) {
                    echo "" . $array2[$i] . ",";
                  } else {
                    echo "" . $array2[$i] . "";
                  }
                }
                ?>
              ]
            }]
          });
        </script>
        <br><br>

        <h3>통계 > 가게별 매출</h3><br>

        <figure class="highcharts-figure">
          <div id="container2" style="height: 480px; width:750px; margin-left:20px;"></div>
        </figure>

        <script type="text/javascript">
          Highcharts.chart('container2', {
            chart: {
              type: 'column'
            },
            title: {
              text: 'Revenue by Shop'
            },
            xAxis: {
              categories: [
                <?php
                for ($i = 0; $i < count($array); $i++) {
                  if ($i < count($array) - 1) {
                    echo "'" . $array[$i] . "',";
                  } else {
                    echo "'" . $array[$i] . "'";
                  }
                }
                ?>
              ],
              crosshair: true
            },
            yAxis: {
              min: 0,
              title: {
                text: '매출액 (만원)'
              }
            },
            tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} 만원</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
            },
            plotOptions: {
              column: {
                pointPadding: 0.2,
                borderWidth: 0
              }
            },
            series: [{
              name: 'SHOP',
              data: [
                1, 2, 3, 4, 5, 6
              ]
            }]
          });
        </script>

      </div><!-- //content -->
    </div>
  </section>
  <footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/todagtodag/footer.php"; ?>
  </footer>
</body>

</html>