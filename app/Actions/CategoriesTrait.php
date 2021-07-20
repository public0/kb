<?php

namespace App\Actions;

use App\Models\Category;

trait CategoriesTrait
{
    public function getCategoriesTree($parentID)
    {
        $result = [];
        $categories = Category::active()
            ->select('id', 'name')
            ->where('parent_id', $parentID)
            ->orderBy('name', 'ASC')
            ->get();

        foreach ($categories as $category) {
            $result[$category->id] = [
                'id' => $category->id,
                'name' => $category->name,
                'child' => $this->getCategoriesTree($category->id)
            ];
        }

        return $result;
    }
}
