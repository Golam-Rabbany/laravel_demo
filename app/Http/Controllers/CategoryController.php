<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('category.index',[
            'all_categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request -> validate([
            'category_name' => 'required',
        ]);

        $category_name = Str::lower($request->category_name);
        if(Category::Where('category_name', '=', $category_name)->doesntExist()){
            Category::insert([
               'category_name' => $category_name,
               'created_at' => Carbon::now(),
               'added_by' => Auth::user()->id,
           ]);
       }else{
            return back()->with('InsErr', 'Already inserted');
       }
       return back()->with('InsAdded','inserted !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $single_info = Category::find($id);
        return view('category.edit',compact('single_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request -> validate([
            'category_name' => 'required',
        ],[
            'category_name.required' => 'enter name',
        ],
    );

        $category_name = Str::lower($request->category_name);
        Category::findOrFail($request -> category_id)->update([
            'category_name'=>$category_name,
        ]);
        return redirect('category/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }


    public function deleteCategory(){
        
        $all_trashed = Category::onlyTrashed()->get();
        return view('category.trashed',compact('all_trashed'));
    }

    public function restoreCategory($id){
        Category::withTrashed()->where('id',$id)->restore();
        return back();
    }

    public function vanishCategory($id){
        Category::withTrashed()->where('id',$id)->forceDelete();
        return back()->with('delDone', 'Delete successfully!!');
    }

    public function subcategory(Request $request){
        $request->validate([
        'category_id'=>'required',
        'category_id'=>'required',
        ]);
}




}
