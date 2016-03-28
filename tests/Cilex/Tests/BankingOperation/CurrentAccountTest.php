<?php
/**
 * Description of CurrentAccountTest
 *
 * @author Ghanu <khanraj.2k5@gmail.com>
 */

namespace Cilex\Tests\BankingOperation;

use Cilex\BankingOperation\CurrentAccount;

class CurrentAccountTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Cilex\BankingOperation\CurrentAccount
     */
    protected $object;

     /**
     * @var class
     */
    protected $class;

    /**
     *
     * @var array
     */
    protected $attributes;
    
    /**
     *
     * @var class
     */
    protected $mockOverdraftObject;
    
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        //set up test object
        $this->object = new CurrentAccount('1234567890');
        $this->mockOverdraftObject = $this->getMock('\Cilex\BankingOperation\OverdraftService', array('setLimit', 'getLimit', 'isEnabled'),array($this->object));
        
        switch($this->getName()) {
            case 'testWithdrawFundsGreaterThanBalanceWithOverdraft':
            case 'testHasNoFundsButOverdraft':
            case 'testhasOverdraft':    
                $this->mockOverdraftObject->expects($this->once())->method('setLimit')->will($this->returnValue(true));
                $this->mockOverdraftObject->expects($this->any())->method('getLimit')->will($this->returnValue(10.00));
                $this->mockOverdraftObject->expects($this->once())->method('isEnabled')->will($this->returnValue(true));
                $this->object->setOverdraft($this->mockOverdraftObject, 10.00);
                break;
            case 'testSetOverdraftLimit':
                $this->mockOverdraftObject->expects($this->once())->method('setLimit')->will($this->returnValue(true));
                break;
            case 'testSetBadOverdraftLimit':
                $this->mockOverdraftObject->expects($this->once())->method('setLimit')->will($this->returnValue(false));
                break;
        }
    }
    
    /**
     * Tears down the fixture.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
    
    /**
     * Tests whether the constructor instantiates the correct dependencies.
     * @covers Cilex\BankingOperation\CurrentAccount::__construct
     */
    public function testConstruct()
    {
        $this->assertEquals('1234567890', $this->object->getAccountNumber());
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::withdraw
     * @covers Cilex\BankingOperation\CurrentAccount::hasFunds
     * @covers Cilex\BankingOperation\Account::deposit
     * @covers Cilex\BankingOperation\Account::updateBalance
     * @covers Cilex\BankingOperation\Account::getBalance
     */
    public function testWithdrawFunds()
    {
        $this->object->deposit(10.00);
        
        $this->assertTrue($this->object->withdraw(5.25));
        
        $this->assertEquals(4.75, $this->object->getBalance());
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::withdraw
     * @covers Cilex\BankingOperation\CurrentAccount::hasFunds
     * @covers Cilex\BankingOperation\Account::deposit
     * @covers Cilex\BankingOperation\Account::getBalance
     */
    public function testWithdrawFundsGreaterThanBalance()
    {
        $this->object->deposit(10.00);
        
        $this->assertFalse($this->object->withdraw(15.00));
        
        $this->assertEquals(10.00, $this->object->getBalance());
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::withdraw
     * @covers Cilex\BankingOperation\CurrentAccount::hasFunds
     * @covers Cilex\BankingOperation\CurrentAccount::setOverdraft
     * @covers Cilex\BankingOperation\Account::getBalance
     */
    public function testWithdrawFundsGreaterThanBalanceWithOverdraft()
    {
        $this->assertTrue($this->object->withdraw(5.00));
        
        $this->assertEquals(-5.00, $this->object->getBalance());
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::hasFunds
     * @covers Cilex\BankingOperation\Account::deposit
     */
    public function testHasFunds()
    {
        $this->object->deposit(10.00);
        
        $this->assertTrue($this->object->hasFunds());
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::hasFunds
     */
    public function testHasNoFunds()
    {
        $this->assertFalse($this->object->hasFunds(50.00));
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::hasFunds
     * @covers Cilex\BankingOperation\CurrentAccount::setOverdraft
     */
    public function testHasNoFundsButOverdraft()
    {
        $this->assertTrue($this->object->hasFunds(5.00));
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::hasOverdraft
     */
    public function testhasNoOverdraft()
    {
        $this->assertFalse($this->object->hasOverdraft());
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::hasOverdraft
     * @covers Cilex\BankingOperation\CurrentAccount::setOverdraft
     */
    public function testhasOverdraft()
    {
        $this->assertTrue($this->object->hasOverdraft());
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::setOverdraft
     */
    public function testSetOverdraftLimit()
    {
        $this->assertTrue($this->object->setOverdraft($this->mockOverdraftObject, 10.00));
    }
    
    /**
     * @covers Cilex\BankingOperation\CurrentAccount::setOverdraft
     */
    public function testSetBadOverdraftLimit()
    {
        $this->assertFalse($this->object->setOverdraft($this->mockOverdraftObject, '100'));
    }
}
   
