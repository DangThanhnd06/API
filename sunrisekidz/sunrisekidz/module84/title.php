<?php
	if(isset($_REQUEST['pqh'])) {
		$pqh = $_REQUEST['pqh'];
		$pqh = rtrim($pqh,"/");
		$mang = explode("/",$pqh);
		switch($mang[0]) {
            case "teacher":
                $title = _teacher;
                break;
            case "children":
                $title = _children;
                break;
            case "system-log":
                $title = _syslog;
                break;
            case "lessons":
                $title = _lesson;
                break;
            case "classes":
                $title = _class;
                break;
			default:
				$title = _titleweb;
				break;
		}
		
	}
	else {
		$title = _titleweb;
	}
	echo $title;
?>