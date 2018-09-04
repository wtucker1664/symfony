<?php
namespace ConvertCurrencyBundle\Services;

use GuzzleHttp\Client;
/**
 * Uses GuzzleHttp\Client
 * 
 * The idea was to use a simple exchange rate api but this required signing up for an API 
 * I have left the code which would have been used to obtain the data.
 * 
 * @package ConvertCurrencyBundle
 * @author Warren Tucker <wtucker1664@me.com>
 * 
 *
 */
class CurrencyWebService
{

    /**
     * Values USD => 0.768285 and EUR => 0.895817
     * Rates are as or near to the current conversion rate.
     * @var array $currency
     * @access private
     */
    private $currency = ["USD"=>0.768285,"EUR"=>0.895817];
    /*
     * This method gets the exchange rate from current value to exchange value
     * @param float $fromCurrency This is the currency value type to be exchanged such as USD
     * @param flow $toCurrency This is the base currency to exchange to such as GBP
     * @return float Exchange value
     * @todo Sign up for API key to make the api request work this will then allow for exchanging any currency to what ever the base currency is.
     */
    public function getExchangeRate($fromCurrency,$toCurrency)
    {
        $from_Currency = urlencode($fromCurrency);
        $to_Currency = urlencode($toCurrency);
        //$query =  "{$from_Currency}_{$to_Currency}";
        
       // $client = new \GuzzleHttp\Client();
        
        //$res = $client->request("GET","https://api.currencyconverterapi.com/api/v6/convert?q={$query}&compact=y");
        
        //$res->getBody(); // requires api

        


        return $this->currency[$fromCurrency];
    }
    
}