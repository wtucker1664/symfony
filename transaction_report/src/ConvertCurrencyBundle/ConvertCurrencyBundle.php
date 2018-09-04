<?php

namespace ConvertCurrencyBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use ConvertCurrencyBundle\DependencyInjection\OverrideControllerPass;

class ConvertCurrencyBundle extends Bundle
{
      public function build(ContainerBuilder $container)
  {
    parent::build($container);
    $container->addCompilerPass(new OverrideControllerPass());
  }
}
