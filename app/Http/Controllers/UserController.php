<?php

namespace App\Http\Controllers;
use App\Department;
use App\Designation;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Users';
        $users= new User();
        $users= $users->with(['relDepartment','relDesignation']);
        $render=[];
        if(isset($request->name))
        {
            $users=$users->where('name','like','%'.$request->name.'%');
            $render['name']=$request->name;
        }
        if(isset($request->email))
        {
            $users=$users->where('email','like','%'.$request->email.'%');
            $render['email']=$request->email;
        }
        if(isset($request->type))
        {
            $users=$users->where('type','like','%'.$request->type.'%');
            $render['type']=$request->type;
        }
        if(isset($request->status))
        {
            $users=$users->where('status',$request->status);
            $render['status']=$request->status;
        }
        $users= $users->paginate(2);
        $users= $users->appends($render);
        $data['users'] = $users;
        $data['serial'] = $this->managePagination($users);
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New User';
        $data['departments'] = Department::where('status','Active')->pluck('name','id');
        $data['designations'] = [];
        return view('admin.user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'department_id'=>'required',
            'designation_id'=>'required',
            'contact_no'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed|min:6',
            'status'=>'required',
            'image' => 'mimes:jpeg'
        ]);
        $user = new User();
        $user->type= $request->type;
        $user->employee_id= 'EMP'.time();
        $user->department_id= $request->department_id;
        $user->designation_id= $request->designation_id;
        $user->name= $request->name;
        $user->dob= $request->dob;
        $user->contact_no= $request->contact_no;
        $user->address= $request->address;
        $user->email= $request->email;
        $user->password= bcrypt($request->password);
        $user->status= $request->status;

        $user->save();

        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->getClientOriginalExtension()=='jpg'){
                //dd($user->id . '.' . $image->getClientOriginalExtension());

                $image->move('user_images/', $user->id . '.' . $image->getClientOriginalExtension());
            }

        }
        session()->flash('success','User Stored Successfully');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(auth()->user()->type=='Admin'){
            $data['user']= User::with(['relPayroll','relDepartment','relDesignation'])
                ->where('id',$id)->first();
            $data['title'] = $data['user']->name.' '.'Profile';
            return view( 'admin.user.show',$data);

        }

        elseif(auth()->id()==$id){
            $data['user']= User::with(['relPayroll','relDepartment','relDesignation'])
                ->where('id',$id)->first();
            $data['title'] = $data['user']->name.' '.'Profile';
            return view( 'admin.user.show',$data);

        }
        return redirect()->back();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit User';
        $data['user'] = User::findOrFail($id);
        $data['departments'] = Department::where('status','Active')->pluck('name','id');
        $data['designations'] = Designation::where('department_id',$data['user']->department_id)->where('status','Active')
            ->pluck('name','id');
        return view('admin.user.edit',$data);
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
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'department_id'=>'required',
            'designation_id'=>'required',
            'contact_no'=>'required',
            'email'=>'required|unique:users,email,'. $id,
            'status'=>'required',
            'image' => 'mimes:jpeg'

        ]);
        $user = User::findOrfail($id);
        $user->type= $request->type;
        $user->employee_id= 'EMP'.time();
        $user->department_id= $request->department_id;
        $user->designation_id= $request->designation_id;
        $user->name= $request->name;
        $user->dob= $request->dob;
        $user->contact_no= $request->contact_no;
        $user->address= $request->address;
        $user->email= $request->email;
        if(isset($request->password))
        {
            $user->password= bcrypt($request->password);
        }
        $user->status= $request->status;
        $user->save();

        if($request->hasFile('image')){
            $image = $request->file('image');
            if($image->getClientOriginalExtension()=='jpg'){
                //dd($user->id . '.' . $image->getClientOriginalExtension());

                $image->move('user_images/', $user->id . '.' . $image->getClientOriginalExtension());
            }

        }


        session()->flash('success','User Updated Successfully');
        return redirect()->route('user.index');
    }

    function managePagination($obj)
    {
        $serial=1;
        if($obj->currentPage()>1)
        {
            $serial=(($obj->currentPage()-1)*$obj->perPage())+1;
        }
        return $serial;
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
    }
}
