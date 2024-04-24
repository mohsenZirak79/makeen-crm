<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories(Request $request, $type)
    {
        switch ($type) {
            case 'subcategory':
                $categories = Category::whereNotNull('topic_id')->get();
                break;
            case 'main':
                $categories = Category::whereNull('topic_id')->get();
                break;
            default:
                $categories = Category::all();
                break;
        }

        return response()->json([
            'categories' => $categories
        ]);
    }
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return response()->json([
            'message' => 'category created successfully.',
            'category' => $category]);
    }
    public function show(Category $category)
    {
        return response()->json([
            'category' => $category]);
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        return response()->json([
            'message' => 'category updated successfully.',
            'category' => $category]);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'message' => 'category deleted successfully.',
            'category' => $category],204);
    }

    public function getSubcategories(Category $category)
    {
        $subcategories = Category::where('topic_id', $category->id)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }
}
