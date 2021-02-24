<?php
mb_internal_encoding("utf8");

//セッションスタート
session_start();

//mypage.phpからの導線以外は、『login_error.php』へリダイレクト
if (empty($_POST['from_mypage'])) {
	header("Location:login_error.php");
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>マイページ登録</title>
	<link rel="stylesheet" type="text/css" href="mypage.css">
</head>
<body>
	<!-- このbodyの中に、マイページとして表示する部分を記述していく(HTMLとsessionを記述。編集できるように、sessionはvalueに入れる。) -->
	<header>
		<img src="4eachblog_logo.jpg">
		<div class="logout"><a href="log_out.php">ログアウト</a></div>
	</header>
	<main>
		<h2>会員情報</h2>
		<div class="box">
			<div class="hello">
				<?php echo "こんにちは! ".$_SESSION['name']."さん"; ?>
			</div>
			<form action="mypage_update.php" method="post">
				<div class="pic_info_box">
					<div class="profile_pic">
						<img src="<?php echo $_SESSION['picture']; ?>">
					</div>
					<div class="basic_info">
						<p>氏名：<input type="text" size="30" value="<?php echo $_SESSION['name']; ?>" name="name"></p>
						<p>メール：<input type="text" size="30" value="<?php echo $_SESSION['mail']; ?>" name="mail"></p>
						<p>パスワード：<input type="text" size="30" value="<?php echo $_SESSION['password']; ?>" name="password"></p>
					</div>
				</div>
				<div class="comments">
					<textarea rows="2" cols="93" name="comments"><?php echo $_SESSION['comments']; ?></textarea>
				</div>
				<div class="henshyubutton">
					<input type="submit" class="submit_button02" size="35" value="この内容に変更する">
				</div>
			</form>
			<form action="mypage_update.php" method="post" class="form_center">
				<input type="hidden" value="<?php echo rand(1,10); ?>" name="from_mypage">
			</form>
		</div>
	</main>

	<footer>
		©︎ 2018 InterNous.inc. All rights reserved
	</footer>
	
</body>
</html>