<?php
	if(isset($_REQUEST['pqh'])) {
		$pqh = killInjection($_REQUEST['pqh']);
		$pqh = rtrim($pqh,"/");
		$mang = explode("/",$pqh);
		switch($mang[0]) {
			case "teacher":
                include("module/teacher.php");
				break;
			case "children":
                include("module/children.php");
				break;
            case "system-log":
                include("module/syslog.php");
				break;
            case "lessons":
                include("module/lessons.php");
                break;
            case "classes":
                include("module/classes.php");
                break;
		}
		
	}
?>