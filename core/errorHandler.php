<?php


class errorHandler{


public static function error(Throwable $exception){
    http_response_code(505);
    echo json_encode([
        'code'=>$exception->getCode(),
        'message'=>$exception->getMessage(),
        'file'=>$exception->getFile(),
        'line'=>$exception->getLine()
    ]);
}

public static function handle_error(int $errno,string $errstr,string $errfile,int $errline){
    http_response_code(505);
    echo json_encode([
        
    ]);

    throw new ErrorException($errstr,0,$errno,$errfile,$errline);
}

}













?>