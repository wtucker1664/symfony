<?php
namespace ConvertCurrencyBundle\Services;

use ConvertCurrencyBundle\Services\CurrencyWebService;
/**
 * Uses CurrencyWebservice
 * Core element in the conversion process 
 * @package ConvertCurrencyBundle
 * @author Warren Tucker <wtucker1664@me.com>
 * 
 * 
 */
class CurrencyConverter
{   
    /*
     * Values $ => USD and € => EUR 
     * @var array $currency Used to determin which currency is being converted
     * @access private
     */
    private $currency = ['$'=>"USD","€"=>"EUR"];
    /*
     * This method calls the currency web service to get the exchanged rate 
     * to perform the calculation if incoming amount is not already GBP.
     * @method convert
     * @param string $amount
     * @access public
     * @return string
     * @todo Add exception handling and maybe add a switch statment instead of using preg_match for future expantion 
     */
    public function convert($amount){
        
        if(preg_match('/\$|€/',$amount)){
            $pos = 0;
            $symbol = mb_substr($amount,0,1,'UTF-8');
            $amount = mb_substr($amount, 1,mb_strlen($amount,'UTF-8'),'UTF-8');
         

            $currencyRate = new CurrencyWebService();
            $total = $currencyRate->getExchangeRate($this->currency[$symbol],"GBP") * $amount;
            return "£".number_format($total, 2, '.', '');
        
        }else{
            return $amount;
        }
        
    }
}