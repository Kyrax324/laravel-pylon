<?php

namespace Pylon\Exceptions;

use Exception;

class BadRequestException extends Exception
{
	/**
	 * The additional data of the error.
	 *
	 * @var any
	 */
	public $values = null;

	/**
	 * The mechanized text in describing the error type.
	 *
	 * @var string
	 */
	public $error_type = "ERROR";

	/**
	 * Create a new exception instance.
	 *
	 * @param string $message
	 * @param string $status
	 * @return void
	 */
	public function __construct($message, $status = 400)
	{
		$this->message = $message;
		$this->status = $status;
	}

	/**
	 * Report the exception.
	 *
	 * @return bool|null
	 */
	public function report()
	{
		return true;
	}

	/**
	 * Render the exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function render($request)
	{
		if ($request->expectsJson()) {
			return $this->setJsonResponse();
		}

		return redirect()->back()
			->withInput()
			->withErrors($this->getMessage());
	}

	/**
	 * Set the additional data to be used for the response.
	 *
	 * @param  int  $values
	 * @return $this
	 */
	public function withValues($values)
	{	
		$this->values = $values;

		return $this;
	}

	/**
	 * Set the error type to be used for the response.
	 *
	 * @param  int  $status
	 * @return $this
	 */
	public function withErrorType($errorType)
	{
		$this->error_type = $errorType;

		return $this;
	}

	/**
	 * Render the HTTP response in JSON form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	protected function setJsonResponse()
	{	
		$response = [
			'error'   => $this->error_type,
			'message' => $this->getMessage(),
		];

		if($this->values){
			$response = array_merge($response, ['value' => $this->values ]);
		}

		return response()->json($response, $this->status);
	}
}
