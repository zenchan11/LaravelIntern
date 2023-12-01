<?php
namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;

Interface BlogRepositoryInterface{
	public function allBlogs();
	public function storeBlogs($request);
	public function getBlogUserId(String $id);
	public function storeUser($request);
	public function storeAdminUser($request);
	public function updateBlog($blog,$image);
	public function changeImageName($request);

}