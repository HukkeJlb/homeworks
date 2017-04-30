<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data["categories"] = $categories;
        return view("admin.categories.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:20',
        ]);
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category_id
     * @return \Illuminate\Http\Response
     */
    public function show($category_id)
    {
        try {
            $category = Category::findOrFail($category_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['category'] = $category;
        return view("admin.categories.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category_id
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        try {
            $category = Category::findOrFail($category_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['category'] = $category;
        return view("admin.categories.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:30',
        ]);
        try {
            $category = Category::findOrFail($category_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/admin/categories/edit/'.$category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        try {
            Category::destroy($category_id);
        } catch (Exception $e) {
            return abort(404);
        }

        return redirect('/admin/categories');
    }
}
