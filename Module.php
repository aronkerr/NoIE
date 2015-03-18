<?php
namespace NoIE;

use NoIE\Model\Browser;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\MvcEvent;
use Zend\Console\Console;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig() {
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

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        if (!Console::isConsole()) {
            $eventManager = $e->getApplication()->getEventManager();
            $sharedManager = $eventManager->getSharedManager();

            // Check the browser and redirect if it is IE or old
            $sharedManager->attach('*', MvcEvent::EVENT_ROUTE, function ($e) {
                $serviceManager = $e->getApplication()->getServiceManager();
                $browserCheck = new Browser();

                $browser = $browserCheck->getBrowser();
                if ($browser['name'] == 'Internet Explorer') {
                    $response = $e->getResponse();
                    $response->setStatusCode(406);

                    $viewModel = $e->getViewModel();
                    $viewModel->setTemplate('error/406');
                }
            });
        }
    }
}