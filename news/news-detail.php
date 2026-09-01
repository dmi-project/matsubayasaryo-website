<?php //▼▼ 既存ページヘ埋め込み時はまるっとコピペ下さい （この行も含みページ最上部に）※.phpでかつUTF-8のページのみ可▼▼
//※逆にこのページに対して既存のページのhtmlを記述する形でももちろんOKです。
//----------------------------------------------------------------------
// 詳細ページ（ポップアップと兼用）
// 設定ファイルの読み込みとページ独自設定
//----------------------------------------------------------------------
include_once("./pkobo_news/admin/include/config.php");//（必要に応じてパスは適宜変更下さい）
$img_updir = './pkobo_news/upload';//画像保存パス（必要に応じてパスは適宜変更下さい）

$id = (!empty($_GET['id'])) ? h($_GET['id']) : exit('パラメータがありません');
$getFormatDataArr = getLines2DspData($file_path,$img_updir,$config,$id);
$dataArr = (!empty($getFormatDataArr)) ? $getFormatDataArr : exit('データが存在しません');
//----------------------------------------------------------------------
// 設定ファイルの読み込みとページ独自設定
//----------------------------------------------------------------------
//▲▲ コピペここまで ▲▲（この行も含む）?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo h(strip_tags($dataArr['title']));//タイトルを表示（必要に応じてコピペ下さい）?>｜詳細ページ</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="Keywords" content="" />
<meta name="Description" content="<?php echo h(strip_tags($dataArr['title']));//タイトルを表示（必要に応じてコピペ下さい）?>" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
    
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CMXCC5GNLQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CMXCC5GNLQ');
</script>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" href="../assets/images/favicon/favicon.ico">
<link rel="manifest" href="../assets/images/favicon/site.png">
<link rel="mask-icon" href="../assets/images/favicon/safari-pinned-tab.png" color="#000000">
<meta name="msapplication-TileColor" content="#000000">
<meta name="theme-color" content="#000000">
<link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" href="../assets/css/movie.css">
<link rel="stylesheet" href="../assets/css/photo_slider.css">
<script src="https://unpkg.com/imagesloaded%405.0.0/imagesloaded.pkgd.min.js"></script>
    
<meta name="keywords" content="松葉屋茶寮,Matsubaya saryo,緑閑庵,ROKKAN AN,OKASHIYA,方舟 hakobune Gallery,盆栽,茶寮,工芸品,骨董品,日本文化,技術,伝統,YAKUZEN ONGAKU,サウンドトリートメント,メディテーションルーム">
<meta name="description" content="松葉屋茶寮・方舟GALLERYからのお知らせやイベント情報、季節のおすすめなど最新情報をご紹介します。">
<meta property="og:title" content="松葉屋茶寮">
<meta property="og:description" content="松葉屋茶寮・方舟GALLERYからのお知らせやイベント情報、季節のおすすめなど最新情報をご紹介します。">
<meta property="og:image" content="https://mtbysr.jp/assets/images/ogp.png" />
<meta property="og:image:secure_url" content="https://mtbysr.jp/assets/images/ogp.png" />
<meta property="og:type" content="website">
<meta property="og:url" content="index.html">
<meta name="twitter:card" content="summary">
<meta name="format-detection" content="telephone=no">

    

<!--▼▼CSS。既存ページヘの埋め込み時はコピペ下さい（head部分に）▼▼-->
<style type="text/css">
/* CSSは必要最低限しか指定してませんのでお好みで（もちろん外部化OK） */
h2 {
    font-size: 1.3em;
    font-weight: 400;
}
#up_ymd{
	text-align:left;
	font-size:13px;
	margin:5px 10px;
    color:#999;
}
 #detail {
     margin-top: 65px;
    }
    
.detailText a {
  color: #ffffff !important;
  text-decoration: none !important;
}
	
.detailText a:hover {
  text-decoration: underline !important;
  color: #ffffff !important;
}
.detailUpfile{
	margin:5px 0 35px;
	text-align:center;
}
.backORcloseBtn{
	text-align:center;
	line-height:100%;
	margin-top:15px;
}
.backORcloseBtn a{
	display:inline-block;
	padding:4px 15px;
	border:1px solid #aaa;
	color:#999;
	border-radius:6px;
	text-decoration:none;
	font-size:12px;
}
.detailUpfile img{
	max-width:100%;
	height:auto;
    margin-top: 20px;
    margin-bottom: 40px;
}
.pNav{
	font-size:11px;	
}
.news-release-wrapper .br_pc {
    display: block;
}
.news-release-wrapper .br_sp {
    display: none;
}
    
@media screen and (max-width: 991px) {
.news-release-wrapper .br_pc {
    display: block;
}
.news-release-wrapper .br_sp {
    display: none;
}
}
@media screen and (max-width: 767px) {
.news-release-wrapper .br_pc {
    display: none;
}
.news-release-wrapper .br_sp {
    display: block;
}
}
@media screen and (max-width: 650px) {
.news-release-wrapper .br_pc {
    display: none;
}
.news-release-wrapper .br_sp {
    display: block;
} 
}
</style>
    
  <link rel="stylesheet" type="text/css" href="../slick/slick.css">
  <link rel="stylesheet" type="text/css" href="../slick/slick-theme.css">
  <style type="text/css">
    * {
      box-sizing: border-box;
    }

    .slider {
        width: 100%;
        margin: 0px auto;
    }

    .slick-slide {
      margin: 0px 0px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      /*opacity: .2;*/
      opacity: .2;
    }
    
    .slick-active {
      /*opacity: .5;*/
      opacity: 1;
    }

    .slick-current {
      opacity: 1;
    }
      
  </style>
    
  <!-- Font Awesome Solid -->
  <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/solid.css" rel="stylesheet" />
    
  <!-- Add the v6 core styles and then select the individual styles you need, like Solid and Brands -->
  <script defer src="../assets/fontawesome/js/fontawesome.js"></script>
  <script defer src="../assets/fontawesome/js/solid.js"></script>
  <script defer src="../assets/fontawesome/js/brands.js"></script>
    
<!--▲▲CSS。既存ページヘの埋め込み時　コピペここまで（head部分に）▲▲-->
  </head>
  <body id="news-release" class="news-release page-template-default page page-id-3">
    <div id="wrapper">

      <header id="header">
          <div class="nav-box">
              <h1 class="logo pc logo-fade" id="header-logo-wrapper-pc">
                  <a href="../index.html"><img src="../assets/images/header-logo-pc.svg" alt="松葉屋茶寮"></a>
              </h1>
              <h1 class="logo sp logo-fade" id="header-logo-wrapper-sp">
                  <a href="../index.html"><img src="../assets/images/header-logo-sp.svg" alt="松葉屋茶寮"></a>
              </h1>
              <div class="menu-box">
                  <input class="hidden-input" id="switch-global" name="switch-global" type="checkbox" value="menu">
                  <label class="btn-menu" id="btn-menu" for="switch-global"></label>
                  <div class="global">
                      <div class="outer-wrapper">
                          <div class="outer">
                              <div class="inner">
                                  <div class="menu-left">
                                      <ul class="menu">
                                          <li>
                                              <a href="../philosophy.html">
                                                  <span class="jp">理念</span><br/>
                                                  <span class="en">Philosophy</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="../matsubaya_saryo.html">
                                                  <span class="jp">松葉屋茶寮</span><br/>
                                                  <span class="en">Matsubaya sary&#x14D;</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="../hakobune_gallery.html">
                                                  <span class="jp">方　舟</span><br/>
                                                  <span class="en">hakobune GALLERY</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="../rokkan_an.html">
                                                  <span class="jp">緑 閑 庵</span><br/>
                                                  <span class="en">ROKKAN AN</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="menu-right">
                                      <ul class="menu">
                                          <li>
                                              <a href="../reservation/index.html">
                                                  <span class="jp">Reservation</span><br/>
                                                  <span class="en">ご予約&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="https://hkbn.jp" target="_blank">
                                                  <span class="jp">hakobune GALLERY</span><br/>
                                                  <span class="en">オンラインショップ&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="https://www.okashiya.co.jp/" target="_blank">
                                                  <span class="jp">OKASHIYA</span><br/>
                                                  <span class="en">オンラインショップ&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></span>
                                              </a><br class="br-pc">
                                              <a href="../store-pickup/index.html">
                                                  <span class="en">ご予約・お取り置き&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></span>
                                              </a><br class="br-pc">
                                              <!--<a href="../store-pickup_WhiteTruffleButterSand/index.html">
                                                  <span class="en">White Truffle Butter Sandご予約&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></span>
                                              </a>--><!--<br class="br-pc">
                                              <a href="../store-pickup_rollcake/index.html">
                                                  <span class="en">ロールケーキご予約・お取り置き&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></span>
                                              </a>-->
                                          </li>
                                          <li>
                                              <a href="https://arwrk.net/recruit/dfhwtyg4a36d23u" target="_blank">
                                                  <span class="jp">Recruit</span><br/>
                                                  <span class="en">採用情報&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i></span>
                                              </a>
                                          </li>
                                          <li class="icons-btn pc">
                                              <a href="../contact.html">
                                                  <i class="fa-regular fa-envelope fa-lg"></i>
                                              </a>
                                              &emsp;
                                              <a href="../access.html">
                                                  <i class="fa-solid fa-location-dot fa-lg"></i>
                                              </a>
                                              <!--&emsp;
                                              <a href="https://arwrk.net/recruit/dfhwtyg4a36d23u" target="_blank">
                                                  <i class="fa-solid fa-user-tie fa-lg"></i>
                                              </a>-->
                                              &emsp;
                                              <a href="https://www.instagram.com/matsubayasaryo/" target="_blank">
                                                  <i class="fa-brands fa-instagram fa-xl"></i>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>
        
      <div id="container">
        <div id="main">
          <!--<div id="page-loading"></div>-->
          <div class="news-release-wrapper"> 
            <div class="inner-wrapper">
              <div class="horizontal-title-wrapper">
                <!--<h2 class="jp">ニュース&amp;トピックス</h2><span class="border"></span>-->
                <h3 class="en">NEWS &amp; TOPICS</h3>
              </div>
                
              <div class="content-wrapper"> 

<!--▼▼埋め込み時はここから以下をコピーして任意の場所に貼り付けてください（html部は自由に編集可）▼▼-->

<?php if(!$copyright){echo $warningMesse;exit;}else{ ?>
                  
<div id="up_ymd"><?php echo h($dataArr['up_ymd']);?></div>
<h2><?php echo h(strip_tags($dataArr['title']));?></h2>

<div id="detail">
<?php
for($i=0;$i<=$maxCommentCount;$i++){
	if(!empty($dataArr['comment'][$i]) || !empty($dataArr['upfile_path'][$i])){
		
		//アップファイル表示用のタグをセット。 画像の場合はimgタグ、その他の場合はファイルにリンクする（タグ部分は自由に変更可）
		$upfileTag = '';//初期化
		if(!empty($dataArr['upfile_path'][$i])){
			if($dataArr['file_type'][$i] == 'img'){
				$upfileTag = '<img src="'.$dataArr['upfile_path'][$i].'?'.uniqid().'" />';//画像の場合のタグ
			}else{
				$linkText = (isset($extensionListText[$dataArr['extension'][$i]])) ? $extensionListText[$dataArr['extension'][$i]] : 'アップファイル（'.$dataArr['extension'][$i].'）';//リンクテキストをセット
				$upfileTag = '<a href="'.$dataArr['upfile_path'][$i].'" target="_blank">'.$linkText.'</a>';//画像以外の場合のタグ
			}
			$upfileTag = '<div class="detailUpfile">'.$upfileTag.'</div>';
		}
?>
<div class="detailText"><?php echo (!empty($dataArr['comment'][$i])) ? $dataArr['comment'][$i] : '';?></div>
<?php echo $upfileTag;?>
<?php 
	}
}
?>
</div><br /><br /><br /><br />

<div class="backORcloseBtn"><?php echo ($config['popupFlag'] == 1) ? '<a href="javascript:window.close()">× 閉じる</a>' : '<a href="javascript:history.back()">&lt;&lt;戻る</a>';//CLOSEボタン、または戻るボタン?></div>
<?php echo $copyright;}//著作権表記削除不可?>

<!--▲▲埋め込み時　コピーここまで▲▲-->
              </div>
            </div>
          </div>
        </div>

        <footer id="footer">
            <div class="footer-wrapper">
                <!--<div class="logo-box">
                    <h2 class="logo-sp"><a href="index.html" id="footer-logo-sp"><img src="assets/images/footer-logo.svg" alt="松葉屋茶寮"></a></h2>
                </div>-->
                <div class="left-box jp">
                    <div class="upper-box">
                        <h2 class="name">松葉屋茶寮</h2>
                        <p class="address"><a class="footer-menu" href="https://maps.app.goo.gl/PSNEC4v3mLckTU6o6" target="_blank">〒107-0062<br>東京都港区南青山5-4-27 Barbizon104 1F</a><br>Business Hour / 10:00AM - 8:00PM</p>
                    </div>
                    <div class="middle-wrapper1">
                        <ul class="menu second">
                            <li>
                                <a class="footer-menu" href="news.php">News &amp; Topics</a>
                            </li>
                            <li>
                                <a class="footer-menu" href="../reservation/index.html">Reservation&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-sm"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="middle-wrapper1">
                        <ul class="menu second">
                            <li>
                                <a class="footer-menu" href="../contact.html">
                                    <i class="fa-regular fa-envelope fa-lg fa-fw"></i>&nbsp;Contact
                                </a>
                            </li>
                            <li>
                                <a class="footer-menu" href="../access.html">
                                    <i class="fa-solid fa-location-dot fa-lg fa-fw"></i>&nbsp;Access
                                </a>
                            </li>
                            <li>
                                <a class="footer-menu" href="https://arwrk.net/recruit/dfhwtyg4a36d23u" target="_blank">
                                    <i class="fa-solid fa-user-tie fa-lg fa-fw"></i>&nbsp;Recruit
                                </a>
                            </li>
                            <li>
                                <a class="footer-menu" href="https://www.instagram.com/matsubayasaryo/" target="_blank">
                                    <i class="fa-brands fa-instagram fa-lg fa-fw"></i>&nbsp;matsubayasaryo
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="middle-wrapper1">
                        <ul class="menu second">
                            <li>
                                <a class="footer-menu" href="https://hkbn.jp" target="_blank">
                                    hakobune GALLERY&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-sm"></i></a>
                            </li>
                            <li>
                                <a class="footer-menu" href="https://www.okashiya.co.jp/" target="_blank">
                                    OKASHIYA&nbsp;<i class="fa-solid fa-arrow-up-right-from-square fa-sm"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="bottom-wrapper2 bottom">
                        <span class="recruit">
                            <a class="footer-menu" href="../privacy-policy.html">Privacy Policy</a>
                        </span>
                    </div>
                    <p class="copyright-sp" id="copyright"><small>&copy;&nbsp;Matsubaya sary&#x14D;</small></p>
                </div>
                <div class="right-box jp">
                    <h2 class="logo">
                        <a href="../index.html" id="footer-logo">
                            <img src="../assets/images/footer-logo.svg" alt="松葉屋茶寮">
                        </a>
                    </h2>
                    <div class="bottom-wrapper">
                        <p id="copyright"><small>&copy;&nbsp;Matsubaya sary&#x14D;</small></p>
                    </div>
                </div>
            </div>
        </footer>
          
      </div>
    </div>

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="../slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    $(document).on('ready', function() {
      //サムネイル有りスライダー//  
        $(".slider").slick({
          autoplay: true,
          arrows: true,
          fade: true,
          asNavFor: ".thumbnail",
        });
        $(".thumbnail").slick({
          slidesToShow: 5,
          asNavFor: ".slider",
          focusOnSelect: true,
        });
        
        $('.regular').slick({
          centerMode: true,
          centerPadding: '60px',
          dots: true,
          arrows: true,
          slidesToShow: 3,
          responsive: [
              {
              breakpoint: 991,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
              }
            }
          ]
        });
        
        $('.single').slick({
          centerMode: true,
          centerPadding: '60px',
          dots: true,
          arrows: true,
          slidesToShow: 1,
          responsive: [
              {
              breakpoint: 991,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
              }
            },
            {
              breakpoint: 768,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
              }
            }
          ]
        });
        
    }); 
  </script>

        <script>
            // 修正されたコード: 動画再生イベントのハンドリング
            document.addEventListener('DOMContentLoaded', function() {
                const videos = document.querySelectorAll('video.myVideo');
                videos.forEach(video => {
                    video.addEventListener('play', function() {
                        videos.forEach(otherVideo => {
                            if (otherVideo !== video) {
                                otherVideo.pause();
                            }
                        });
                    });
                });
            });
        </script>
    
    <script src="../assets/js/main.js"></script>
    
  </body>

</html>