<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Dotenv\Validator;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=City::all();
        return response()->view('cms.city.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return response()->view('cms.city.create',compact('countries'));
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
            'city_name'=>'required',
            'street'=>'required',
        ]);

        if(! $validitor->fails()){
            $cities=new City();
            $cities->city_name=$request->get('city_name');
            $cities->street=$request->get('street');
            $cities->country_id=$request->get('country_id');
            $issave=$cities->save();
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
        $cities=City::findOrfail($id);
        $countries=Country::all();
        return response()->view('cms.city.view',compact('cities','countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries=Country::all();
        $cities=City::findOrfail($id);
        return response()->view('cms.city.edit',compact('countries','cities'));
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
            'city_name'=>'required',
            'street'=>'required',
            // 'country_name'=>'required',

        ],[

        ]);

        if(! $validitor->fails()){
            $cities=City::findOrfail($id);
            $cities->city_name=$request->get('city_name');
            $cities->street=$request->get('street');
            $cities->country_id=$request->get('country_id');
            $isupdate=$cities->save();

            return ['redirect'=>route('cities.index')];
            if($isupdate){
                return response()->json(['icon'=>'success','title'=>'update is successfully'],200);
            }
        }
        else{
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
        $cities=City::destroy($id);
        return response()->json(['icon'=>'success','title'=>'delet successfully'],200);

    }
}