<?php


namespace Modules\Response\Entities;


class Response implements ResponseInterface
{
    /**
     * @param $result
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message = ""): \Illuminate\Http\JsonResponse
   {
       $response = [
           'success' => true,
           'data'    => $result,
           'message' => $message,
       ];


       return response()->json($response, 200);

   }

    /**
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }
}
