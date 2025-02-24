<?php

namespace App\Http\Controllers;

use App\Models\CustomObject;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = 'All Categories';
        $viewData['subtitle'] = 'List of all categories';
        $viewData['objects'] = CustomObject::all();

        return view('object.index')->with('viewData', $viewData);
    }

    public function create()
    {
        $viewData = [];
        $viewData['title'] = 'Category';
        $viewData['subtitle'] = 'Form';

        return view('object.create')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        CustomObject::validate($request);

        $newCustomObject = new CustomObject;
        $newCustomObject->setName($request->input('name'));
        $newCustomObject->setDescription($request->input('description'));

        $newCustomObject->save();

        return redirect()->route('object.index')->with('success', 'Category created successfully!');

    }

    public function show($id)
    {
        $viewData = [];
        $CustomObject = CustomObject::findOrFail($id);
        $viewData['title'] = $CustomObject->getName().' ';
        $viewData['subtitle'] = $CustomObject->getName().' - Category information';
        $viewData['object'] = $CustomObject;

        return view('object.show')->with('viewData', $viewData);
    }

    public function delete($id)
    {
        CustomObject::destroy($id);

        return redirect()->route('object.index')->with('success', 'Category deleted successfully!');
    }
}
