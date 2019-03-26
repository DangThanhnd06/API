<?php
	$id = $_REQUEST['id'];
	$q = $h->query("select * from h_admin where id=$id");
	$r = $h->fetch_array($q);
	$u = $r['user'];
	$p = $r['pass'];
	$tu = $r['tenuser'];
	$nqt = $r['nhomqt'];
	$kh = $r['kichhoat'];
	$tcong = "";
	if(isset($_POST['luu']))
	{
		if($h->mahoa(trim($_POST['oldpass']))==$p) {
			if($_POST['repass']==$_POST['pass']) {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$tenuser = $_POST['tenuser'];
				$nhomqt = $_POST['nhomqt'];
				if(isset($_POST['kichhoat'])) $kichhoat = 1;
				else $kichhoat = 0;
				$query = $h->sua_user($id,$user,$tenuser,$pass,$nhomqt,$kichhoat);
				if($query) {
					$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Update Successfully</p>";
					$q = $h->query("select * from h_admin where id=$id");
					$r = $h->fetch_array($q);
					$u = $r['user'];
					$tu = $r['tenuser'];
					$nqt = $r['nhomqt'];
					$kh = $r['kichhoat'];
				}
				else
					$tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Error </p>".mysql_error();
			}
			else $tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Password is not match</p>";
		}
		else $tcong = "<p style='padding:4px; text-align:center;color:#cc0000; font-size:14px; font-weight:bold;'>Password is not true !!!</p>";
	}
?>
<div class="lienhe">
	<p class="title">Update information admin</p>
	<?php echo $tcong; ?>
	<form action="" method="post" enctype="multipart/form-data">
		<div>
			<label for="hoten">Username:</label>
			<input type="text" name="user" value="<?php echo $u; ?>" size="30" />
		</div>
        <div>
			<label for="hoten">Fullname:</label>
			<input type="text" name="tenuser" value="<?php echo $tu; ?>" size="30" />
		</div>
        <div>
			<label for="hoten">Old password:</label>
			<input type="password" name="oldpass" value="" size="30" />
		</div>
		<div>
			<label for="hoten">New password:</label>
			<input type="password" name="pass" value="" size="30" />
		</div>
        <div>
			<label for="hoten">Re-type new password:</label>
			<input type="password" name="repass" value="" size="30" />
		</div>
		<div>
			<label for="hoten">Permission:</label>
			<select name="nhomqt">
            <?php if($nqt==1) { ?>
				<option value="1" selected>Super Admin</option>
				<option value="2">Administrator</option>
            <?php } else { ?>
				<option value="2" selected>Administrator</option>
            <?php } ?>
			</select>
		</div>
        <div>
			<label for="hoten">Active:</label>
            <?php if($kh==1) { ?>
			<input type="checkbox" name="kichhoat" checked />
            <?php } else { ?>
            <input type="checkbox" name="kichhoat" />
            <?php } ?>
		</div>
		<div>
			<input type="submit" name="luu" value="Update" class="gui" />
			<input type="reset" name="reset" value="Reset" class="reset" />
		</div>
	</form>
</div>