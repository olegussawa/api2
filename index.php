<?php
//включаем режим строгой типизации
declare(strict_types=1);

header('Content-type:application/json;charset=UTF-8');

//включаем автозагрузку
spl_autoload_register(function($class){
    require __DIR__."/core/$class.php";
});

//вызываем обработчик ошибок
//set_error_handler("errorHandler::handle_error");
set_exception_handler("errorHandler::error");



//разбиваем адрес
$parts=explode('/',$_SERVER['REQUEST_URI']);



//если в адресе не products выводим ошибку страница не найдена
if($parts[2]!='products'){
    http_response_code(404);exit;
}

//если в адресе нет номера productа присваиваем id null
$id=$parts[3] ?? null;



//подключаемся к базе данных
 $database=new Database;


$gateway=new ProductGateway($database);

//вызываем контроллер
$controller=new ProductController($gateway);
$controller->processrequest($_SERVER['REQUEST_METHOD'],$id);




