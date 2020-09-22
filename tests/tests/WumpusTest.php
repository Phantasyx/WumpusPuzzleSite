<?php

require __DIR__ . "/../../vendor/autoload.php";

/** @file
 * @brief Empty unit testing template
 * @cond
 * @brief Unit tests for the class
 */
class WumpusTest extends \PHPUnit_Framework_TestCase
{
    const SEED = 1422668587;

    public function test_construct()
    {
        $wumpus = new Wumpus\Wumpus(self::SEED);
        $this->assertInstanceOf("Wumpus\Wumpus", $wumpus);
    }

    public function test_move()
    {
        $wumpus = new Wumpus\Wumpus(self::SEED);

        // Move to Wumpus
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(9));
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(8));
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(2));
        $this->assertEquals(Wumpus\Wumpus::EATEN, $wumpus->move(3));
        $this->assertFalse($wumpus->wasCarried());

        // Move to birds, will be picked up and moved to a pit in room ndx 15
        $wumpus = new Wumpus\Wumpus(self::SEED);
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(11));
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(18));
        $this->assertEquals(Wumpus\Wumpus::FELL, $wumpus->move(19));
        $this->assertTrue($wumpus->wasCarried());

        // Move to pit
        $wumpus = new Wumpus\Wumpus(self::SEED);
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(11));
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(12));
        $this->assertEquals(Wumpus\Wumpus::HAPPY, $wumpus->move(4));
        $this->assertEquals(Wumpus\Wumpus::FELL, $wumpus->move(5));
        $this->assertFalse($wumpus->wasCarried());
    }

    public function test_shoot()
    {
        $wumpus = new Wumpus\Wumpus(self::SEED);

        // Single shot right on the money
        $this->assertEquals(3, $wumpus->numArrows());
        $this->assertTrue($wumpus->shoot(3));

        $wumpus = new Wumpus\Wumpus(self::SEED);
        $wumpus->move(8);    // Two rooms away
        $this->assertFalse($wumpus->shoot(2));
        $this->assertEquals(2, $wumpus->numArrows());
        $this->assertTrue($wumpus->shoot(2));
        $this->assertEquals(1, $wumpus->numArrows());
    }
    public function test_smellWumpus() {
        $wumpus = new Wumpus\Wumpus(self::SEED);

        // Based on this seed, we are in room 10, wumpus is in room 3
        $this->assertTrue($wumpus->smellWumpus());

        // Move two away, should still smell the wumpus
        $wumpus->move(9);
        $this->assertTrue($wumpus->smellWumpus());

        // Move three away, no longer smell wumpus
        $wumpus->move(17);
        $this->assertFalse($wumpus->smellWumpus());
    }

    public function test_feelDraft() {
        $wumpus = new Wumpus\Wumpus(self::SEED);

        $this->assertFalse($wumpus->feelDraft());

        $wumpus->move(4);
        $this->assertTrue($wumpus->feelDraft());

        $wumpus->move(6);
        $this->assertTrue($wumpus->feelDraft());
    }

    public function test_hearBirds() {
        $wumpus = new Wumpus\Wumpus(self::SEED);

        $this->assertFalse($wumpus->hearBirds());

        $wumpus->move(18);
        $this->assertTrue($wumpus->hearBirds());
    }

    public function test_getCurrent() {
        $wumpus = new Wumpus\Wumpus(self::SEED);
        $this->assertEquals(10, $wumpus->getCurrent()->getNdx());
    }

}
/// @endcond
?>
