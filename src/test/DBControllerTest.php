<?php
namespace Test;
/**
* Unit Test for DB Controller
*/

require_once 'PHPUnit/Autoload.php';


use DAO\DBController;

use DAO\Debt;

class DBControllerTest extends \PHPUnit_Framework_TestCase	
{
	
	public function testCanLogin()
    {
    	$dbController = new DBController();

        $this->assertEquals(
            true,
            $dbController->login('admin@toto.fr', 'azerty'));
        
    }

	public function testCantLogin()
    {
    	$dbController = new DBController();

        $this->assertEquals(
            false,
            $dbController->login('admin@unknown.fr', 'azerty'));
        
    }

    public function testCanLogout()
    {
        
        $dbController = new DBController();

        $this->assertEquals(
            true,
            $dbController->logout('admin@toto.fr', 'azerty'));
        
    }

    public function testCantLogout()
    {
        $dbController = new DBController();

        $this->assertEquals(
            false,
            $dbController->logout('admin@unknown.fr', 'azerty'));
        
    }
    public function testCanUpdateDebts() 
    {
        $debts = new DBController();
        $this->assertEquals(
            true,
            $debts->updateDebt(1, 'En Cours'));
    }
    public function testCantUpdateDebts()
    {
        $debts = new DBController();
        $this->assertEquals(
            false,
            $debts->updateDebt('za', 'En Cours'));
    }
		public function testSumDebts()
    {
    }

}

?>
