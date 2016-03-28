<?php
/**
 *
 * @author Ghanu <khanraj.2k5@gmail.com>
 */
namespace Cilex\BankingOperation;

interface BankingOperation 
{
    
    /**
     * getAccountNumber - returns the account number
     * 
     * @return mixed string|int
     */
    public function getAccountNumber();
    
    /**
     * getBalance - returns the balance of the account
     * 
     * @return double
     */
    public function getBalance();
    
    /**
     * open - sets the account open flag to true
     */
    public function open();
    
    /**
     * close - sets the account open flag to false
     */
    public function close();
    
    /**
     * deposit - deposit an amount into the account
     *
     * @param double $amount - the value to deposit
     * 
     * @return boolean
     */
    public function deposit($amount);
    
    /**
     * withdraw - withdraws funds from the account
     *
     * @param double $withdrawAmount amount to withdraw
     * @return boolean
     */
     public function withdraw($withdrawAmount);

     /**
      * getOverdraft - get the overdraft limit
      *
      * @return double
      */
     public function getOverdraftLimit();
}
