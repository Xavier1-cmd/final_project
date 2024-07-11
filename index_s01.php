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
        <a class="navbar-brand" href="#"><img src="./images/logo.jpg" class="img-fluid rounded-circle" alt="電商藥粧"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

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
                  <i class="fas fa-fire fa-lg fa-fw"></i>彩妝專區
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>隔離/防曬/飾底乳</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>BB霜/CC霜</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>粉餅(蕊)/蜜粉/蜜粉/海綿</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>遮瑕/毛孔/打亮</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <i class="fas fa-paw fa-lg fa-fw"></i>臉部保養
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>天然成分調理專區</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>婦嬰,敏感受損調理</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>Neogen</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>萊雅</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>肌研</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>露得清</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <i class="fas fa-user fa-lg fa-fw"></i>美膚保養
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>按摩油</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>纖體保養</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>身體香氛</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>身體防曬</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <i class="fas fa-user fa-lg fa-fw"></i>食品保健
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>肝臟保養／芝麻素</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>益生菌／乳酸菌</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>鐵／葉酸／孕期補充</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>蔓越莓／女性保養</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>男性健康補充</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>銀髮健康補充</a></td>
                      </tr>
                      <tr>
                        <td><a href="#"><em class="fas fa-edit"></em>成人特殊營養品</a></td>
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
                <img src="./product_img/pic1.jpg" class="d-block w-100" alt="雙11！天天最高送1111">
                <div class="carousel-caption d-none d-md-block">
                  <h5>雙11！天天最高送1111</h5>
                  <p>購物金活動採單日累計消費滿額即可參加登記送活動，活動期間僅需登記一次，部分商品不適用，詳見說明。</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="./product_img/pic2.jpg" class="d-block w-100" alt="建康養生的好幫手">
                <div class="carousel-caption d-none d-md-block">
                  <h5>建康養生的好幫手</h5>
                  <p>黑金鑽土雞18小時純粹滴煉，去油濾渣無膽固醇，殺菌包裝常溫保存，含BACC、雙肌肽、牛磺酸、小分子蛋白質等，可單飲或當高湯華陀扶元堂養生飲品系列3折優惠，歡迎選購</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="./product_img/pic3.jpg" class="d-block w-100" alt="頂級保濕面膜，臉部滋養的好幫手">
                <div class="carousel-caption d-none d-md-block">
                  <h5>頂級保濕面膜，臉部滋養的好幫手</h5>
                  <p>保養界的藝術品！內到外優雅自成一格，堅持保養始於自然，升級膚質0負擔，讓肌膚與生活更美好。源自台灣的國際保養品牌！</p>
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
            <div class="card col-md-3">
              <img src="./product_img/pic0101.jpg" class="card-img-top" alt="台大葉黃素膠囊">
              <div class="card-body">
                <h5 class="card-title">台大葉黃素膠囊</h5>
                <p class="card-text">游離型軟膠囊，採用金盞花植物萃取含20﹪葉黃素，調節生理機能，營養補給，健康維持</p>
                <p class="card-text">NT3600</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0102.jpg" class="card-img-top" alt="黃金燕窩生物纖維面膜">
              <div class="card-body">
                <h5 class="card-title">黃金燕窩生物纖維面膜</h5>
                <p class="card-text">手術後保養，約會前急救聖品，媲美專櫃等級！網友推薦最新使用，肌膚很水嫩，感覺很透亮。</p>
                <p class="card-text">NT1200</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0103.jpg" class="card-img-top" alt="MIZON 蝸牛全效活膚霜">
              <div class="card-body">
                <h5 class="card-title">MIZON 蝸牛全效活膚霜</h5>
                <p class="card-text">無論混合肌、油性肌、痘痘肌、乾性肌、過敏肌等《任何膚質適用》，是修護型保養品！！</p>
                <p class="card-text">NT690</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
              <img src="./product_img/pic0104.jpg" class="card-img-top" alt="星期四農莊迷迭香精油">
              <div class="card-body">
                <h5 class="card-title">星期四農莊迷迭香精油</h5>
                <p class="card-text">迷迭香精油+薰衣草精油(大自然植物舒眠系列)！！</p>
                <p class="card-text">NT1269</p>
                <a href="#" class="btn btn-primary">更多資訊</a>
                <a href="#" class="btn btn-success">放購物車</a>
              </div>
            </div>
            <div class="card col-md-3">
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
            </div>
          </div>
          <div class="row mt-2">
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
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
          <h6>中彰投分署科技股份有限公司 40767台中市西屯區工業區一路100號  電話：04-23592181 免付費電話：0800-777888</h6>
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