<?php
/**
 *
 * @author Ghanu <khanraj.2k5@gmail.com>
 */

namespace Cilex\BankingOperation;

interface ServicesInterface {
    
    /**
     * Constructor
     * @param \Cilex\Bank\Account $account
     */
    public function __construct(\Cilex\BankingOperation\Account $account);
    
    /**
     * getName - returns the name of the service
     *
     * @return string
     */
    public function getName();
    
    /**
     * isEnabled - returns whether the service is enabled
     * 
     * @return boolean
     */
    public function isEnabled();
}
