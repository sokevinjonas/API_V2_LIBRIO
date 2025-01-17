<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\LivresRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    protected $apiCategoryRepo;

    public function __construct(CategoryRepository $api_category_repo)
    {
        $this->apiCategoryRepo = $api_category_repo;
    }

    public function index()
    {
        $data = $this->apiCategoryRepo->indexCategories();

        return response()->json([
            'status' => 200,
            'data' => $data
        ],200);
    }
}
