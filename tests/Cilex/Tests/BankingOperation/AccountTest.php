<?php
/**
 * Description of AccountTest
 *
 * @author Ghanu <khanraj.2k5@gmail.com>
 */

namespace Cilex\Tests\BankingOperation;

class AccountTest extends \PHPUnit_Framework_TestCase
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
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        //set up test object
        //set up test object
        $this->object = $this->getMockForAbstractClass('Cilex\BankingOperation\Account', array('123456789'));
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
     * @covers Cilex\BankingOperation\Account::__construct
     * @covers Cilex\BankingOperation\Account::getAccountNumber
     */
    public function testConstruct()
    {
        $this->assertEquals('123456789', $this->object->getAccountNumber());
    }
    
    /**
     * @covers Cilex\BankingOperation\Account::open
     * @covers Cilex\BankingOperation\Account::getBalance
     * @covers Cilex\BankingOperation\Account::isOpen
     */
    public function testOpenNewAccount()
    {
        //open account
        $this->object->open();
        
        $this->assertTrue($this->object->isOpen());
        
        $this->assertEquals(0.00, $this->object->getBalance());
    }
    
    
    public function testOpenNewBadAccount()
    {
        // Stop here and mark this test as incomplete.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }
    /**
     * @covers Cilex\BankingOperation\Account::open
     * @covers Cilex\BankingOperation\Account::close
     * @covers Cilex\BankingOperation\Account::isOpen
     */
    public function testCloseAccount()
    {   
        //open account
        $this->object->open();
        
        $this->assertTrue($this->object->isOpen());
        
        //close object
        $this->object->close();
        
        $this->assertFalse($this->object->isOpen());
    }
    
    /**
     * @covers Cilex\BankingOperation\Account::isOpen
     */
    public function testAccountisClosedByDefault()
    {   
        $this->assertFalse($this->object->isOpen());
    }
    
    /**
     * @covers Cilex\BankingOperation\Account::getBalance
     */
    public function testGetDefaultBalance()
    {
        $this->assertEquals(0.00, $this->object->getBalance());
    }
    
    /**
     * @covers Cilex\BankingOperation\Account::getBalance
     * @covers Cilex\BankingOperation\Account::deposit
     */
    public function testGetNewBalanceAfterDeposit()
    {
        $this->object->deposit(100.25);

        $this->assertEquals(100.25, $this->object->getBalance());
    }
    
    /**
     * @covers Cilex\BankingOperation\Account::deposit
     */
    public function testDeposit()
    {
        $this->assertTrue($this->object->deposit(100.25));
    }
    
    /**
     * @covers Cilex\BankingOperation\Account::deposit
     */
    public function testDepositInvalidValue()
    {
        $this->assertFalse($this->object->deposit('test'));
    }
  
}
   
