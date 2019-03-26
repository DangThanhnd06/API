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
    <!-- remove this if you use Modernizr -->
	<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>

<body>
        <!-- start #wrapper -->
        <div id="wrapper">
            <div class="ngonngu">
                <a href="<?=URL.'language.php?set=en'?>"><img src="img/flag_en.png" alt="English" style="margin-right: 10px;width:30px;" /></a>
                <a href="<?=URL.'language.php?set=vn'?>"><img src="img/flag_vi.png" alt="Vietnam" style="width: 30px;" /></a>
            </div>
            <header>
                <nav>
                    <ul>
                        <li<?php if($mod=='teacher' || !isset($_REQUEST['pqh'])) echo ' class="act"'; ?>><a href="teacher/"><?=_teacher?></a></li>
                        <li<?php if($mod=='children') echo ' class="act"'; ?>><a href="children/"><?=_children?></a></li>
                        <li<?php if($mod=='lessons') echo ' class="act"'; ?>><a href="lessons/"><?=_lesson?></a></li>
                        <li<?php if($mod=='classes') echo ' class="act"'; ?>><a href="classes/"><?=_class?></a></li>
                        <li class="lli<?php if($mod=='system-log') echo ' act'; ?>"><a href="system-log/"><?=_syslog?></a></li>
                    </ul>
                </nav>
            </header>