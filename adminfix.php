<?php
function GetSQLValueString($theValue, $theType)
{
  switch ($theType) {
    case "string":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_ADD_SLASHES) : "";
      break;
    case "int":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
      break;
    case "email":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_EMAIL) : "";
      break;
    case "url":
      $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_URL) : "";
      break;
  }
  return $theValue;
}

require_once("./conections/connMysql.php");

//預設每頁筆數
$pageRow_records = 4;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages - 1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecAlbum = "SELECT album.album_id , album.album_date , album.album_location , album.album_title , album.album_desc , albumphoto.ap_picurl, count( albumphoto.ap_id ) AS albumNum FROM album LEFT JOIN albumphoto ON album.album_id = albumphoto.album_id GROUP BY album.album_id , album.album_date , album.album_location , album.album_title , album.album_desc ORDER BY album_date DESC";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$query_limit_RecAlbum = $query_RecAlbum . " LIMIT {$startRow_records}, {$pageRow_records}";
//以加上限制顯示筆數的SQL敘述句查詢資料到 $RecAlbum 中
$RecAlbum = $db_link->query($query_limit_RecAlbum);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecAlbum 中
$all_RecAlbum = $db_link->query($query_RecAlbum);
//計算總筆數
$total_records = $all_RecAlbum->num_rows;
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records / $pageRow_records);

//更新相簿
if (isset($_POST["action"]) && ($_POST["action"] == "update")) {
  //更新相簿資訊
  $query_update = "UPDATE album SET album_title=?, album_date=?, album_location=?, album_desc=? WHERE album_id=?";
  $stmt = $db_link->prepare($query_update);
  $stmt->bind_param(
    "ssssi",
    GetSQLValueString($_POST["album_title"], "string"),
    GetSQLValueString($_POST["album_date"], "string"),
    GetSQLValueString($_POST["album_location"], "string"),
    GetSQLValueString($_POST["album_desc"], "string"),
    GetSQLValueString($_POST["album_id"], "int")
  );
  $stmt->execute();
  $stmt->close();
  //更新照片資訊
  for ($i = 0; $i < count($_POST["ap_id"]); $i++) {
    $query_update = "UPDATE albumphoto SET ap_subject='{$_POST["update_subject"][$i]}' WHERE ap_id={$_POST["ap_id"][$i]}";
    $db_link->query($query_update);
  }
  //執行檔案刪除
  if (isset($_POST["delcheck"])) {
    for ($i = 0; $i < count($_POST["delcheck"]); $i++) {
      $delid = $_POST["delcheck"][$i];
      $query_del = "DELETE FROM albumphoto WHERE ap_id={$_POST["ap_id"][$delid]}";
      $db_link->query($query_del);
      unlink("photos/" . $_POST["delfile"][$delid]);
    }
  }
  //執行照片新增及檔案上傳
  for ($i = 0; $i < count($_FILES["ap_picurl"]); $i++) {
    if ($_FILES["ap_picurl"]["tmp_name"][$i] != "") {
      $query_insert = "INSERT INTO albumphoto (album_id, ap_date, ap_picurl, ap_subject) VALUES (?, NOW(), ?, ?)";
      $stmt = $db_link->prepare($query_insert);
      $stmt->bind_param(
        "iss",
        GetSQLValueString($_POST["album_id"], "int"),
        GetSQLValueString($_FILES["ap_picurl"]["name"][$i], "string"),
        GetSQLValueString($_POST["ap_subject"][$i], "string")
      );
      $stmt->execute();
      $stmt->close();
      if (!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"][$i], "photos/" . $_FILES["ap_picurl"]["name"][$i])) die("檔案上傳失敗！");;
    }
  }
  //重新導向回到本畫面
  // header("Location: ?id=" . $_POST["album_id"]);
  header("Location: admin.php");
}

//顯示相簿資訊SQL敘述句
$sid = 0;
if (isset($_GET["id"]) && ($_GET["id"] != "")) {
  $sid = GetSQLValueString($_GET["id"], "int");
}
$query_RecAlbum = "SELECT * FROM album WHERE album_id={$sid}";
//顯示照片SQL敘述句
$query_RecPhoto = "SELECT * FROM albumphoto WHERE album_id={$sid} ORDER BY ap_date DESC";
//將二個SQL敘述句查詢資料到 $RecAlbum、$RecPhoto 中
$RecAlbum = $db_link->query($query_RecAlbum);
$RecPhoto = $db_link->query($query_RecPhoto);
//計算照片總筆數
$total_records = $RecPhoto->num_rows;
//取得相簿資訊
$row_RecAlbum = $RecAlbum->fetch_assoc();

// //新增相簿
// if (isset($_POST["action"]) && ($_POST["action"] == "add")) {
//   $query_insert = "INSERT INTO album (album_title, album_date, album_location, album_desc) VALUES (?, ?, ?, ?)";
//   $stmt = $db_link->prepare($query_insert);
//   $stmt->bind_param(
//     "ssss",
//     GetSQLValueString($_POST["album_title"], "string"),
//     GetSQLValueString($_POST["album_date"], "string"),
//     GetSQLValueString($_POST["album_location"], "string"),
//     GetSQLValueString($_POST["album_desc"], "string")
//   );
//   $stmt->execute();

//   //取得新增的相簿編號
//   $album_pid = $stmt->insert_id;
//   $stmt->close();

//   for ($i = 0; $i < count($_FILES["ap_picurl"]["name"]); $i++) {
//     if ($_FILES["ap_picurl"]["tmp_name"][$i] != "") {
//       $query_insert = "INSERT INTO albumphoto (album_id, ap_date, ap_picurl, ap_subject) VALUES (?, NOW(), ?, ?)";
//       $stmt = $db_link->prepare($query_insert);
//       $stmt->bind_param(
//         "iss",
//         GetSQLValueString($album_pid, "int"),
//         GetSQLValueString($_FILES["ap_picurl"]["name"][$i], "string"),
//         GetSQLValueString($_POST["ap_subject"][$i], "string")
//       );
//       $stmt->execute();
//       if (!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"][$i], "photos/" . $_FILES["ap_picurl"]["name"][$i])) die("檔案上傳失敗！");
//       $stmt->close();
//     }
//   }

//   //重新導向
//   header("Location: admin.php");
// }
?>

<!doctype html>
<html lang="zh-TW">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>模型專賣店</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
  <link rel="stylesheet" href="css/website_s01.css">
  <script language="javascript">
    function deletesure() {
      if (confirm('\n您確定要刪除整個相簿嗎?\n刪除後無法恢復!\n')) return true;
      return false;
    }
  </script>
</head>

<body>
  <section id="header">
    <nav class="navbar navbar-expand-sm fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img src="./images/logo.jpg" class="img-fluid rounded-circle" alt="電商藥粧"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link" href="./admin.php"><span class="text-primary">相簿管理</span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">會員註冊</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">會員登入</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">會員中心</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">最新活動</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">查訂單</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">折價券</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">購物車</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                企業專區
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">認識企業文化</a></li>
                <li><a class="dropdown-item" href="#">全台門市資訊</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">供應商報價服務</a></li>
                <li><a class="dropdown-item" href="#">加盟專區</a></li>
                <li><a class="dropdown-item" href="#">投資人專區</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </section>
  <section id="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <div class="sidebar">
            <form name="search" id="search" method="get">
              <div class="input-group">
                <input type="text" name="search_name" class="form-control" placeholder="search...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="fas fa-search fa-lg"></i></button></span>
              </div>
            </form>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <i class="fas fa-bomb fa-lg fa-fw"></i><span class="pl-1">鋼彈模型</span>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>水星的魔女</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>1/100 MG</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>1/100 RE系列</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <i class="fas fa-wand-sparkles fa-lg fa-fw"></i><span class="pl-1">動畫分類</span>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>SPYxFAMILY 間諜家家酒</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>七龍珠</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>福音戰士Evangelion</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <i class="fas fa-ghost fa-lg fa-fw"></i><span class="pl-1">動漫周邊</span>
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>PVC、公仔、景品</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>可動公仔/可動玩偶</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>轉蛋 食玩 盒玩 盲盒</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <i class="fas fa-face-smile fa-lg fa-fw"></i><span class="pl-1">好微笑 GoodSmile</span>
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>黏土人 Nendoroid</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>figma可動系列</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>ACT MODE 系列</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-10">
          <div class="row text-center">

            <!-- As a heading -->
            <nav class="navbar bg-light">
              <div class="container-fluid">
                <span class="navbar-brand mt-0 h1">網路相簿管理界面-修改相簿資訊</span>
                <div class="navbar-brand">相片張數: <?php echo $total_records; ?>，<a href="#" onClick="window.history.back();">回上一頁</a></div>
              </div>
              <div class="container-fluid">
                <span class="navbar-brand mb-0 h1"><a href="./admin.php">[管理首頁]</a> <a href="./index.php">[登出系統]</a></span>
              </div>
            </nav>

            <!-- 修改相簿程式 -->
            <table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td style="background-color: #fff;">
                  <div id="mainRegion">
                    <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
                      <tr>
                        <td>
                          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <div class="normalDiv">
                              <p class="heading">相簿內容</p>
                              <p>相簿名稱：<input name="album_title" type="text" id="album_title" value="<?php echo $row_RecAlbum["album_title"]; ?>" />
                                <input name="album_id" type="hidden" id="album_id" value="<?php echo $row_RecAlbum["album_id"]; ?>" />
                              </p>
                              <p>拍攝時間：<input name="album_date" type="text" id="album_date" value="<?php echo $row_RecAlbum["album_date"]; ?>" /></p>
                              <p>拍攝地點 ：<input name="album_location" type="text" id="album_location" value="<?php echo $row_RecAlbum["album_location"]; ?>" /></p>
                              <p>相簿說明：<textarea name="album_desc" id="album_desc" cols="45" rows="5"><?php echo $row_RecAlbum["album_desc"]; ?></textarea></p>
                              <hr />
                            </div>
                            <?php
                            $checkid = 0;
                            while ($row_RecPhoto = $RecPhoto->fetch_assoc()) {
                            ?>
                              <div class="albumDiv">
                                <div class="picDiv"><img src="photos/<?php echo $row_RecPhoto["ap_picurl"]; ?>" alt="<?php echo $row_RecPhoto["ap_subject"]; ?>" width="120" height="120" border="0" /></div>
                                <div class="albuminfo">
                                  <p>
                                    <input name="ap_id[]" type="hidden" id="ap_id[]" value="<?php echo $row_RecPhoto["ap_id"]; ?>" />
                                    <input name="delfile[]" type="hidden" id="delfile[]" value="<?php echo $row_RecPhoto["ap_picurl"]; ?>">
                                    <input name="update_subject[]" type="text" id="update_subject[]" value="<?php echo $row_RecPhoto["ap_subject"]; ?>" size="15" />
                                    <br />
                                    <input name="delcheck[]" type="checkbox" id="delcheck[]" value="<?php echo $checkid;
                                                                                                    $checkid++ ?>" />刪除?
                                  </p>
                                </div>
                              </div>
                            <?php } ?>
                            <div class="normalDiv">
                              <hr />
                              <p class="heading">新增照片</p>
                              <div class="clear"></div>
                              <p>照片1<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                說明1：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                              <p>照片2<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                說明2：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                              <p>照片3<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                說明3：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                              <p>照片4<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                說明4：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                              <p>照片5<input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                                說明5：<input type="text" name="ap_subject[]" id="ap_subject[]" /></p>
                              <p>
                                <input name="action" type="hidden" id="action" value="update">
                                <input type="submit" name="button" id="button" value="確定修改" />
                                <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();" />
                              </p>
                            </div>
                          </form>
                        </td>
                      </tr>
                    </table>
                  </div>
                </td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
  </section>
  <hr>
  <section id="scontent">
    <div class="container-fluid">
      <div id="aboutme" class="row text-center">
        <div class="col-md-2"><img src="./images/Qrcode02.png" alt="QRCODE" class="img-fluid mx-auto"></div>
        <div class="col-md-2">
          <i class="fas fa-thumbs-up fa-5x"></i>
          <h3>關於我們</h3>
          關於我們<br>
          企業官網<br>
          招商專區<br>
          人才招募<br>
        </div>
        <div class="col-md-2">
          <i class="fas fa-truck fa-5x"></i>
          <h3>特色服務</h3>
          特色服務<br>
          大宗採購方案<br>
          直配大陸<br>
        </div>
        <div class="col-md-2">
          <i class="fas fa-users fa-5x"></i>
          <h3>客戶服務</h3>
          客戶服務<br>
          訂單/配送進度查詢<br>
          取消訂單/退貨<br>
          更改配送地址<br>
          追蹤清單<br>
          12H速達服務<br>
          折價券說明<br>
        </div>
        <div class="col-md-2">
          <i class="fas fa-comments-dollar fa-5x"></i>
          <h3>好康大放送</h3>
          好康大放送<br>
          新會員禮包<br>
          活動得獎名單<br>
        </div>
        <div class="col-md-2">
          <i class="fas fa-question fa-5x"></i>
          <h3>FAQ 常見問題</h3>
          FAQ 常見問題<br>
          系統使用問題<br>
          產品問題資詢<br>
          大宗採購問題<br>
          聯絡我們<br>
        </div>
      </div>
    </div>
  </section>
  <section id="footer">
    <div class="container-fluid">
      <div id="last-data" class="row text-center">
        <div class="col-md-12">
          <h6>中彰投分署科技股份有限公司 40767台中市西屯區工業區一路100號 電話：04-23592181 免付費電話：0800-777888</h6>
          <h6>企業通過ISO/IEC27001認證，食品業者登錄字號：A-127360000-00000-0</h6>
          <h6>版權所有 copyright © 2017 WDA.com Inc. All Rights Reserved.</h6>
        </div>
      </div>
    </div>
  </section>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</body>

</html>

<?php
$db_link->close();
?>