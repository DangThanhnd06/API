<?php
if(!session_id()) session_start();
error_reporting(E_ALL & ~E_NOTICE);
if(!isset($_SESSION["session_message"])){
	$_SESSION["session_message"] = "";
}	
if(isset($_GET['page']))
$page = $_GET['page'];
if (isset($_REQUEST['act']) && $_REQUEST['act']=='logout') unset($_SESSION['islogin']);
if (!isset($_SESSION['islogin']))
{
	header("Location: login.php");
}
else
{
require("../require_inc.php");
$ngayhientai = date("d/m/Y");
if($_SESSION['nhomq']==2) {
	$qlcm = "#";
	$qlcmtt = "#";
	$qlhtml = "#";
	$qllh = "#";
	$qlch = "#";
	$gt = "#";
	$hd = "#";
	$qlyh = "#";
	$qlsk = "#";
	$kxd = "Không đủ quyền";
} else {
	$qlcm = "../ctrl_panel/?act=congty";
	$qlch = "../ctrl_panel/?act=configuration";
	$qlcmtt = "../ctrl_panel/?act=member";
	$qlhtml = "../ctrl_panel/?act=html";
	$gt = "../ctrl_panel/?act=gioithieu";
	$hd = "../ctrl_panel/?act=huongdan";
	$qlyh = "../ctrl_panel/?act=yahoo";
	$qlsk = "../ctrl_panel/?act=skype";
	$kxd = "";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hệ thống quản trị website</title>
<link href="../img/icon.png" rel="icon" />
<link rel="stylesheet" href="style.css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="jquery.datetimepicker.css" /> 
<script type="text/javascript" src="jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src='jquery.datetimepicker.js'></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "xnd_vn,xnd_en,xnd_cn,noidung_vn,noidung_en,noidung_cn,hanhviht,hanhvimoi,lieuphap,nhanxetgv",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
	height:"400px",
    width:"850px",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script> 
</head>

<body>
	<div id="top">
    	<div class="ndung">
        	<p class="hthong">Hệ thống quản trị website</p>
            <p class="cmm">Hệ thống quản trị website</p>
            <p class="tqcms">cms</p>
            <p class="vs">V5.02-10012015</p>
            <p class="clr"></p>
        </div>
    </div>
    <div id="menu">
    	<div class="ndung">
        	<p class="icon_home"><a href="<?php echo URL?>" title="Quay về trang chủ"><img src="images/icon_home.png" width="18" /></a></p>
            
            <p class="icon"><img src="images/cauhinh.jpeg" width="18" height="18" /></p>
            <p class="nd"><a href="<?php echo $qlch?>" title="<?php echo $kxd?>">Cấu hình website</a></p>
            <p class="icon"><img src="images/qlchung.jpeg" width="18" height="18" /></p>
            <p class="nd"><a href="<?php echo $qlhtml?>" title="<?php echo $kxd?>">Quản lý html</a></p>
            <p class="icon"><img src="images/user.jpeg" width="18" height="18" /></p>
            <p class="nd"><a href="../ctrl_panel/?act=user">Quản lý User Admin</a></p>
            <p class="icon"><img src="images/exit.jpeg" width="18" height="18" /></p>
            <p class="nd"><a href="../ctrl_panel/?act=logout">Thoát</a></p>
            <p class="user_icon"></p>
            <p class="user"><?php echo $_SESSION['tenuser']?></p>
            <p class="clr"></p>
        </div>
    </div>
    <div id="ngaythang">
    	<div class="ngay">
            <div id="menuuu">
                <div id="navigation">
            	<ul id="nav">
                    <li class="chacs"><a class="ches" href="#">Quản lý giới thiệu</a>
                        <ul>
                            <li><a href="../ctrl_panel/?act=update_thongtin&id=1">Giới thiệu</a></li>
                            <li><a href="../ctrl_panel/?act=update_thongtin&id=2">Lịch sử hình thành</a></li>
                            <li><a href="../ctrl_panel/?act=update_thongtin&id=3">Tầm nhìn, sứ mệnh, giá trị, mục tiêu</a></li>
                            <li><a href="../ctrl_panel/?act=update_thongtin&id=4">Đội ngũ giáo viên</a></li>
                            <li><a href="../ctrl_panel/?act=update_thongtin&id=5">Cơ sở vật chất</a></li>
                        </ul>
                    </li>
                    <li class="chacs"><a class="ches" href="#">Quản lý nội dung</a>
                        <ul>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=1">Dịch vụ</a></li>
                            <li><a href="#">Hoạt động</a>
                                <ul>
                                    <li><a href="../ctrl_panel/?act=tintuc&tt_id=2">Tin hoạt động trung tâm</a></li>
                                    <li><a href="../ctrl_panel/?act=tintuc&tt_id=8">Chương trình học</a></li>
                                    <li><a href="../ctrl_panel/?act=tintuc&tt_id=9">Hình ảnh</a></li>
                                    <li><a href="../ctrl_panel/?act=tintuc&tt_id=10">Clip liên kết youtube</a></li>
                                </ul>
                            </li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=3">Câu chuyện</a></li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=4">Góc chuyên gia</a></li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=5">Quy định - chính sách</a></li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=6">Ưu đãi</a></li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=7">Cam kết</a></li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=11">Thông tin tư vấn</a></li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=12">Chia sẻ kinh nghiệm</a></li>
                            <li><a href="../ctrl_panel/?act=tintuc&tt_id=13">Câu hỏi của cha mẹ</a></li>
                        </ul>
                    </li>
                    <li class="chacs"><a class="ches" href="../ctrl_panel/?act=doitac">Quản lý đối tác</a></li>
                    <li class="chacs"><a class="ches" href="../ctrl_panel/?act=hocsinh">Quản lý học sinh</a></li>
                    <li class="chacs"><a class="ches" href="../ctrl_panel/?act=giaovien">Quản lý giáo viên</a></li>
                    
                </ul>
            </div>
            </div>
            <p class="nd">Hôm nay, ngày: <?php echo $ngayhientai?></p>
            <p class="clr"></p>
        </div>
    </div>
    <div id="wrapper">
        <div id="right">
           
            <div class="ndung">
            <?php
				if(!isset($_REQUEST['act'])) {
			?>
                 <div class="welcome">
                	<p style="text-transform:uppercase">Chào mừng <?php echo $_SESSION['tenuser']?></p>
                    <p>Chúc bạn một ngày làm việc vui vẻ và hiệu quả!</p>
                    
                </div>
            <?php } else include("right.php"); 
			
			?>
            </div>            
        </div>
        <div class="clr"></div>
    </div>
    <div id="footer">
    	<div class="ndung">
        	<div class="nd">
            	<p class="icon"></p>
                <p class="copyright">
                &copy; Management system website. Developed by <a href="http://www.dragontreesvn.com" target="_blank">Dragontreesvn</a> <?php echo date("Y"); ?>. &reg; All rights reserved.
                </p>
                <p class="clr"></p>
            </div>
        </div>
    </div>
</body>
</html>
<?php mysql_close(); } ?>