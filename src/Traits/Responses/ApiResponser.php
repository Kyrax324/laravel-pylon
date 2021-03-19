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

	public function errorResponse( $message = null, $code)
	{
		return response()->json([
			'status'=> $code,
			'message' => $message
		], $code);
	}

	public function exceptionCatcher($exception)
	{
		$message = $exception->getMessage();
		$code = $exception->getCode();

		// if is unhandleable , throw to server to handler
		if(!in_array($code, $this->catchableCode() )){
			throw $exception;
		}

		return self::errorResponse( $message, $code );
	}

	public function catchableCode(){
		return [ 400 ];
	}

}