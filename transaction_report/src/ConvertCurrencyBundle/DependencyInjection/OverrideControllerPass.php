<?php

namespace ConvertCurrencyBundle\DependencyInjection;
use ConvertCurrencyBundle\Services\TransactiontableService;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
class OverrideControllerPass implements CompilerPassInterface
{
  public function process(ContainerBuilder $container)
  {
   
    $definition = $container->register('convert_currency.transactontable',\ConvertCurrencyBundle\Services\TransactiontableService::class )->setPublic(true);
    $definition->addArgument(new Reference('service_container'));
    
    
    
    
  }
}