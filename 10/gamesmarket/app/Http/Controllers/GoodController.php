<?php

namespace App\Http\Controllers;

use App\Good;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Good::all();
        $data["goods"] = $goods;
        return view("admin.goods.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all();
        $data['categories'] = $categories;
        return view("admin.goods.create",$data);
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
            'price' => 'required|numeric',
            'category' => 'numeric',
        ]);
        $good = new Good();
        $good->name = $request->input('name');
        $good->description = $request->input('description');
        $good->price = $request->input('price');
        $good->category_id = $request->input('category');
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file->move(public_path() . '/img/goods',$request->file('photo')->getClientOriginalName());
            $good->photo = $request->file('photo')->getClientOriginalName();
        }
        $good->save();

        return redirect('/admin/goods');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Good  $good_id
     * @return \Illuminate\Http\Response
     */
    public function show($good_id)
    {
        try {
            $good = Good::findOrFail($good_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['good'] = $good;
        return view("admin.goods.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Good  $good_id
     * @return \Illuminate\Http\Response
     */
    public function edit($good_id)
    {
        try {
            $good = Good::findOrFail($good_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $data['good'] = $good;
        $categories = \App\Category::all();
        $data['categories'] = $categories;
        return view("admin.goods.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Good  $good_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $good_id)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' => 'required|min:20',
            'price' => 'required|numeric',
            'category' => 'numeric',
        ]);
        try {
            $good = Good::findOrFail($good_id);
        } catch (Exception $e) {
            return abort(404);
        }
        $good->name = $request->input('name');
        $good->description = $request->input('description');
        $good->price = $request->input('price');
        $good->category_id = $request->input('category');
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file->move(public_path() . '/img/goods',$request->file('photo')->getClientOriginalName());
            $good->photo = $request->file('photo')->getClientOriginalName();
        }
        $good->save();

        return redirect('/admin/goods/edit/'.$good_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Good  $good_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($good_id)
    {
        try {
            Good::destroy($good_id);
        } catch (Exception $e) {
            return abort(404);
        }

        return redirect('/admin/goods');
    }
}
