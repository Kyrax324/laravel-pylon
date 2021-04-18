<?php

namespace Pylon\Traits\Responses;

use Symfony\Component\HttpFoundation\Response;

trait ApiResponser{

	public function successResponse( $message = null, $result = null, $code = Response::HTTP_OK )
	{
		return response()->json([
			'status'=> $code, 
			'message' => $message, 
			'result' => $result
		], $code);
	}

	public function errorResponse( $message = null, $error = "ERROR", $code)
	{
		return response()->json([
			'status'=> $code,
			'error' => $error,
			'message' => $message
		], $code);
	}
}