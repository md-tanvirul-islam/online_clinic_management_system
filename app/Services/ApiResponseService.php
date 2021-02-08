<?php

namespace App\Services ;

class ApiResponseService
{
    
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
            'code' => 200,
        ];

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
            'code' => $code,

        ];

        // if(!empty($errorMessages)){
        //     $response['data'] = $errorMessages;
        // }

        return response()->json($response, $code);
    }
}

?>