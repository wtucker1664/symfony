<?php

namespace ConvertCurrencyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/*
 * @todo Possibly add further functions to manage the report and data 
 * ether add to it or allow for setting different base currencies.
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @todo Display the data in a table or display in another way.
     */
    public function indexAction()
    {
        
        $table = $this->get('convert_currency.transactontable');
        $merchant = $table->getMerchant(2);
        $data = $merchant->getTransactions();
        
        $currencyConverter = $this->get('convert_currency.convert');
        
        for($i=0;$i<sizeof($data);$i++){

                $data[$i][2] = $currencyConverter->convert($data[$i][2]);
        }
        
        return $this->render('ConvertCurrencyBundle:Default:index.html.twig');
    }
}
