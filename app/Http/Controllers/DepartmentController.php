<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Departments';
        $departments = new Department();
        $render = [];

        if(isset($request->name)){
            $departments=$departments->where('name','like','%'.$request->name.'%');
            $render['name'] = $request->name;
        }

        if(isset($request->status)){
            $departments=$departments->where('status',$request->status);
            $render['status'] = $request->status;
        }
        $departments = $departments->paginate(2);
        $departments = $departments->appends($render);
        $data['departments'] = $departments;
        return view("admin.department.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New Department';
        return view("admin.department.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $department = new Department();

        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        session()->flash('success','Department Stored Successfully');
        return redirect()->route('department.index');


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
        $data['title'] = 'Edit Department';
        $data['department'] = Department::findOrFail($id);
        return view('admin.department.edit',$data);
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
            'name' => 'required',
            'status' => 'required',
        ]);

        $department = Department::findOrFail($id);;

        $department->name = $request->name;
        $department->status = $request->status;
        $department->save();
        session()->flash('success','Department Updated Successfully');
        return redirect()->route('department.index');
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
