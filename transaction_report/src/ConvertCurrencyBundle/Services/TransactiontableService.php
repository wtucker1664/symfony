<?php
namespace ConvertCurrencyBundle\Services;

use ConvertCurrencyBundle\Models\Merchant;
/**
 * Uses ConvertCurrencyBundle\Models\Merchant
 * 
 * Used as a service but acts like and Active Record
 * The Transaction Table Service loads the data from the data.csv file 
 * located in ConvertCurrencyBundle\Resources\Data into a local private variable $data
 * 
 * @package ConvertCurrencyBundle
 * @author Warren Tucker <wtucker1664@me.com>
 * @todo Possibly add functions to act as the CRUD
 *
 */
class TransactiontableService
{
    /*
     * @var $dataFile This is the file name of the csv file
     * @access private
     */
    private $dataFile = "data.csv";
    /*
     * @var $data This is the array which holds the data obtained from the csv file
     */
    private $data = [];
    /*
     * This method sets up and extracts the data from the csv file
     * it takes in the symfony container to be able to locate the path to the bundle resources data folder
     * @method __construct
     * @access public
     * @param object $container
     */
    public function __construct($container) {
        $dataPath = $container->get('kernel')->locateResource('@ConvertCurrencyBundle/Resources')."/Data/".$this->dataFile;
        $csv = array_map('str_getcsv', file($dataPath));
        
       
        for($i=1;$i<sizeof($csv);$i++){
            $this->data[] = str_getcsv($csv[$i][0],";");
        }
        
        
    }
    /*
     * This method returns the merchant object for a given merchant ID
     * and passes the data to the object. The merchant object is then an active record
     * for the data it is passed. If no merchant is found then it will be passed an empty array
     * 
     * @method getMerchant
     * @param int $id
     * @access public
     */
    public function getMerchant($id){
        $return = [];
        foreach($this->data as $val) {
            if($val[0] == $id){
                $return[] = $val;
            }
            
        }
        
        return new Merchant($return);
        
    }
}