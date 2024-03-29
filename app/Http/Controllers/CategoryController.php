<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
{
    $this->middleware(['role:admin']);
}

    public function index()
    {
        //
        $categories = Category::all();
        return view('category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:5'
        ]);
            $category = new Category();
            $category->name=request('name');
            $category->save();
            return redirect()->route('firstpage');
            

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //show ko m use
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        

        
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|min:5'
        ]);
            $category = Category::find($id);
            $category->name=request('name');
            $category->save();
            return redirect()->route('firstpage');
            

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

            $category = Category::find($id);
            $category->delete();

            return redirect()->back();

    }
}
