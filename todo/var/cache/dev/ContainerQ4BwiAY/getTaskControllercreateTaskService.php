<?php

namespace ContainerQ4BwiAY;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTaskControllercreateTaskService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Pvsz2ki.App\Controller\TaskController::create_task()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Pvsz2ki.App\\Controller\\TaskController::create_task()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
            'validator' => ['privates', 'validator', 'getValidatorService', false],
        ], [
            'entityManager' => '?',
            'validator' => '?',
        ]))->withContext('App\\Controller\\TaskController::create_task()', $container);
    }
}
