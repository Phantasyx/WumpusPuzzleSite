<?php
/**
 * Created by PhpStorm.
 * User: X
 * Date: 2/8/2017
 * Time: 10:00 PM
 */

namespace Wumpus;


class WumpusController
{

    /**
     * Constructor
     * @param Wumpus $wumpus The Wumpus object
     * @param $request The $_REQUEST array
     */
    public function __construct(Wumpus $wumpus, $request) {
        $this->wumpus = $wumpus;
        if(isset($request['m'])) {
            $this->move($request['m']);
        } else if(isset($request['s'])) {
            $this->shoot($request['s']);
        } else if(isset($request['n'])) {
            // New game!
            $this->reset = true;
        } else if(isset($request['x'])){
            //cheat mode
            $this->cheatMode = true;

        }
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    public function isReset()
    {
        return $this->reset;
    }
    /** Move request
     * @param $ndx Index for room to move to */
    private function move($ndx) {
        // Simple error check
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }

        switch($this->wumpus->move($ndx)) {
            case Wumpus::HAPPY:
                break;

            case Wumpus::EATEN:
            case Wumpus::FELL:
                $this->reset = true;
                $this->page = 'lose.php';
                break;
        }
    }

    /** Shoot request
     * @ndx Index for room to shoot to */
    private function shoot($ndx)
    {
        if(!is_numeric($ndx) || $ndx < 1 || $ndx > Wumpus::NUM_ROOMS) {
            return;
        }
        if ($this->wumpus->shoot($ndx))
        {
            $this->reset = true;
            $this->page = "win.php";
        }
    }

    public function cheatMode(){

        return $this->cheatMode;
    }


    private $cheatMode = false;
    private $wumpus;                // The Wumpus object we are controlling
    private $page = 'game.php';     // The next page we will go to
    private $reset = false;         // True if we need to reset the game
}