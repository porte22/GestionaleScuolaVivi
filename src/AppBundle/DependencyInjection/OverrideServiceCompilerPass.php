<?php
/**
 * Created by PhpStorm.
 * User: Edimotive
 * Date: 09/10/2018
 * Time: 10:21
 */

namespace AppBundle\DependencyInjection;



use AppBundle\EventListener\AuthenticationListener;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class OverrideServiceCompilerPass implements CompilerPassInterface {

    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('fos_user.listener.authentication');
        $definition->setClass(AuthenticationListener::class);
    }

}