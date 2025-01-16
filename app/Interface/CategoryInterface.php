<?php

namespace App\Interface;

interface CategoryInterface
{
    public function indexCategories();

    public function createCategory(array $data);

    public function updateCategory(array $data, $id);

    public function deleteCategory($id);
}
// 