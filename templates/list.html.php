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

<?php include "partials/footer.html.php"; ?>