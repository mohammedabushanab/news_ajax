<?php

namespace App\Http\Controllers;

use App\Models\Artical;
use App\Models\Author;
use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;

class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexArtical($id){
        $articals=Artical::where('author_id',$id)->orderBy('id', 'DESC')->paginate(5);
        return response()->view('cms.artical.index',compact('articals','id'));
    }


    public function createArtical($id){
        $categoires=Category::all();
        $authors=Author::all();

        return response()->view('cms.artical.create',compact('categoires','authors','id'));
    }


    public function index()
    {
        $articals=Artical::orderBy('id', 'DESC')->get();
        return response()->view('cms.artical.index',compact('articals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoires=Category::all();
        $authors=Author::all();

        return response()->view('cms.artical.create',compact('categoires','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator(request()->all(),[

        ]);

        if(! $validator->fails()){
            $articals=new Artical();
            if(request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/artical', $imageName);

                $articals->image = $imageName;
            }

            $articals->title=$request->get('title');
            $articals->short_descrption=$request->get('short_descrption');
            $articals->full_descrption=$request->get('full_descrption');
            $articals->author_id=$request->get('author_id');
            $articals->category_id=$request->get('category_id');
            $issave=$articals->save();
            if($issave){
                return response()->json(['icon'=>'success','title'=>'create is successfully'],200);
            }
            else{
                return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);

            }


        }
        else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);
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
        $categoires=Category::all();
        $authors=Author::all();
        $articals=Artical::findOrfail($id);
        return response()->view('cms.artical.view',compact('categoires','authors','articals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoires=Category::all();
        $authors=Author::all();
        $articals=Artical::findOrfail($id);
        return response()->view('cms.artical.edit',compact('categoires','authors','articals'));
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
        $validator=Validator(request()->all(),[

        ]);

        if(! $validator->fails()){
            $articals=Artical::findOrfail($id);
            if(request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/artical', $imageName);

                $articals->image = $imageName;
            }

            $articals->title=$request->get('title');
            $articals->short_descrption=$request->get('short_descrption');
            $articals->full_descrption=$request->get('full_descrption');
            $articals->author_id=$request->get('author_id');
            $articals->category_id=$request->get('category_id');
            $upadte=$articals->save();
            return['redirect'=>route('articals.index')];
            if($upadte){
                return response()->json(['icon'=>'success','title'=>'create is successfully'],200);
            }
            else{
                return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);

            }


        }
        else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);
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
        $articals=Artical::destroy($id);
        return response()->json(['icon'=>'success','title'=>'delet successfully'],200);
    }
}
