<?php

namespace ContainerA3WNauq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_B76IeGeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.B76IeGe' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.B76IeGe'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'task' => ['privates', '.errored..service_locator.B76IeGe.App\\Entity\\Task', NULL, 'Cannot autowire service ".service_locator.B76IeGe": it needs an instance of "App\\Entity\\Task" but this type has been excluded in "config/services.yaml".'],
            'validator' => ['privates', 'debug.validator', 'getDebug_ValidatorService', false],
        ], [
            'entityManager' => '?',
            'task' => 'App\\Entity\\Task',
            'validator' => '?',
        ]);
    }
}