<?php
/**
 * 
 * Acts like and Active Record
 * Receives data from the TransactiontableService 
 * 
 * @package ConvertCurrencyBundle
 * @author Warren Tucker <wtucker1664@me.com>
 * 
 *
 */
namespace ConvertCurrencyBundle\Resources\Models;
class Merchant
{
    /*
     * @var $data 
     */
    private $data;
    /*
     * @method __construct
     * @param array $data
     */
    public function __construct(array $data) {
        $this->data = $data;
    }
    /*
     * Return the data 
     * @method getTransactions
     * @return array data
     */
    public function getTransactions()
    {
        return $this->data;
    }
}