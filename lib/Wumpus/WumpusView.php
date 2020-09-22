<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 2/8/2017
 * Time: 9:06 PM
 */

namespace Wumpus;


class WumpusView
{

    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     */
    public function __construct(Wumpus $wumpus) {
        $this->wumpus = $wumpus;
    }

    /** Generate the HTML for the number of arrows remaining */
    public function presentArrows() {
        $a = $this->wumpus->numArrows();
        return "<p>You have $a arrows remaining.</p>";
    }

    public function presentStatus()
    {
        $curRoom = $this->wumpus->getCurrent()->getNum();

        $status = "<p>You are in room $curRoom</p>";

        if($this->wumpus->smellWumpus())
        {
            $status .= "<p>You smell a wumpus...</p>";

        }

        if($this->wumpus->feelDraft())
        {
            $status .= "<p>You feel a draft...</p>";

        }if($this->wumpus->hearBirds())
    {
        $status .= "<p>You hear birds...</p>";

        }if($this->wumpus->wasCarried())
    {
        $status .= "<p>You were carried by the birds!</p>";

        }

        return $status;



    }




    /** Present the links for a room
     * @param $ndx An index 0 to 2 for the three rooms */
    public function presentRoom($ndx) {
        $room = $this->wumpus->getCurrent()->getNeighbors()[$ndx];
        $roomnum = $room->getNum();
        $roomndx = $room->getNdx();
        $roomurl = "game-post.php?m=$roomndx";
        $shooturl = "game-post.php?s=$roomndx";

        $html = <<<HTML
<div class="room">
  <figure.b><img src="cave2.jpg" width="180" height="135" alt=""/></figure.b>
  <p><a href="$roomurl">$roomnum</a></p>
<p><a href="$shooturl">Shoot Arrow</a></p>
</div>
HTML;

        return $html;
    }



    private $wumpus;    // The Wumpus object

}