<?php


namespace Modules\Response\Entities;


interface ResponseInterface
{
    public function sendResponse($result,$message);

    public function sendError($error, $errorMessages = [], $code = 404);

}
