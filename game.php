<?php
require 'format.inc.php';
require 'lib/game.inc.php';
$view = new Wumpus\WumpusView($wumpus);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game</title>
    <link href="wumpus.css" type="text/css" rel="stylesheet" />

</head>
<body>


<article>
        <?php echo present_header("Stalking the Wumpus",""); ?>
    <figure>
        <img class = "t" src="cave.jpg" alt="cave image" width="600" height="325" />
    </figure>
    <?php
    echo '<p>' . date("g:ia l, F j, Y") . '</p>';
    ?>

    <?php
    echo $view->presentStatus();
    ?>

    <div class="rooms">
        <?php
        echo $view->presentRoom(0);
        echo $view->presentRoom(1);
        echo $view->presentRoom(2);
        ?>
    </div>

    <footer>
        <p class="info"> <?php
            echo $view->presentArrows();
            ?></p>
    </footer>

</article>

</body>
</html>