<?php

namespace ContainerA3WNauq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTasksTreeService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Service\TasksTree' shared autowired service.
     *
     * @return \App\Service\TasksTree
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/TasksTree.php';

        return $container->privates['App\\Service\\TasksTree'] = new \App\Service\TasksTree(($container->privates['App\\Repository\\TaskRepository'] ?? $container->load('getTaskRepositoryService')));
    }
}
