<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CagtegoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return response()->view('cms.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        $categories=Category::all();
        return response()->view('cms.category.create',compact('categories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validitor=Validator($request->all(),[
            'name'=>'required',
            'descrption'=>'required',
        ]);

        if(! $validitor->fails()){
                  $categories=new Category();

            $categories->name=$request->get('name');
            $categories->descrption=$request->get('descrption');
            $issave=$categories->save();
            // return ['redirect'=>route('')]
            if($issave){
                return response()->json(['icon'=>'success','title'=>'create successfully'],200);
            }



        }
        else{
            return response()->json(['icon'=>'erorr','title'=>$validitor->getMessageBag()->first()],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories=Category::findOrfail($id);
        return response()->view('cms.category.view',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::findOrfail($id);
        return response()->view('cms.category.edit',compact('categories'));
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
        $validitor=Validator($request->all(),[

        ]);

        if(! $validitor->fails()){
            $categories=Category::findOrfail($id);
            $categories->name=$request->get('name');
            $categories->descrption=$request->get('descrption');
            $isupdate=$categories->save();
            return (['redirect'=>route('categories.index')]);
            if($isupdate){
                return response()->json(['icon'=>'success','title'=>'create successfully'],200);

            }


        }else{
            return response()->json(['icon'=>'error','title'=>$validitor->getMessageBag()->first()],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories=Category::destroy($id);
        return response()->json(['icon'=>'success','title'=>'delet successfully'],200);
    }
}