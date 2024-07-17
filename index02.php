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

<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>模型屋 MR.SYOU HOBBY</title>

  <!-- Begin: Global plugin css -->
  <link rel="stylesheet" href="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/vendor.css">
  <link rel="stylesheet" href="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/style.css">
  <link rel="stylesheet" href="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/frontend.css">
  <!-- End: Global css-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.2.1/css/all.css">
  <link rel="stylesheet" href="css/website_s01.css">

  <title>模型屋 MR.SYOU HOBBY</title>
</head>

<body>
  <main class=" main_area position-relative">
    <div class="main_background" style="background: url(https://img.cloudimg.in/uploads/shops/1840/theme/43/43e429041e4b3946a481efd490ef1bcf.jpg?v=202407120420) center center  repeat  #000000 ;position:fixed;">
    </div>
    <div class="function_block">
      <header class="function_area">
        <div class="cont">
          <div class="d-flex justify-content-between">
            <ul class="function_list d-flex list-unstyled mb-0 flex_1">
              <li>
                <div class="el_hotkey_area">
                  <span class="position-relative">
                    <button class="btn el_btn el_btn_hotkey el_rounded_circle d-flex align-items-center justify-content-center js_hover_effect" type="button" style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-hover-style="background-color: #2B3033;border-color:#2B3033;color: #ffffff;" onclick="location.href='https://store.mrjoe.com.tw/order/query'">
                      <i class="icon-new_ordersearch md-16"></i>
                    </button>
                    <div class="el_btn_tips position-absolute mb-0">
                      <span class="el_top_triangle d-block mx-auto" style="border-bottom-color:rgba(50, 55, 58, 0.85);color: #ffffff;"></span>
                      <h6 class="d-flex mb-0" style="background-color: rgba(50, 55, 58, 0.85);color: #ffffff;">訂單查詢
                      </h6>
                    </div>
                  </span>
                  <span class="position-relative">
                    <button class="btn el_btn el_btn_hotkey el_rounded_circle d-flex align-items-center justify-content-center js_hover_effect" type="button" style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-hover-style="background-color: #2B3033;border-color:#2B3033;color: #ffffff;" onclick="location.href='https://store.mrjoe.com.tw/contact'">
                      <i class="icon-new_mail md-16"></i>
                    </button>
                    <div class="el_btn_tips position-absolute mb-0">
                      <span class="el_top_triangle d-block mx-auto" style="border-bottom-color:rgba(50, 55, 58, 0.85);color: #ffffff;"></span>
                      <h6 class="d-flex mb-0" style="background-color: rgba(50, 55, 58, 0.85);color: #ffffff;">聯絡我們
                      </h6>
                    </div>
                  </span>
                  <span class="position-relative">
                    <button class="btn el_btn el_btn_hotkey el_rounded_circle d-flex align-items-center justify-content-center js_hover_effect" type="button" style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-hover-style="background-color: #2B3033;border-color:#2B3033;color: #ffffff;" onclick="location.href='https://store.mrjoe.com.tw/faq'">
                      <i class="icon-new_info md-16"></i>
                    </button>
                    <div class="el_btn_tips position-absolute mb-0">
                      <span class="el_top_triangle d-block mx-auto" style="border-bottom-color:rgba(50, 55, 58, 0.85);color: #ffffff;"></span>
                      <h6 class="d-flex mb-0" style="background-color: rgba(50, 55, 58, 0.85);color: #ffffff;">購物說明
                      </h6>
                    </div>
                  </span>
                </div>
              </li>
              <li>
                <div class="el_login_area js_login" style="">
                </div>
                <div class="el_login_area js_logined" style="display:none">
                  <span class="is_login position-relative">
                    <button class="btn el_btn el_btn_login el_rounded_pill d-flex align-items-center justify-content-center js_member_hover_effect" type="button" style="background-color: #32373A;border-color:#32373A;" data-style="background-color: #32373A;border-color:#32373A;" data-hover-style="background-color: #FF9800;border-color:#FF9800;" onclick="location.href='https://store.mrjoe.com.tw/member/index'">
                      <i class="icon-crown md-16"></i>
                      <span style="background-color: rgba(255, 255, 255, 1)" data-style="background-color: rgba(255, 255, 255, 1)" data-hover-style="background-color: rgba(255, 255, 255, .1)">
                        <b class="js_member_name" style="color: #32373A;" data-style="color: #32373A;" data-hover-style="color: #ffffff;">
                          會員專區
                        </b>
                      </span>
                    </button>
                    <div class="el_btn_tips position-absolute mb-0">
                      <span class="el_top_triangle d-block mx-auto" style="border-bottom-color:rgba(50, 55, 58, 0.85);color: #ffffff;"></span>
                      <h6 class="d-flex mb-0" style="background-color: rgba(50, 55, 58, 0.85);color: #ffffff;">會員專區
                      </h6>
                    </div>
                  </span>
                  <span class="position-relative">
                    <button class="btn el_btn el_btn_hotkey el_rounded_circle d-flex align-items-center justify-content-center js_hover_effect js_member_logout" type="button" style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-style="background-color: #32373A;border-color:#32373A;color: #ffffff;" data-hover-style="background-color: #2B3033;border-color:#2B3033;color: #ffffff;">
                      <i class="icon-new_logout md-14"></i>
                    </button>
                    <div class="el_btn_tips position-absolute mb-0">
                      <span class="el_top_triangle d-block mx-auto" style="border-bottom-color:rgba(50, 55, 58, 0.85);color: #ffffff;"></span>
                      <h6 class="d-flex mb-0" style="background-color: rgba(50, 55, 58, 0.85);color: #ffffff;">登出</h6>
                    </div>
                  </span>
                </div>
              </li>

            </ul>
            <div class="el_social_area">
              <ul class="social_list d-flex list-unstyled mb-0">
                <li>
                  <a class="d-block" href="https://store.mrjoe.com.tw/">
                    <svg data-name=" 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72" style="width: 30px;">
                      <defs>
                        <style>
                          .cls-1 {
                            fill: #2B3033;
                          }

                          .cls-2 {
                            fill: #fff;
                          }
                        </style>
                      </defs>
                      <circle class="cls-1" cx="36" cy="36" r="36"></circle>
                      <path class="cls-2" d="M41.62,33.6a3.3,3.3,0,0,1-3.25-2.36V18h4.45l2.06,6.44v5.9a3.27,3.27,0,0,1-3.26,3.26Z">
                      </path>
                      <path class="cls-2" d="M30.38,33.6a3.27,3.27,0,0,1-3.26-3.26v-5.9L29.18,18h4.45V30.34a3.26,3.26,0,0,1-3.25,3.26Z">
                      </path>
                      <path class="cls-2" d="M19.14,33.6a3.27,3.27,0,0,1-3.26-3.26V24.66L19.43,18h4.78l-1.82,5.7v6.64a3.26,3.26,0,0,1-3.25,3.26Z">
                      </path>
                      <path class="cls-2" d="M32.41,45.91h7.31V54H32.41Z"></path>
                      <path class="cls-2" d="M44.45,54V43.54a2.37,2.37,0,0,0-2.36-2.37H30a2.37,2.37,0,0,0-2.37,2.37V54H21.94a1.64,1.64,0,0,1-1.64-1.65V38.24A8,8,0,0,0,24.76,36h0a8,8,0,0,0,11.18.06h0s.09.08.13.13a8.27,8.27,0,0,0,5.55,2.13h0A7.86,7.86,0,0,0,47.24,36h0a8,8,0,0,0,4.42,2.23h0v14.1A1.65,1.65,0,0,1,50.06,54H44.45Z">
                      </path>
                      <path class="cls-2" d="M52.86,33.6a3.26,3.26,0,0,1-3.25-3.26V23.7L47.79,18H52.6c1.68,3,3.07,5.61,3.52,6.53v5.81a3.27,3.27,0,0,1-3.26,3.26Z">
                      </path>
                    </svg>
                  </a>
                </li>

                <li><a class="d-block" href="https://www.facebook.com/MRJOEHOBBY/" target="_blank"><img class="mw-100" src="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/img_facebook.svg" width="30" height="30" alt=""></a></li>


                <li><a class="d-block" href="https://www.instagram.com/mr.joehobby/?hl=zh-tw" target="_blank"><img class="mw-100" src="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/img_instagram.svg" width="30" height="30" alt=""></a></li>

                <li><a class="d-block" href="https://www.youtube.com/c/MRJOEHOBBYtv/" target="_blank"><img class="mw-100" src="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/img_youtube.svg" width="30" height="30" alt=""></a></li>


                <li><a class="d-block" href="https://www.tiktok.com/@mrjoehobby" target="_blank"><img class="mw-100" src="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/img_tiktok.svg" width="30" height="30" alt=""></a></li>



              </ul>
            </div>
          </div>
        </div>
      </header>
    </div>
    <!-- <h1 class="text-primary display-1 mx-0">模型屋</h1> -->
    <div class="el_inner">
      <div class="el_logo_area d-flex justify-content-center align-items-center" style="background-color: rgba(255, 255, 255, 0);">
        <a class="d-block" href="https://store.mrjoe.com.tw/">
          <figure class="el_logo_image mb-0">
            <img class="el_logo_desktop mw-100" src="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/b15bd2600e0a4849bff0937ad7f577a1.png" alt="">
            <img class="el_logo_mobile mw-100" src="MR.JOE%20HOBBY%20%E6%A8%A1%E5%9E%8B%E5%B0%88%E9%96%80%E5%BA%97_files/edc04218e251dd094a3a595a079e16ef.png" width="0" alt="">
          </figure>
        </a>
      </div>
      <div class="el_sticky_inner js_header_menu_fix" data-menu-fix="">
        <div class="el_menu_area justify-content-center" style="background-color: rgba(0, 0, 0, 0);">
          <!-- <div class="el_menu_wrap">
            <ul class="el_menu_list md justify-content-center d-flex flex-wrap list-unstyled mb-0 js_header_hover">

            </ul>
          </div> -->
          <div class="col-md-10">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
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
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- test01 -->


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
      <div class="card col-md-4 bg-dark text-white">
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

  <!-- <hr> -->
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