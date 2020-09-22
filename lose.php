<?php
require 'format.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lose</title>
    <link href="wumpus.css" type="text/css" rel="stylesheet" />

</head>
<body>
<article>
        <?php echo present_header("Stalking the Wumpus"); ?>

<figure>
    <img src="wumpus-wins.jpg" alt="cave image" width="600" height="325" />
</figure>


    <p class=/"info/"> You died, the Wumpus feasted on Brains!</p>
<div class="start">

    <p><a href="welcome.php">New Game</a></p>

</div>
</article>
</body>
</html>