<?php

namespace App\Traits;
use Illuminate\Http\Response;

trait ApiResponseTrait
{
	public function successResponse($data){
		return response()->json([
			'status' => true,
			'code' => Response::HTTP_OK,
			'data' =>$data,
			'message' => 'created successfully'
		]);
	}

	public function failureResponse($data){
		return response()->json([
			'status' => true,
			'code' => Response::HTTP_NOT_FOUND,
			'data' =>$data,
			'message' => 'error occured'
		]);		
	}
}