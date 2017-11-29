<?php

require __DIR__ . '/core/libs/Loader.php'; // Подключаем автозагрузчик классов
//
// создаем экземпляр класса автозагрузчика
$loader = new core\libs\Loader();

// добавляем соответствующие нэймспэйсу директории
$loader->addNamespace('core\\libs',  realpath(__DIR__ . '/core/libs'));
$loader->addNamespace('core\\controllers',  realpath(__DIR__ . '/core/controllers'));
$loader->addNamespace('core\\base',  realpath(__DIR__ . '/core/base'));

// регистрируем автозагрузчик
$loader->register();

// регистрируем свой обработчик ошибок и исключений.
(new core\libs\ErrorHandler)->register();

// Роутинг
// Получаем имя контроллера и экшена из урла
$controllerName = core\libs\Url::getSegment(0);
$actionName = core\libs\Url::getSegment(1);

// Формируем имя контроллера
if(!isset($controllerName))
{
    $controller = 'core\controllers\ControllerMain';
}
else
{
    $controller = 'core\controllers\Controller'.ucfirst($controllerName);
}
// Формируем имя экшена
if(is_null($actionName))
{
    $action = 'actionIndex';
}
else
{
    $action = 'action'.ucfirst($actionName);
}

try
{
    if(!file_exists($controller.'.php'))
    {
        throw new Exception ('Not Found','404');
    }
    $controller = new $controller();
    
    if(!method_exists($controller, $action))
    {
        throw new Exception ('Not Found','404');
    }
    $controller->$action();
} 
catch (Exception $e)
{
    header("HTTP 1.1 ".$e->getCode()." ".$e->getMessage());
    die ('Page Not Found');
}
