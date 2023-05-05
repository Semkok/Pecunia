<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Transaction;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|mixed
     */
    public function index()
    {
        return view('category.index', [
            'categories' => Category::where('user_id', auth()->id())->orderBy('name', 'ASC')->get(),
            'transactions' => Transaction::where('user_id', auth()->id())->orderBy('category_id', 'DESC')->get(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|mixed
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response|mixed
     */
    public function store(StoreCategoryRequest $request)
    {
        /*Redirecting name collumn from table*/
        $category = new Category();
        $category->name = $request->name;
        $category->user_id = auth()->user()->id;
        $category->save();
        return redirect(route('transaction.create'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response|mixed
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response|mixed
     */
    public function edit($category)
    {
        return view('category.edit', [
            'category' => Category::where('id', $category)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response|mixed
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response|mixed
     */
    public function destroy($category)
    {
        Category::destroy($category);
        return redirect(route('category.index'))->with('message','Category deleted');
    }

//    public function average(){
//        $test = 3;
//        return view('category.index', compact('test'));
//    }
}
