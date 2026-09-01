<?php //▼▼ 既存ページヘ埋め込み時はまるっとコピペ下さい （この行も含みページ最上部に）※.phpでかつUTF-8のページのみ可▼▼
//※逆にこのページに対して既存のページのhtmlを記述する形でももちろんOKです。
//----------------------------------------------------------------------
// ページング付き一覧ページ（投稿がどんなに増えても自動でページングを調整します）
// 設定ファイルの読み込みとページ独自設定
//----------------------------------------------------------------------
include_once("./pkobo_news/admin/include/config.php");//（必要に応じてパスは適宜変更下さい）
$img_updir = './pkobo_news/upload';//画像保存パス（必要に応じてパスは適宜変更下さい）

/* ▽オプション設定▽ */
//※1ページあたりの表示件数などは設定ファイルで指定できます（デフォルトは20件）

//本文の抜粋を表示するかどうか（0=しない、1=する）
$commentDsp = 1;

//本文を抜粋表示する場合の表示文字数 （単位はバイト。全角文字は「2バイト」で1文字となります。また末尾の文字「...」も含みます）
//※htmlタグは削除されます「0」にすれば全文をhtmlもそのままで表示します。（レイアウトに問題が出る可能性があるのでオススメしません）
$commentNum = 200;

//サムネイルを表示するか（0=しない、1=する）※アップファイルの1枚目が画像の場合のみ有効
$dspThumbNail = 0;

//表示するカテゴリを指定（指定なし（空）の場合は全件表示 ※デフォルト）
//このページで特定カテゴリのみ表示したい場合、0からの番号を指定下さい。 （1番目が0，2番目が1になるので注意）
//要するに複数のカテゴリがある場合でそれぞれ別々のファイルで表示したい場合用です
//このファイルを複製すればOKです（カテゴリごとにデザインを変えたい場合など）
//例　$category = '1'; ※この場合カテゴリ番号「1」（設定ファイルでの2番目）の記事のみが表示されます
$category = '';
//またはURLのパラメータでも指定可能です。番号ルールは↑と同じです。例 news.php?cat=0 や news.php?cat=1 とするだけです
//1ファイルでパラメータを変えるだけでそれぞれのカテゴリを表示できるので便利です。（全カテゴリでデザインは共通で良い場合）


//----------------------------------------------------------------------
// 設定ファイルの読み込みとページ独自設定
//----------------------------------------------------------------------
$getFormatDataArr = getLines2DspData($file_path,$img_updir,$config,'',$category);//（変更不可）
$pagerRes = pager_dsp($getFormatDataArr,$pagelength,$pagerDispLength,$config['encodingType']);//ページャー生成（変更不可）
$pagerDsp = (count($getFormatDataArr) > $pagelength) ? '<p class="pager">'.$pagerRes['dsp'].'</p>' : '';//ページャー用タグセット（変更不可）

//▲▲ コピペここまで ▲▲（この行も含む）?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="ja">
  
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="../assets/images/favicon/favicon.ico">
    <link rel="manifest" href="../assets/images/favicon/site.png">
    <link rel="mask-icon" href="../assets/images/favicon/safari-pinned-tab.png" color="#000000">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://unpkg.com/imagesloaded%405.0.0/imagesloaded.pkgd.min.js"></script>
    
  <!-- SEO --> 
  <title>最新ニュース｜松葉屋茶寮・方舟GALLERY</title>
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
  <!-- SEO END -->
    
<!--▼▼CSSとポップアップ用JS。既存ページ埋め込み時　要コピペ（head部分）▼▼-->
<style type="text/css">
/* CSSは必要最低限しか指定してませんのでお好みで（もちろん外部化OK） */

/* clearfix */
.clearfix:after { content:"."; display:block; clear:both; height:0; visibility:hidden; }
.clearfix { display:inline-block; }

/* for macIE \*/
* html .clearfix { height:1%; }
.clearfix { display:block; }

ul#newsList{
	margin:0 0 15px;
	padding:0;
}
ul#newsList li{
	color:#333333 !important;
	margin:0;
	padding:30px 0;
	margin-bottom:8px;
	border-bottom:1px dotted #333;
	line-height:120%;
	list-style-type:none;
}
#up_ymd{
	text-align:left;
	font-size: 0.85em;
	margin:5px 10px;
    color:#999 !important;
}
.catName{
	display:inline-block;
	padding:3px 8px;
	border:1px solid #999;
	border-radius:5px;
	color:#999;
	line-height:100%;
	margin:0 0px 10px 0px;
    font-size: 0.85em;
}
.newMark{
	display:inline-block;
	border:1px solid #D90003;
	padding:4px 8px;
	line-height:100%;
	background:none;
	color:#D90003;
	border-radius:5px;
	margin:0 10px 10px 0;
    font-size: 0.85em;
}
.comment{
	display:block;
	padding:3px 0;
	float:left;
	width:100%;/* 本文部分の幅。ここは特に設置ページ合わせて変更下さい */
}
.thumbNailWrap{
	display:block;
	width:110px;
	float:left;
	height:80px;
}

.title {
	font-weight: 400;
	margin-top: 15px !important;
}
	
	
.title a {
  text-decoration: none !important;
  outline: none !important;
  color: #ffffff;
}
	
.title a:hover {
  text-decoration: underline !important;
  color: #ffffff;
}
    
    
.pager {
	font-weight: 400;
	margin-top: 30px !important;
    margin-right: 10px;
}
	
	
.pager a {
  text-decoration: none !important;
  outline: none !important;
  color: #999 !important;
  padding: 10px;
}

.pager a:hover {
  text-decoration: underline !important;
  color: #999 !important;
}

</style>

<script type="text/javascript">
<!--
function openwin(url) {//PC用ポップアップ。ウインドウの幅、高さなど自由に編集できます（ポップアップで開く場合のみ）
 wn = window.open(url, 'win','width=680,height=550,status=no,location=no,scrollbars=yes,directories=no,menubar=no,resizable=no,toolbar=no');wn.focus();
}
-->
</script>
    
  <!-- Font Awesome Solid -->
  <link href="../assets/fontawesome/css/fontawesome.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/brands.css" rel="stylesheet" />
  <link href="../assets/fontawesome/css/solid.css" rel="stylesheet" />
    
  <!-- Add the v6 core styles and then select the individual styles you need, like Solid and Brands -->
  <script defer src="../assets/fontawesome/js/fontawesome.js"></script>
  <script defer src="../assets/fontawesome/js/solid.js"></script>
  <script defer src="../assets/fontawesome/js/brands.js"></script>
    
<!--▲▲CSSとポップアップ用JS。既存ページ埋め込み時　要コピペ（head部分）▲▲-->
<meta name="google-site-verification" content="yIRIqgwVncJjz8o8DHgM3Ulkb6lB-pn_-GxVb5n5Ngc" />
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
                <h3 class="en">News &amp; Topics</h3>
              </div>
                
              <div class="content-wrapper"> 

<!--▼▼既存ページ埋め込み時はここから以下をコピーして任意の場所に貼り付けてください（html部は自由に編集可。不要なものは削除可です）▼▼-->
<div id="newsWrap">
<!--<?php echo $pagerDsp;//ページャー表示?>-->

<ul id="newsList">

<?php if(!$copyright){echo $warningMesse;exit;}else{for($i = $pagerRes['index']; ($i-$pagerRes['index']) < $pagelength; $i++){if(!empty($getFormatDataArr[$i])){$data=$getFormatDataArr[$i];?>

<li id="postID_<?php echo $data['id'];?>" class="cat-<?php echo $data['categoryNum'];?> clearfix">
<span class="up_ymd"><?php echo $data['up_ymd'];//日付表示?></span>
<?php if(!empty($data['category'])) echo '<span class="catName">'.$data['category'].'</span>';//カテゴリ名表示?>
<?php if($data['newmark'] == 1) echo ' <span class="newMark">NEW</span>';//New表示。タグ変更可（表示期間は設定ファイルで）?>
<br>
<span class="title"><?php echo $data['title'];//タイトル表示?></span>


<!--　サムネイルと本文表示（不要な場合削除OK）-->
<!--　<?php if(dspThumb($data) || ($commentDsp == 1 && !empty($data['comment'][0]))){ ?> 
<div class="clearfix">
<span class="thumbNailWrap"><?php echo (dspThumb($data)) ? dspThumb($data,100) : '　';//サムネイル表示（数字は表示幅）サムネイルが無い場合には空白を入れておく（NoPhotoなどのimg画像でもOKです）?></span>
<span class="comment"><?php if($commentDsp == 1) echo str2Format($data['comment'],$commentNum,$config['encodingType']);//本文抜粋表示。表示する設定の場合のみ?></span>
</div>
<?php } ?>-->
<!--　/サムネイルと本文表示（不要な場合削除OK）-->

</li>

<?php } } ?>

</ul>

<?php echo $pagerDsp;//ページャー表示?>
</div>
<?php echo $copyright;}//著作権表記削除不可?>

<!--▲▲既存ページ埋め込み時　コピーここまで▲▲-->
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
    <script src="../assets/js/main.js"></script>

  </body>

</html>