<?php
	error_reporting(1);
    include("../require_inc.php");
    @$action = $_GET['action'];

switch ($action) {
	case "login":
        /* Source code login with user: email & pass*/       
		 @$email = $_GET['email'];
        @$password = mahoa(trim($_GET['password']));
        $query_login_data = mysql_query("SELECT * FROM children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
        $data_array = array();
		$data_array = mysql_fetch_assoc($query_login_data);
		$date_login = date('d/m/Y H:i:s');
		if ($data_array) {
            $data_array['result']=1;   
			
			//ghi nhận lại log đăng nhập thành công
			$query_login_log = mysql_query("INSERT INTO log(id, date, accountname, actiondetail, fromm, too, forr) VALUES (NULL,'$date_login',0,42,'','$email',0)");			
			if($data_array['children_id']=="")
			{
				//trường hợp kiểm tra ko có thông tin của học sinh
				$query_login_log = mysql_query("INSERT INTO log(id, date, accountname, actiondetail, fromm, too, forr) VALUES (NULL,'$date_login',0,43,'','$email',0)");		
			}
			else
			{
				//trường hợp kiểm tra ko có thông tin của phụ huynh
				$query_login_log = mysql_query("INSERT INTO log(id, date, accountname, actiondetail, fromm, too, forr) VALUES (NULL,'$date_login',0,44,'','$email',0)");		
			}
			         
        } else {
            $data_array['result']=0; 
			    
			//ghi nhận lại log đăng nhập không thành công 
			//kiểm tra xem sai tên đăng nhập hay sai mật khẩu
			$query_login_check = mysql_query("SELECT * FROM children WHERE ((father_email='$email') or (mother_email='$email')) and hide='1'");
			$data_array2 = array();
			$data_array2 = mysql_fetch_assoc($query_login_check);
			
			if ($data_array2) {
				$query_login_log = mysql_query("INSERT INTO log(id, date, accountname, actiondetail, fromm, too, forr) VALUES (NULL,'$date_login',0,41,'','$email',0)");		
			}
			else{
				$query_login_log = mysql_query("INSERT INTO log(id, date, accountname, actiondetail, fromm, too, forr) VALUES (NULL,'$date_login',0,40,'','$email',0)");		
				}	      
        }
		
		
		echo json_encode($data_array);
        break;
		
		case "changepass":
        /* Source code Insert data */
        @$email = $_GET['email'];       
        @$password = mahoa(trim($_GET['password']));
        $query_insert_data = mysql_query("UPDATE children SET password_f='$password',password_m='$password', change_pass='1' WHERE (father_email='$email') or (mother_email='$email')");
        $data_array = array();
		if ($query_insert_data) {
            $data_array['result']=1;            
        } else {
            $data_array['result']=0;            
        }
		echo json_encode($data_array);
        break;
		
		case "getallchild":
        /* Source code get all info driver */
		@$email = $_GET['id'];
		@$password = mahoa(trim($_GET['pass']));
        $query_child_all = mysql_query("SELECT * FROM children Where ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'") 
		or die(mysql_error());
		$data_array = array();
        while ($data = mysql_fetch_assoc($query_child_all)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);
        break;    
		
		
		case "getteacher":
        /* Source code get all info driver */
		@$id = $_GET['id'];
        $query_teacher_all = mysql_query("SELECT * FROM teacher Where id=$id and hide='1'") 
		or die(mysql_error());
		$data_array = array();
        while ($data = mysql_fetch_assoc($query_teacher_all)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);
        break;   
		
		case "getnumberchild":
        /* Source code get all info driver */
		@$email = $_GET['id'];		
		@$password = mahoa(trim($_GET['pass']));
        $query_child_all = mysql_query("SELECT count(id) as number FROM children Where ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'") or die(mysql_error());
        $data_array = array();
        $data_array = mysql_fetch_assoc($query_child_all);            
        echo json_encode($data_array);
        break;    
		
		//Lay mon hoc cho 1 be
		case "getObject":
        /* Source code get all info driver */
		@$class = $_GET['class'];
		@$year = $_GET['year'];
		//@$month = $_GET['month'];
		// $query_child_all = mysql_query("Select distinct name_vn,name_en,kq.id from (SELECT mh.id as lesson, pr.* FROM 
//(monhoc mh inner join practise pr on pr.id=mh.pr_id) where pr.clg='$class') kq inner join lessons on kq.lesson=lessons.lesson_id where hide=1 and year='$year' and month='$month'") 
        $query_child_all = mysql_query("Select distinct name_vn,name_en,kq.id from (SELECT mh.id as lesson, pr.* FROM 
(monhoc mh inner join practise pr on pr.id=mh.pr_id) where pr.clg='$class') kq inner join lessons on kq.lesson=lessons.lesson_id where hide=1 and year='$year'") 
		or die(mysql_error());
		$data_array = array();
        while ($data = mysql_fetch_assoc($query_child_all)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);
        break;  
	case "getMark":
        /* Source code get all info driver */
		@$id = $_GET['id'];
		@$practice = $_GET['practice'];
		@$year = $_GET['year'];
		@$month = $_GET['month'];
		//@$week = $_GET['week'];
		//$query_child_all = mysql_query("SELECT * FROM (SELECT m.*, mh.lesson_id,detail_vn,detail_en FROM mark m inner join lessons mh on mh.id=m.detail_id where m.week='$week' and m.month='$month' and m.year='$year' and practice='$practice' and child_id='$id') kq inner join monhoc mon on mon.id=kq.lesson_id")
        $query_child_all = mysql_query("SELECT *, CONCAT(name_en,detail_en) as chitiet FROM (SELECT m.*, mh.lesson_id,detail_vn,detail_en FROM mark m inner join lessons mh on mh.id=m.detail_id where m.month='$month' and m.year='$year' and practice='$practice' and child_id='$id') kq inner join monhoc mon on mon.id=kq.lesson_id")
		 or die(mysql_error());
		$data_array = array();
        while ($data = mysql_fetch_assoc($query_child_all)) {
            $data_array[] = $data;
        }
		
		$query_mark_none = mysql_query("select *, CONCAT(name_en,detail_en) as chitiet from lessons ls inner join monhoc mh on ls.lesson_id=mh.id where ls.month='$month' and ls.year='$year' and mh.pr_id='$practice'")
		 or die(mysql_error());
		 while ($data = mysql_fetch_assoc($query_mark_none)) {
			 
			 
			 //echo " ====> chi tiet " . $data['chitiet'];
            $data_array[] = $data;
        }
        echo json_encode($data_array);
        break;  
				
		case "getComment":
        /* Source code get all info driver */
		@$id = $_GET['id'];
		@$practice = $_GET['practice'];
		@$year = $_GET['year'];
		@$month = $_GET['month'];		
        $query_child_all = mysql_query("SELECT * FROM comment where month='$month' and year='$year' and practice='$practice'  AND approve =  '1' and child_id='$id'") 
		 or die(mysql_error());
		$data_array = array();
        while ($data = mysql_fetch_assoc($query_child_all)) {
            $data_array[] = $data;
        }
        echo json_encode($data_array);
        break;  
		
		
		case "GETALL":
        @$email = $_GET['email']; //email cha hoặc mẹ
        @$password = mahoa(trim($_GET['password']));		
		@$year = $_GET['year'];//năm hiện tại		
		@$month = $_GET['month'];//tháng
		
		$ktra=0;
		
		$query_login_data = mysql_query("SELECT * FROM 	children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
        $data_array = array();
		$data_array_json = array();
		$data_array['parent'] = mysql_fetch_assoc($query_login_data);
		if ($data_array) {           
			$ktra=1;       
        } else {            
			$ktra=0;            
        }		
		if($ktra==1)
		{
			//echo 'so phan tu ' . count($data_array);
			//dang nhap thanh cong.
			//duyet qua cac be cua nguoi dung nay
			
			//echo ' --------  ptu: ' .$data_array['id'];			
			
			$query_login_data1 = mysql_query("SELECT * FROM children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
	
			while ($data = mysql_fetch_assoc($query_login_data1)) {
				//cho moi thong tin be la 1 mang 1 chieu nho 
			//voi object la child
			//duyet tung child tim mon hoc theo ngay thang
			//lay het cac mon hoc va cac practice, detail, mark, comment
			
			//lay cac mon hoc
				@$class=$data['class_gr'];				
				$query_child_all = mysql_query("Select distinct name_vn,name_en,kq.id from (SELECT mh.id as lesson, pr.* FROM (monhoc mh inner join practise pr on pr.id=mh.pr_id) where pr.clg='$class') kq inner join lessons on kq.lesson=lessons.lesson_id where hide=1 and year='$year'") 
				or die(mysql_error());
				$data_array = array();
				while ($data1 = mysql_fetch_assoc($query_child_all)) {
										
					$data['Object'][] = $data1;
				}			
				
			//lay diem
			@$id = $data['id'];
						
			$query_child_all = mysql_query("SELECT *, CONCAT(name_en,detail_en) as chitiet FROM (SELECT m.*, mh.lesson_id,detail_vn,detail_en FROM mark m inner join lessons mh on mh.id=m.detail_id where m.year='$year' and child_id='$id') kq inner join monhoc mon on mon.id=kq.lesson_id")
			 or die(mysql_error());
			$data3 = array();
			while ($data3 = mysql_fetch_assoc($query_child_all)) {
				$data['Mark'][] = $data3;
			}
			
			$query_mark_none = mysql_query("select *, CONCAT(name_en,detail_en) as chitiet from lessons ls inner join monhoc mh on ls.lesson_id=mh.id where ls.year='$year'")
			 or die(mysql_error());
			 while ($data2 = mysql_fetch_assoc($query_mark_none)) {				
            		$data['Mark'][] = $data2;
        	}
			
			//lay comment			
			@$month = $_GET['month'];		
			$query_child_all = mysql_query("SELECT * FROM comment where year='$year' and month='$month' and child_id='$id'") 
			 or die(mysql_error());			
			while ($data4 = mysql_fetch_assoc($query_child_all)) {
				$data['Comment'] = $data4;
			}
				
				
            	$data_array_json[]['child'] = $data;
				
			}     
		}
        echo json_encode($data_array_json);
        break;  
		
		
		
		
		case "COMMENTWEEK":
        @$email = $_GET['email']; //email cha hoặc mẹ
        @$password = mahoa(trim($_GET['password']));		
		@$year = $_GET['year'];//năm hiện tại		
		@$month = $_GET['month'];//tháng
		
		$ktra=0;
		
		$query_login_data = mysql_query("SELECT * FROM 	children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
        $data_array = array();
		$data_array_json = array();
		$data_array['parent'] = mysql_fetch_assoc($query_login_data);
		if ($data_array) {            
			$ktra=1;       
        } else {           
			$ktra=0;            
        }
		
		if($ktra==1)
		{
			//echo 'so phan tu ' . count($data_array);
			//dang nhap thanh cong.
			//duyet qua cac be cua nguoi dung nay
			
			//echo ' --------  ptu: ' .$data_array['id'];			
			
			$query_login_data1 = mysql_query("SELECT * FROM children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
	
			while ($data = mysql_fetch_assoc($query_login_data1)) {
				//cho moi thong tin be la 1 mang 1 chieu nho 
			//voi object la child
			//duyet tung child tim mon hoc theo ngay thang
			//lay het cac mon hoc va cac practice, detail, mark, comment
			
			//lay cac mon hoc
				@$class=$data['class_gr'];			
				@$id = $data['id'];	
				$query_child_all = mysql_query("Select distinct name_vn,name_en,kq.id as practice from (SELECT mh.id as lesson, pr.* FROM (monhoc mh inner join practise pr on pr.id=mh.pr_id) where pr.clg='$class') kq inner join lessons on kq.lesson=lessons.lesson_id where hide=1 and year='$year'") 
				or die(mysql_error());
				$data_array = array();
				while ($data1 = mysql_fetch_assoc($query_child_all)) {
						//lay diem						
						@$practice = $data1['practice'];
						@$str=($month=='')?"":" and month='$month'";
						$query_child_all2 = mysql_query("SELECT * FROM comment where year='$year' $str and child_id='$id' and approve='1' and practice='$practice'")						
						 or die(mysql_error());		
						$data3 = array();						
						while ($data3 = mysql_fetch_assoc($query_child_all2)) {
							//echo 'chay';
							$data1['Comment'][] = $data3;
						}	
						
						
						
					$data['Object'][] = $data1;
					
						
				}			
				
				$query_child_all3 = mysql_query("SELECT * FROM comment where year='$year' $str and child_id='$id' and approve='1' and practice='0'")						
						 or die(mysql_error());		
						$data4 = array();						
						while ($data4 = mysql_fetch_assoc($query_child_all3)) {
							//echo 'chay';
							$data['GenneralComment'][] = $data4;
						}
					
            	$data_array_json[]['child'] = $data;
				
			}     
		}
		
		//echo $ktra;
        echo json_encode($data_array_json);
        break;  
		
		
		case "GETALLOBJECT1":
        @$email = $_GET['email']; //email cha hoặc mẹ
        @$password = mahoa(trim($_GET['password']));		
		@$year = $_GET['year'];//năm hiện tại		
		@$month = $_GET['month'];//tháng
		
		$ktra=0;
		
		$query_login_data = mysql_query("SELECT * FROM 	children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
        $data_array = array();
		$data_array_json = array();
		$data_array['parent'] = mysql_fetch_assoc($query_login_data);
		if ($data_array) {            
			$ktra=1;       
        } else {           
			$ktra=0;            
        }
		
		if($ktra==1)
		{
			//echo 'so phan tu ' . count($data_array);
			//dang nhap thanh cong.
			//duyet qua cac be cua nguoi dung nay
			
			//echo ' --------  ptu: ' .$data_array['id'];			
			
			$query_login_data1 = mysql_query("SELECT * FROM children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
	
			while ($data = mysql_fetch_assoc($query_login_data1)) {
				//cho moi thong tin be la 1 mang 1 chieu nho 
			//voi object la child
			//duyet tung child tim mon hoc theo ngay thang
			//lay het cac mon hoc va cac practice, detail, mark, comment
			
			//lay cac mon hoc
				@$class=$data['class_gr'];			
				@$id = $data['id'];	
				$query_child_all = mysql_query("Select distinct name_vn,name_en,kq.id as practice from (SELECT mh.id as lesson, pr.* FROM (monhoc mh inner join practise pr on pr.id=mh.pr_id) where pr.clg='$class') kq inner join lessons on kq.lesson=lessons.lesson_id where hide=1 and year='$year'") 
				or die(mysql_error());
				$data_array = array();
				while ($data1 = mysql_fetch_assoc($query_child_all)) {
						//lay môn học			
						@$practice = $data1['practice'];						
								
						///xet lay 1 mon duy nhat
										
						$query_child_all2 = mysql_query("SELECT distinct mh.* FROM monhoc mh inner join lessons ls on mh.id=ls.lesson_id where ls.month='$month' and ls.year='$year' and pr_id='$practice' and mh.hide='1'")
						 or die(mysql_error());
						$data3 = array();
						
						while ($data3 = mysql_fetch_assoc($query_child_all2)) {
							//tinh điểm cho học sinh	
								@$lesson_id = $data3['id'];						
								//echo $lesson_id . " === ";
								///xet lay 1 mon duy nhat
										
								$query_child_all4 = mysql_query("SELECT m.*, ls.lesson_id,detail_vn,detail_en FROM mark m inner join lessons ls on ls.id=m.detail_id where ls.month='$month' and ls.year='$year' and child_id='$id' and lesson_id='$lesson_id'")
								 or die(mysql_error());
								$data4 = array();
								
								while ($data4 = mysql_fetch_assoc($query_child_all4)) {
									
									//tinh điểm cho học sinh															
									$data3['Detail'][] = $data4;							
								}	
								
								//lay chi tiet mon hoc ko co diem
								$query_child_all4 = mysql_query("SELECT * from lessons where month='$month' and year='$year' and  lesson_id='$lesson_id'")
								 or die(mysql_error());
								
								$data5 = array();								
								while ($data5 = mysql_fetch_assoc($query_child_all4)) {		
									//tinh điểm cho học sinh
									$kt=0;
									if(!empty($data3['Detail']))
									foreach($data3['Detail'] as $datakt)
									{										
											if($datakt['detail_id']==$data5['id'])
											{
												$kt=1;
												break;
											}										
									}
									if($kt==0)																								
										$data3['Detail'][] = $data5;																	
								}								
							$data1['Lessons'][] = $data3;															
						}	
					$data['Object'][] = $data1;
				}				
            	$data_array_json[]['child'] = $data;
			}     
		}		
		
        echo json_encode($data_array_json);
        break;  
		
		
		case "GETALLOBJECT":
        @$email = $_GET['email']; //email cha hoặc mẹ
        @$password = mahoa(trim($_GET['password']));		
		@$year = $_GET['year'];//năm hiện tại		
		@$month = $_GET['month'];//tháng
		
		$ktra=0;
		
		$query_login_data = mysql_query("SELECT * FROM 	children WHERE ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and hide='1'");
        $data_array = array();
		$data_array_json = array();
		$data_array['parent'] = mysql_fetch_assoc($query_login_data);
		if ($data_array) {            
			$ktra=1;       
        } else {           
			$ktra=0;            
        }
		
		if($ktra==1)
		{
			//echo 'so phan tu ' . count($data_array);
			//dang nhap thanh cong.
			//duyet qua cac be cua nguoi dung nay
			
			//echo ' --------  ptu: ' .$data_array['id'];		
			//SELECT * FROM children, school_brand WHERE children.school_id = school_brand.id	
			//SELECT children.*,school_brand.mt,teacher.lname FROM children, school_brand,teacher WHERE children.school_id = school_brand.id and teacher.id=children.teacher_id and father_email='nguyentung@gmail.com' and children.hide='1'
			$query_login_data1 = mysql_query("SELECT children.*,school_brand.mt, school_brand.tieude as school_name,teacher.id as id_teacher, teacher.lname as nameteacher FROM children, school_brand,teacher WHERE children.school_id = school_brand.id and teacher.id=children.teacher_id and ((father_email='$email' and password_f='$password') or (mother_email='$email' and password_m='$password')) and children.hide='1'");
			
			
			
	
			while ($data = mysql_fetch_assoc($query_login_data1)) {
				//cho moi thong tin be la 1 mang 1 chieu nho 
			//voi object la child
			//duyet tung child tim mon hoc theo ngay thang
			//lay het cac mon hoc va cac practice, detail, mark, comment
			@$id_class = $data['class_gr'];		
			@$id_school = $data['school_id'];							
			//lấy thông tin của newsletter
			$query_login_lt = mysql_query("SELECT * FROM newsletter WHERE tieude_en !='' and lop_id='$id_class' and sb_id='$id_school' ORDER BY nam desc, thang desc");
			
			$data7 = array();
			while ($data7 = mysql_fetch_assoc($query_login_lt)) {									
					//tinh điểm cho học sinh															
					$data['Newsletter'][] = $data7;							
				}	
				
			$query_login_link_event = mysql_query("SELECT * FROM newsletter WHERE tieude_en ='' and lop_id='$id_class' and sb_id='$id_school' ORDER BY nam desc, thang desc, ngaydang desc, id desc LIMIT 1");
			
			$data8 = array();
			$data8 = mysql_fetch_assoc($query_login_link_event);							
			//tinh điểm cho học sinh															
			$data['FileDownload'] = $data8['fileat'];							
		
			
			@$id_teacher = $data['id_teacher'];						
			//lấy thông tin của giáo viên
			$query_login_gv = mysql_query("SELECT * FROM teacher WHERE id='$id_teacher'");
			$data6 = array();								
			$data6 = mysql_fetch_assoc($query_login_gv);
			$data['Teacher'][] = $data6;		
			
			//lấy tất cả các chat giữa gia đình và giáo viên
			
			@$id_hs = $data['id'];		
			@$id_gv = $data['teacher_id'];				
			@$id_school = $data['school_id'];
			//lấy thông tin của giáo viên
			$query_chat = mysql_query("SELECT gv.*, gd.noidung as parent_reply, gd.ngaycom as date_reply FROM communication gv Left join communication gd on gv.id=gd.id_reply where gv.id_reply=0 and gv.idgv='$id_gv' and gv.idhs='$id_hs' and gv.sc_id='$id_school'");
			$data9 = array();
			//$dem=0;
			while ($data9 = mysql_fetch_assoc($query_chat)) {									
					//tinh điểm cho học sinh				
					//$dem++;											
					$data['CommunicationConner'][] = $data9;						
				}		
				/*if($dem==0)
				{
					$data['CommunicationConner'][]="";
				}*/
			
			//lay cac mon hoc
				@$class=$data['class_gr'];			
				@$id = $data['id'];	
				$query_child_all = mysql_query("Select distinct name_vn,name_en,kq.id as practice from (SELECT mh.id as lesson, pr.* FROM (monhoc mh inner join practise pr on pr.id=mh.pr_id) where pr.clg='$class') kq inner join lessons on kq.lesson=lessons.lesson_id where hide=1") 
				or die(mysql_error());
				$data_array = array();
				while ($data1 = mysql_fetch_assoc($query_child_all)) {
						//lay môn học			
						@$practice = $data1['practice'];						
								
						///xet lay 1 mon duy nhat
										
						$query_child_all2 = mysql_query("SELECT distinct mh.* FROM monhoc mh inner join lessons ls on mh.id=ls.lesson_id where pr_id='$practice' and mh.hide='1'")
						 or die(mysql_error());
						$data3 = array();
						
						while ($data3 = mysql_fetch_assoc($query_child_all2)) {
							//tinh điểm cho học sinh	
								@$lesson_id = $data3['id'];						
								//echo $lesson_id . " === ";
								///xet lay 1 mon duy nhat
										
								//$query_child_all4 = mysql_query("SELECT m.*, ls.lesson_id,detail_vn,detail_en FROM mark m inner join lessons ls on ls.id=m.detail_id where child_id='$id' and lesson_id='$lesson_id'")
								
								//$query_child_all4 = mysql_query("SELECT m.*, ls.lesson_id,detail_vn,detail_en, mota_vn,mota_en FROM mark m inner join lessons ls on ls.lesson_id=m.lesson where child_id='$id' and lesson_id='$lesson_id' and m.detail_id=0")
								 //or die(mysql_error());
								 $query_child_all4 = mysql_query("SELECT m.*, ls.lesson_id,detail_vn,detail_en, mota_vn,mota_en FROM mark m inner join lessons ls on ls.lesson_id=m.lesson where child_id='$id' and lesson_id='$lesson_id' and m.detail_id =ls.id")
								 or die(mysql_error());
								$data4 = array();
								
								while ($data4 = mysql_fetch_assoc($query_child_all4)) {									
									//tinh điểm cho học sinh															
									$data3['Detail'][] = $data4;							
								}	
								
								//lay chi tiet mon hoc ko co diem
								$query_child_all4 = mysql_query("SELECT * from lessons where lesson_id='$lesson_id'")
								 or die(mysql_error());
								
								$data5 = array();								
								while ($data5 = mysql_fetch_assoc($query_child_all4)) {		
									//tinh điểm cho học sinh
									$kt=0;
									if(!empty($data3['Detail']))
									foreach($data3['Detail'] as $datakt)
									{										
											if($datakt['detail_id']==$data5['id'])
											{
												$kt=1;
												break;
											}										
									}
									if($kt==0)																								
										$data3['Detail'][] = $data5;																	
								}								
							$data1['Lessons'][] = $data3;															
						}	
					$data['Object'][] = $data1;
					
				
				
				}			
				//@$id = $data['id'];
				//get comment từng child;	
				$query_child_all6 = mysql_query("SELECT cmt_month FROM comment where child_id='$id' and approve='1' and practice='0' order by year desc, month desc limit 1")						
						 or die(mysql_error());		
						$data6 = array();						
						while ($data6 = mysql_fetch_assoc($query_child_all6)) {
							//echo 'chay';
							$data['GenneralComment'] = $data6['cmt_month'];
						}
            	$data_array_json[]['child'] = $data;
			}     
		}		
		
        echo json_encode($data_array_json);
        break;  
		
		
		case "UPDATECHAT":
		
		//kiem tra neu id_reply ton tai thi update
		
        /* Source code UPDATECHAT */
        @$id_reply = $_GET['id_reply'];
        @$idgv = $_GET['idgv'];       
		@$sc_id = $_GET['sc_id'];
        @$tenlop = $_GET['tenlop'];		
		@$idhs = $_GET['idhs'];
		@$tungay = $_GET['tungay'];
		@$denngay = $_GET['denngay'];		
		@$noidung = $_GET['noidung'];
		@$ngaycom = $_GET['ngaycom'];		
        @$tuan = $_GET['tuan'];
		@$thang = $_GET['thang'];	
		@$nam = $_GET['nam'];			
		
        @$id = $_GET['id'];		
		
		//$data_array_kt = array();
		//kiem tra xem da co nguoi dang ky ten nay chua
		$query_ktra_data = mysql_query("SELECT * FROM communication WHERE id_reply='$id_reply'");        
		//$data_array = mysql_fetch_assoc($query_login_data);
		//$data_array_kt = mysql_fetch_assoc($query_ktra_data);   
		if (mysql_num_rows($query_ktra_data)) {		
			
			$query_update_chat = mysql_query("UPDATE communication SET noidung='$noidung',ngaycom='$ngaycom' WHERE id_reply='$id_reply'");
			$data_array = array();
			if ($query_update_chat) {
				$data_array['result']=1;            
			} else {
				$data_array['result']=0;            
			}
                  
        } else {
				//if chưa có thì them mới
				$query_update_driver = mysql_query("INSERT INTO communication(id, id_reply, idgv, sc_id, tenlop, idhs, tungay, denngay, noidung, ngaycom, tuan, thang, nam, hienthi) VALUES (null,'$id_reply','$idgv','$sc_id','$tenlop','$idhs','$tungay','$denngay','$noidung','$ngaycom','$tuan','$thang','$nam',0)");
				$data_array = array();
				if ($query_update_driver) {			
					$data_array['result']=1;            
				} else {
					$data_array['result']=0;
				}
		}
		echo json_encode($data_array);
        break;
		
    default:
        break;
}

?>