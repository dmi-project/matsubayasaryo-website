<?php //▼▼ 既存ページヘ埋め込み時はまるっとコピペ下さい （この行も含みページ最上部に）※.phpでかつUTF-8のページのみ可▼▼
//※このページに対して既存のページのhtmlを記述する形でももちろんOKです。
//----------------------------------------------------------------------
// トップページ表示用ページ
// 設定ファイルの読み込みとページ独自設定
//----------------------------------------------------------------------
include_once("./pkobo_news/admin/include/config.php");//（必要に応じてパスは適宜変更下さい）
$img_updir = './pkobo_news/upload';//画像保存パス（必要に応じてパスは適宜変更下さい）

@rssGen();//RSS配信用（このファイルのURLに「?feed=rss2」とパラメータを追加すればRSSフィードが表示されます）※不要な場合削除OK

/* ▽オプション設定▽ */

//表示件数
$config['dspNum'] = 10;

//本文の抜粋を表示するかどうか（0=しない、1=する）
$commentDsp = 0;

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
//またはURLのパラメータでも指定可能です。番号ルールは↑と同じです。例　URLに ?cat=0 や ?cat=1 を追加するだけです
//1ファイルでパラメータを変えるだけでそれぞれのカテゴリを表示できるので便利です。（全カテゴリでデザインは共通で良い場合）

//----------------------------------------------------------------------
// 設定ファイルの読み込みとページ独自設定
//----------------------------------------------------------------------
//▲▲ コピペここまで ▲▲（この行も含む）?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta name="robots" content="noindex">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>トップページの新着情報、お知らせ</title>
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link rel="stylesheet" href="../assets/css/main.css">
<script src="https://unpkg.com/imagesloaded%405.0.0/imagesloaded.pkgd.min.js"></script>

<!--▼▼CSSとポップアップ用JS。トップページ埋め込み時　要コピペ（head部分）▼▼-->
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
</style>

<script type="text/javascript">
<!--
function openwin(url) {//詳細ページ用ポップアップ。ウインドウの幅、高さなど自由に編集できます（ポップアップで開く場合のみコピペ下さい）
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
    
<!--▲▲CSSとポップアップ用JS。トップページ埋め込み時　要コピペ（head部分）▲▲-->
  </head>
<body>

<!--▼▼トップページ埋め込み時はここから以下をコピーして任意の場所に貼り付けてください（html部は編集可）▼▼-->
<div id="newsWrap">
<ul id="newsList">

<?php if(!$copyright){echo $warningMesse;exit;}else{$getFormatDataArr = getLines2DspData($file_path,$img_updir,$config,'',$category);foreach($getFormatDataArr as $key => $data){?>

<li id="postID_<?php echo $data['id'];?>" class="cat-<?php echo $data['categoryNum'];?> clearfix">
<span class="up_ymd"><?php echo $data['up_ymd'];//日付表示?></span>
<?php if(!empty($data['category'])) echo '<span class="catName">'.$data['category'].'</span>';//カテゴリ名表示?>
<?php if($data['newmark'] == 1) echo ' <span class="newMark">NEW</span>';//New表示。タグ変更可（表示期間は設定ファイルで）?><br class="br_sp" />
<span class="title"><?php echo $data['title'];//タイトル表示?></span>
<!--　サムネイルと本文表示（不要な場合削除OK）-->
<?php if(dspThumb($data) || ($commentDsp == 1 && !empty($data['comment'][0]))){ ?> 
<div class="clearfix">
<span class="comment"><?php if($commentDsp == 1) echo str2Format($data['comment'],$commentNum,$config['encodingType']);//本文抜粋表示。表示する設定の場合のみ?></span>
<span class="thumbNailWrap"><?php echo (dspThumb($data)) ? dspThumb($data,100) : '　';//サムネイル表示（数字は表示幅）サムネイルが無い場合には空白を入れておく（NoPhotoなどのimg画像でもOKです）?></span>

</div>
<?php } ?>
<!--　/サムネイルと本文表示（不要な場合削除OK）-->

</li>

<?php } ?>
</ul>
</div>
<?php echo $copyright;}//著作権表記削除不可?>

<!--▲▲トップページ埋め込み時　コピーここまで▲▲-->

</body>
</html>