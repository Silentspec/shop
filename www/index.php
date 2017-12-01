<?php
session_start();
require __DIR__ . '/core/libs/Loader.php'; // Подключаем автозагрузчик классов
//
// создаем экземпляр класса автозагрузчика
$loader = new core\libs\Loader();

// добавляем соответствующие нэймспэйсу директории
$loader->addNamespace('core\\libs',  realpath(__DIR__ . '/core/libs'));
$loader->addNamespace('core\\controllers',  realpath(__DIR__ . '/core/controllers'));
$loader->addNamespace('core\\base',  realpath(__DIR__ . '/core/base'));
$loader->addNamespace('core\\models',  realpath(__DIR__ . '/core/models'));

// регистрируем автозагрузчик
$loader->register();
            
// Роутинг
// Получаем имя контроллера и экшена из урла
$controllerName = core\libs\Url::getSegment(0);
$actionName = core\libs\Url::getSegment(1);

// Формируем имя контроллера
$controller = core\libs\Url::getController($controllerName);
// Формируем имя экшена
$action = core\libs\Url::getAction($controller,$actionName);
// Создаем экземпляр класса контроллера
$controller = new $controller();
// вызываем нужный экшен
$controller->$action();