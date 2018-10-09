<?php

namespace AppBundle;

use AppBundle\DependencyInjection\OverrideServiceCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AppBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }


    /**
     *
     * This injects a Compiler Pass that is used to override the automatic login after registration of a new user
     * We have done this in order to disable the "by default" behaviour given that only admins can register users
     * and logging in into the newly created account automatically is just not a desired behaviour
     *
     * @param ContainerBuilder $container
     */
    public function build ( ContainerBuilder $container ) {

        parent ::build( $container );

        $container -> addCompilerPass( new OverrideServiceCompilerPass() );

    }

}