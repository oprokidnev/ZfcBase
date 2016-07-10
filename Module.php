<?php

namespace ZfcBase;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }


    public function onBootstrap(\Zend\Mvc\MvcEvent $event)
    {
        \ZfcBase\Form\ProvidesEventsForm::$sharedEventManager = $event->getApplication()->getEventManager()->getSharedManager();
        \ZfcBase\InputFilter\ProvidesEventsInputFilter::$sharedEventManager = $event->getApplication()->getEventManager()->getSharedManager();
    }
}
