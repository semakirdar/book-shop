<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function detail($id)
    {
        $categories = Category::query()->where('parent_id', $id)->get();
        $parentCategory = Category::query()->where('id', $id)->first();
        return view('categoryDetail', [
            'categories' => $categories,
            'parentCategory' => $parentCategory
        ]);
    }

}
