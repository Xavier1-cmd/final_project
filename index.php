<?php
require_once("./conections/connMysql.php");
//預設每頁筆數
$pageRow_records = 6;
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
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./product_img/pic1.jpg" class="d-block w-100" alt="水星的魔女 SDCS異靈鋼彈">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="./product_img/pic2.jpg" class="d-block w-100" alt="AMAKLINITECH 始源我王凱牙">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="./product_img/pic3.jpg" class="d-block w-100" alt="飛翼零式隨時加開 熱烈預購中！">
                <div class="carousel-caption d-none d-md-block">
                  <h5></h5>
                  <p></p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <hr>
          <div class="row text-center">
            <!-- <div class="card col-md-3">
              <img src="./product_img/pic0101.jpg" class="card-img-top" alt="濕身阿爾維娜">
              <div class="card-body">
                <h5 class="card-title">濕身阿爾維娜</h5>
                <p class="card-text">預購25年3月 SIKI ANIM 1/7 PVC人形 濕身阿爾維娜 豪華版 附掛軸 PVC 完成品</p>
                <span class="card-text text-decoration-line-through">TWD $2,000</span>
                <p class="card-text">TWD $1,650</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div> -->

            <!-- 顯示商品資訊 -->
            <?php while ($row_RecAlbum = $RecAlbum->fetch_assoc()) { ?>
              <div class="card col-md-4">
                <a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"]; ?>">
                  <?php if ($row_RecAlbum["albumNum"] == 0) { ?>
                    <img src="images/nopic.png" alt="暫無圖片">
                  <?php } else { ?>
                    <span class="card border-0">
                      <img src="photos/<?php echo $row_RecAlbum["ap_picurl"]; ?>" alt="<?php echo $row_RecAlbum["album_title"]; ?>">
                    </span>
                  <?php } ?>
                </a>
                <div class="card-body">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row_RecAlbum["album_title"]; ?></h5>
                    <p class="card-text"><?php echo $row_RecAlbum["album_desc"]; ?></p>
                    <span class="card-text text-decoration-line-through">TWD $2,000</span>
                    <p class="card-text">TWD $1,650</p>
                    <a href="#" class="btn btn-primary">更多資訊</a>
                    <a href="#" class="btn btn-success">放購物車</a>
                    <div class="albuminfo">
                      <a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"]; ?>"><?php echo $row_RecAlbum["album_title"]; ?></a><br />
                      <span class="smalltext">共 <?php echo $row_RecAlbum["albumNum"]; ?> 張</span><br>
                      <br>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

            <!-- 網路相簿程式 -->
            <!-- <table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td height="124" valign="top" background="images/album_r1_c1.jpg">
                  <div class="titleDiv"> [生活、旅行的記錄]<br />
                  </div>
                  <div class="menulink"><a href="index.php">[相簿首頁]</a> <a href="login.php">[相簿管理]</a></div>
                </td>
              </tr>
              <tr>
                <td background="images/album_r2_c1.jpg">
                  <div id="mainRegion">
                    <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
                      <tr>
                        <td>
                          <div class="subjectDiv"> 網路相簿總覽 </div>
                          <div class="actionDiv">相簿總數: <?php echo $total_records; ?></div>
                          <div class="normalDiv"></div>
                          <?php while ($row_RecAlbum = $RecAlbum->fetch_assoc()) { ?>
                            <div class="albumDiv">
                              <div class="picDiv"><a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"]; ?>"><?php if ($row_RecAlbum["albumNum"] == 0) { ?><img src="images/nopic.png" alt="暫無圖片" width="120" height="120" border="0" /><?php } else { ?><img src="photos/<?php echo $row_RecAlbum["ap_picurl"]; ?>" alt="<?php echo $row_RecAlbum["album_title"]; ?>" width="120" height="120" border="0" /><?php } ?></a></div>
                              <div class="albuminfo"><a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"]; ?>"><?php echo $row_RecAlbum["album_title"]; ?></a><br />
                                <span class="smalltext">共 <?php echo $row_RecAlbum["albumNum"]; ?> 張</span><br>
                                <br>
                              </div>
                            </div>
                          <?php } ?>
                          <div class="navDiv">
                            <?php if ($num_pages > 1) { // 若不是第一頁則顯示 
                            ?>
                              <a href="?page=1">|&lt;</a> <a href="?page=<?php echo $num_pages - 1; ?>">&lt;&lt;</a>
                            <?php } else { ?>
                              |&lt; &lt;&lt;
                            <?php } ?>
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                              if ($i == $num_pages) {
                                echo $i . " ";
                              } else {
                                echo "<a href=\"?page=$i\">$i</a> ";
                              }
                            }
                            ?>
                            <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 
                            ?>
                              <a href="?page=<?php echo $num_pages + 1; ?>">&gt;&gt;</a> <a href="?page=<?php echo $total_pages; ?>">&gt;|</a>
                            <?php } else { ?>
                              &gt;&gt; &gt;|
                            <?php } ?>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </td>
              </tr>
              <tr>
                <td align="center" background="images/album_r2_c1.jpg" class="trademark">© 2016 eHappy Studio All Rights Reserved.</td>
              </tr>
              <tr>
                <td><img name="album_r4_c1" src="images/album_r4_c1.jpg" width="778" height="24" border="0" id="album_r4_c1" alt="" /></td>
              </tr>
            </table> -->

            <!-- <div class="card col-md-3">
              <img src="./product_img/pic0102.jpg" class="card-img-top" alt="被束縛的貓 露芙娜">
              <div class="card-body">
                <h5 class="card-title">被束縛的貓 露芙娜</h5>
                <p class="card-text">預購25年3月 SIKI ANIM 1/7 PVC人形 被束縛的貓 露芙娜 豪華版 附掛軸 PVC 完成品</p>
                <span class="card-text text-decoration-line-through">TWD $2,000</span>
                <p class="card-text">TWD $1,650</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0103.jpg" class="card-img-top" alt="費倫 葬送的芙莉蓮">
              <div class="card-body">
                <h5 class="card-title">費倫 葬送的芙莉蓮</h5>
                <p class="card-text">預購12月 好微笑 GSC 代理版 POP UP PARADE 費倫 葬送的芙莉蓮 完成品</p>
                <span class="card-text text-decoration-line-through">TWD $950</span>
                <p class="card-text">TWD $820</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0104.jpg" class="card-img-top" alt="hololive 噶嗚‧古拉 GURA">
              <div class="card-body">
                <h5 class="card-title">hololive 噶嗚‧古拉 GURA</h5>
                <p class="card-text">預購25年1月 好微笑 GSC 代理版 POP UP PARADE hololive 噶嗚‧古拉 GURA</p>
                <span class="card-text text-decoration-line-through">TWD $1,099</span>
                <p class="card-text">TWD $940</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div> -->
            <!-- <div class="card col-md-3">
              <img src="./product_img/pic0201.jpg" class="card-img-top" alt="頂級金貝貝棉柔魔術氈">
              <div class="card-body">
                <h5 class="card-title">頂級金貝貝棉柔魔術氈</h5>
                <p class="card-text">金貝貝棉柔魔術氈XXL27+1片【6包/箱】，適用15公斤以上</p>
                <p class="card-text">NT1560</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0202.jpg" class="card-img-top" alt="櫻桃肌粉餅撲角型-3入">
              <div class="card-body">
                <h5 class="card-title">櫻桃肌粉餅撲角型-3入</h5>
                <p class="card-text">【IH】櫻桃肌粉餅撲角型-3入 CB-3204，乾濕兩用的粉餅專用粉撲。</p>
                <p class="card-text">NT119</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0203.jpg" class="card-img-top" alt="NOYL化妝刷套裝組">
              <div class="card-body">
                <h5 class="card-title">NOYL化妝刷套裝組</h5>
                <p class="card-text">NOYL化妝刷套裝組(附收納袋) NY-369，保存期限：7年</p>
                <p class="card-text">NT369</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0204.jpg" class="card-img-top" alt="3D蘋果光氣墊粉餅">
              <div class="card-body">
                <h5 class="card-title">3D蘋果光氣墊粉餅</h5>
                <p class="card-text">【Keep in touch】3D蘋果光氣墊粉餅，15g+15g(買一送一補充蕊)。</p>
                <p class="card-text">NT1680</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0301.jpg" class="card-img-top" alt="EVE'S 魔術性感美唇膏">
              <div class="card-body">
                <h5 class="card-title">EVE'S 魔術性感美唇膏</h5>
                <p class="card-text">魔術性感美唇膏，不沾杯超持久唇色，想不到的魔術效果持續久久。</p>
                <p class="card-text">NT580</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0302.jpg" class="card-img-top" alt="DMC三合一精華霜">
              <div class="card-body">
                <h5 class="card-title">DMC三合一精華霜</h5>
                <p class="card-text">DMC 欣蘭 水透透三合一凝凍 洗卸/面膜/精華霜 150g。</p>
                <p class="card-text">NT850</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0303.jpg" class="card-img-top" alt="森下仁丹整晚貼眼膜">
              <div class="card-body">
                <h5 class="card-title">森下仁丹整晚貼眼膜</h5>
                <p class="card-text">日本森下仁丹整晚貼眼膜 5對/盒，長效整晚貼，慢速釋放保濕因子。</p>
                <p class="card-text">NT300</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0304.jpg" class="card-img-top" alt="【美爽爽】泡泡染">
              <div class="card-body">
                <h5 class="card-title">【美爽爽】泡泡染</h5>
                <p class="card-text">【美爽爽】泡泡染BUBBLE COLOR系列，任意顏色，買五送二。</p>
                <p class="card-text">NT3250</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div> -->
          </div>

          <div class="row mt-2">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <?php if ($num_pages > 1) { // 若不是第一頁則顯示 
                  ?>
                    <a class="page-link" href="?page=<?php echo $num_pages - 1; ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  <?php } else { // 若是第一頁則顯示禁止 
                  ?>
                    <span class="page-link page-not-allowed" aria-hidden="false" aria-label="Previous">&laquo;</span>
                  <?php } ?>
                </li>
                <?php
                for ($i = 1; $i <= $total_pages; $i++) {
                  if ($i == $num_pages) {
                    echo "<li class='page-item page-link active'>$i</li>";
                  } else {
                    echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                  }
                }
                ?>
                <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 
                ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $num_pages + 1; ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                <?php } else { // 若是最後一頁則顯示禁止 
                ?>
                  <li class="page-item">
                    <span class="page-link page-not-allowed" aria-label="Next">
                      <span aria-hidden="false">&raquo;</span>
                    </span>
                  </li>
                <?php } ?>
              </ul>
            </nav>
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