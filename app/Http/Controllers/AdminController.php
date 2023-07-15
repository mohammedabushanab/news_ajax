<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Country;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::with('user')->orderBy('id', 'DESC')->simplePaginate(7);
        return response()->view('cms.admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return response()->view('cms.admin.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator($request->all(),[
            // 'country_name'=>'required',
            // 'code'=>'required',

        ]);

        if(!$validator->fails()){
            $admins=new Admin();
            $admins->email=$request->get('email');
            $admins->password=Hash::make($request->get('password'));

            $issave=$admins->save();

            if($issave){
                $users=new User();

                if(request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                }


                $users->first_name=$request->get('first_name');
                $users->middel_name=$request->get('middel_name');

                $users->last_name=$request->get('last_name');
                $users->phone=$request->get('phone');

                $users->gender=$request->get('gender');

                $users->date_of_birthday=$request->get('date_of_birthday');

                // $users->image=$request->get('image');

                $users->country_id=$request->get('country_id');


                $users->actor()->associate($admins);
                $isSaved = $users->save();
                return response()->json(['icon' => 'success', 'title' => 'Created is Seccessfully'], 200);


            }

        else
        {
            return response()->json(['icon'=>'erorr','title'=>$validator->getMessageBag()->first()],400);
        }
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
        $users=User::all();
        $admins=Admin::findOrfail($id);
        return response()->view('cms.admin.view',compact('admins','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins=Admin::findOrfail($id);
        $users=User::all();
        $countries=Country::all();
        return response()->view('cms.admin.edit',compact('admins','users','countries'));
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
            // 'country_name'=>'required',
            // 'code'=>'required',

        ]);

        if(!$validator->fails()){
            $admins=Admin::findOrfail($id);
            $admins->email=$request->get('email');
            // $admins->password=Hash::make($request->get('password'));

            $issave=$admins->save();

            if($issave){
                $users=User::findOrfail($id);
                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                }
                $users->first_name=$request->get('first_name');
                $users->middel_name=$request->get('middel_name');

                $users->last_name=$request->get('last_name');
                $users->phone=$request->get('phone');

                $users->gender=$request->get('gender');

                $users->date_of_birthday=$request->get('date_of_birthday');

                // $users->image=$request->get('image');

                $users->country_id=$request->get('country_id');


                $users->actor()->associate($admins);
                $isSaved = $users->save();
                return ['redirect'=>route('admins.index')];

                return response()->json(['icon' => 'success', 'title' => 'Created is Seccessfully'], 200);


            }

        else
        {
            return response()->json(['icon'=>'erorr','title'=>$validator->getMessageBag()->first()],400);
        }
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
        $admins=Admin::destroy($id);
        return response()->json(['icon'=>'success','title'=>'delet successfully'],200);
    }
}
