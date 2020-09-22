<?php
$room = 1;
require 'format.inc.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="wumpus.css" type="text/css" rel="stylesheet" />

</head>

<body>

<article>
        <?php echo present_header("Stalking the Wumpus",$room); ?>
<figure>
    <img src="cave-wumpus.jpg" alt="cave image" width="600" height="325" />
</figure>

    <p>Welcome to <span class="title">Stalking the Wumpus</span></p>

<br/><br/>

<div class="start">

    <p><a href="instructions.php">Instructions</a></p>
    <p><a href="game-post.php">Start Game</a></p>
</div>
</article>
</body>
</html>