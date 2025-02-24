<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'All Categories';
        $viewData['subtitle'] = 'List of all categories';
        $viewData['categories'] = Category::all();

        return view('category.index')->with('viewData', $viewData);
    }

    public function create()
    {
        $viewData = [];
        $viewData['title'] = 'Category';
        $viewData['subtitle'] = 'Form';

        return view('category.create')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        Category::validate($request);

        $newCategory = new Category;
        $newCategory->setName($request->input('name'));
        $newCategory->setDescription($request->input('description'));

        $newCategory->save();

        return redirect()->route('category.index')->with('success', 'Category created successfully!');

    }

    public function show($id)
    {
        $viewData = [];
        $Category = Category::findOrFail($id);
        $viewData['title'] = $Category->getName().' ';
        $viewData['subtitle'] = $Category->getName().' - Category information';
        $viewData['category'] = $Category;

        return view('category.show')->with('viewData', $viewData);
    }

    public function delete($id)
    {
        Category::destroy($id);

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
