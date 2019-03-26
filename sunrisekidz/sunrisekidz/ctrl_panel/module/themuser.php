<?php
	$tcong = "";
	if(isset($_POST['luu']))
	{
		if($_POST['repass']==$_POST['pass']) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$tenuser = $_POST['tenuser'];
			$nhomqt = $_POST['nhomqt'];
			if(isset($_POST['kichhoat'])) $kichhoat = 1;
			else $kichhoat = 0;
			$query = $h->them_user($user,$tenuser,$pass,$nhomqt,$kichhoat);
			if($query)
				$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Add successfully</p>";
			else
				$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Error </p>".mysql_error();
		}
		else $tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Password is not match</p>";
	}
?>
<div class="lienhe">
	<p class="title">Add new account</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data">
		<div>
			<label for="hoten">Username:</label>
			<input type="text" name="user" value="" size="30" />
		</div>
        <div>
			<label for="hoten">Fullname:</label>
			<input type="text" name="tenuser" value="" size="30" />
		</div>
		<div>
			<label for="hoten">Password:</label>
			<input type="password" name="pass" value="" size="30" />
		</div>
        <div>
			<label for="hoten">Confirm password:</label>
			<input type="password" name="repass" value="" size="30" />
		</div>
		<div>
			<label for="hoten">Permission:</label>
			<select name="nhomqt">
				<option value="1">Super Admin</option>
				<option value="2" selected>Administrator</option>
			</select>
		</div>
        <div>
			<label for="hoten">Active:</label>
			<input type="checkbox" name="kichhoat" checked />
		</div>
		<div>
			<input type="submit" name="luu" value="Save" class="gui" />
			<input type="reset" name="reset" value="Reset" class="reset" />
		</div>
	</form>
</div>