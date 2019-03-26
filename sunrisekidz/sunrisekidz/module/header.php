<?php
    include("require_inc.php");
    if(isset($_REQUEST['pqh'])) {
		$pqh = $_REQUEST['pqh'];
		$pqh = explode("/",$pqh);
		$mod = $pqh[0];
        $mod1 = $pqh[1];
        $mod2 = $pqh[2];
        $mod3 = $pqh[3];
	}
    if($mod=='logout') {
        unset($_SESSION['idadmin']);
        unset($_SESSION['uad']);
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="quochoai" />
    <base href="<?=URL?>" />
	<title><?php include("module/title.php"); ?></title>
    <meta name="description" content="Sunrise Kidz" />
    <meta name="keywords" content="Sunrise Kidz" />
    <link href="img/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="css/style.css" media="screen" />
    <link rel="stylesheet" href="css/jquery.scrollbar.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script type="text/javascript" src="js/jquery-1.8.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollbar.js"></script>
    <link rel="stylesheet" href="css/stylebpop.css" />
    <script type="text/javascript" src="js/jquery.bpopup.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/default.js"></script>
    <link rel="stylesheet" href="js/jquery.datetimepicker.css" />
    <script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea#noidung_vn,textarea#noidung_en,textarea#noidung_vnn,textarea#noidung_enn",
    theme: "modern",
    width: 970,
    height: 400,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
   ],
   image_advtab: true, 
   //content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons responsivefilemanager", 
   external_filemanager_path:"/filemanager/",
   filemanager_title:"Responsive Filemanager" ,
   external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 });
</script>
    <!-- remove this if you use Modernizr -->
	<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>

<body>
        <!-- start #wrapper -->
        <div id="wrapper">
            <?php
                if(isset($_SESSION['idadmin'])) {
                    if($_SESSION['quyenper'] == '4') $cladminn = 'changpassteach';
                    else $cladminn = 'changepass';
            ?>
                <div class="user">
                    <?=_welcome.': '.$_SESSION['uad']?> |<?php if($_SESSION['quyenper'] == 1) { ?> <a class="quanlytaikhoan" style="cursor: pointer;"><?=_quanlyuser?></a> |<?php } ?> <a class="<?=$cladminn?>" rel="<?=$_SESSION['idadmin']?>" style="cursor: pointer;"><?=_doimatkhau?></a> | <a href="logout" title="<?=_logout?>"><?=_logout?></a>
                </div>
            <?php
                }
            ?>
            <div class="ngonngu">
                <a href="<?=URL.'language.php?set=en'?>"><img src="img/flag_en.png" alt="English" style="margin-right: 10px;width:30px;" /></a>
                <a href="<?=URL.'language.php?set=vn'?>"><img src="img/flag_vi.png" alt="Vietnam" style="width: 30px;" /></a>
            </div>
            <?php
                if(isset($_SESSION['idadmin'])) {
            ?>
            <header>
                <nav>
                    <ul>
                    <?php if($_SESSION['quyenper'] == 1){ ?>
                        <li<?php if($mod=='teacher' || !isset($_REQUEST['pqh'])) echo ' class="act"'; ?>><a href="teacher/"><?=_teacher?></a></li>
                        <li<?php if($mod=='children') echo ' class="act"'; ?>><a href="children/"><?=_children?></a></li>
                        <li<?php if($mod=='lessons') echo ' class="act"'; ?>><a href="lessons/"><?=_lesson?></a></li>
                        <li<?php if($mod=='classes') echo ' class="act"'; ?>><a href="classes/"><?=_class?></a></li>
                        <li<?php if($mod=='newsletter') echo ' class="act"'; ?>><a href="newsletter/"><?=_newsletter?></a></li>
                        <li class="lli<?php if($mod=='system-log') echo ' act'; ?>"><a href="system-log/"><?=_syslog?></a></li>
                    <?php } elseif($_SESSION['quyenper'] == 2){ ?>
                        <li<?php if($mod=='teacher' || !isset($_REQUEST['pqh'])) echo ' class="act"'; ?>><a href="teacher/"><?=_teacher?></a></li>
                        <li<?php if($mod=='children') echo ' class="act"'; ?>><a href="children/"><?=_children?></a></li>
                        <li<?php if($mod=='newsletter') echo ' class="act"'; ?>><a href="newsletter/"><?=_newsletter?></a></li>
                    <?php } elseif($_SESSION['quyenper'] == 3){ ?>
                        <li<?php if($mod=='lessons') echo ' class="act"'; ?>><a href="lessons/"><?=_lesson?></a></li>
                        <li<?php if($mod=='classes') echo ' class="act"'; ?>><a href="classes/"><?=_class?></a></li>
                    <?php } else { ?>
                        <li<?php if($mod=='classes') echo ' class="act"'; ?>><a href="classes/"><?=_class?></a></li>
                    <?php } ?>
                    </ul>
                </nav>
            </header>
            <?php } ?>