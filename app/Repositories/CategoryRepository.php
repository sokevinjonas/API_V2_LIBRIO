<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interface\CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    /**
     * Create a new class instance.
     */

    function indexCategories(){
    // dd("liste des categories");
        return Category::latest()->get();     
    }

    function createCategory(array $data){
        // dd($data);
        return Category::create($data);
    }

    function updateCategory(array $data, $category)
    {
        
    }

    function deleteCategory($category){
        return $category->delete();
    }

}
