<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Dotenv\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::all();
        return response()->view('cms.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=new Country();
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all() ,[

        ]);

        if(! $validator->fails()){
            $countries = new Country();
            $countries->country_name = $request->get('country_name');
            $countries->code = $request->get('code');
            $isSaved = $countries->save();
            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => "Created is Successfully"] ,200);
            }

        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);
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
        $countries=Country::findOrfail($id);
        return response()->view('cms.country.view',compact('countries'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries=Country::findOrfail($id);
        return response()->view('cms.country.edit',compact('countries'));
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
        $validator=Validator($request->all(),[
            'country_name'=>'required',
            'code'=>'required',

        ]);

        if(! $validator->fails()){
            $countries=Country::findOrfail($id);
            $countries->country_name=$request->get('country_name');
            $countries->code=$request->get('code');
            $isupdate=$countries->save();
           return ['redirect'=>route('countries.index')];

            if($isupdate){
                return response()->json(['icone'=>'success','title'=>'updateis success'],200);
            }
            else{
                return response()->json(['icon'=>'erorr', 'title'=>$validator->getMessageBag()->first()],400);
            }

        }
        else{

            return response()->json(['icon'=>'erorr','title'=>$validator->getMessageBag()->first()],400);
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
        $countries=Country::destroy($id);
        return response()->json(['icon'=>'success','title'=>'delet successfully'],200);
    }
}