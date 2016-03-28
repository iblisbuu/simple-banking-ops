<?php
/**
 * Description of CurrentAccount
 *
 * @author Ghanu <khanraj.2k5@gmail.com>
 */

namespace Cilex\BankingOperation;

class SavingAccount extends \Cilex\BankingOperation\Account
{
    private $overdraft  = null;
    
    public function __construct($accountNumber) 
    {
        parent::__construct($accountNumber);
    }
    
    /**
     * withdraw - withdraws funds from the account
     *
     * @param double $withdrawAmount amount to withdraw
     * @return boolean
     */
    public function withdraw($withdrawAmount)
    {
        if($this->hasFunds($withdrawAmount)) {
            
            $this->updateBalance($withdrawAmount);
            
            return true;
        }
        
        return false;
    }
    
    /**
     * hasFunds - returns whether the account has funds to withdraw
     *
     * @param double $withdrawAmount - amount of money to withdraw from the funds
     *
     * @return boolean
     */
    public function hasFunds($withdrawAmount = 0.00)
    {
        if ($withdrawAmount < $this->getBalance()) {
            return true;
        }
        
        return false;
    }
    
    /**
     * setOverdraft - sets the overdraft for this account
     *
     * @param \Cilex\BankingOperation\OverdraftService $overdraft
     * @param double $amount
     * @return boolean
     */
    public function setOverdraft(\Cilex\BankingOperation\OverdraftService $overdraft, $amount)
    {
    }

    /**
     * hasOverdraft - whether this account has a overdraft
     *
     * @return boolean
     */
    public function hasOverdraft()
    {
    }
    
    /**
     * getOverdraft - get the overdraft limit
     *
     * @return double
     */
    public function getOverdraftLimit()
    {
    }
}
