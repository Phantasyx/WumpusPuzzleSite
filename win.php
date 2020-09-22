<?php
$room=1;
require 'format.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Win</title>
    <link href="wumpus.css" type="text/css" rel="stylesheet" />

</head>

<body>
<article>
    <?php echo present_header("Stalking the Wumpus",$room); ?>
    <figure>
    <img src="dead-wumpus.jpg" alt="cave image" width="600" height="325" />
</figure>

<p class="info">You killed the Wumpus</p>

<div class="start">

    <p><a href="welcome.php">New Game</a></p>
</div>
</article>
</body>
</html>