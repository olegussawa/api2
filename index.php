<?php


//включаем режим строгой типизации
declare(strict_types=1);

//включаем автозагрузку
spl_autoload_register(function($class){
    require __DIR__."/core/$class.php";
});

header('Content-type:application/json;charset=UTF-8');

//разбиваем адрес
$parts=explode('/',$_SERVER['REQUEST_URI']);



//если в адресе не products выводим ошибку страница не найдена
if($parts[2]!='products'){
    http_response_code(404);exit;
}

//если в адресе нет номера productа присваиваем id null
$id=$parts[3] ?? null;

//вызываем контроллер
$controller=new ProductController;
$controller->processrequest($_SERVER['REQUEST_METHOD'],$id);








