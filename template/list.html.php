<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Twittonio</title>
	
</head>

<body>
<?php include "partials/header.html.php"; ?>

<h3>Followers list</h3>
<ul>
	<?php foreach( $followers as $follower) : ?>
	<li><?= $follower ?></li>
	<?php endforeach ?>
</ul>

<h3>Friends List</h3>
<ul>
	<?php foreach( $friends as $friend) : ?>
	<li><?= $friend ?></li>
	<?php endforeach ?>
</ul>
</body>
</html>