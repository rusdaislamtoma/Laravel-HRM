<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Imports\AttendancesImport;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $data['title']='Attendances';
        $render=[];
        $attendance = new Attendance();
        $attendance= $attendance->with('relUser');
        if(isset($request->date))
        {
            $attendance=$attendance->where('date',$request->date);
            $render['date']=$request->date;
        }
        if(isset($request->status))
        {
            $attendance=$attendance->where('status',$request->status);
            $render['status']=$request->status;
        }
        $attendance= $attendance->orderBy('id','DESC');
        $attendance= $attendance->paginate(10);
        $attendance= $attendance->appends($render);
        $data['attendances']=$attendance;
        return view('admin.attendance.index',$data);
    }

    public function create(){
        $data['title']='Upload Attendance Sheet';
        return view('admin.attendance.create',$data);
    }
    public function store(Request $request){
      //  dd($request->all());
        Excel::import(new AttendancesImport,$request->file('attendance_file'));
        session()->flash('success','Attendance Uploaded Successfully');
        return redirect()->route('attendance.index');
    }


    public function show(Request $request,$user_id)
    {
        $user= User::findOrFail($user_id);
        $data['title']='Attendances';
        $render=[];
        $attendance = new Attendance();
       // $attendance= $attendance->with('relUser');
        $attendance=$attendance->where('user_id',$user_id);

        if(isset($request->start_date) && isset($request->end_date))
        {
            $attendance=$attendance->whereBetween('date',[$request->start_date,$request->end_date]);
            $render['start_date']=$request->start_date;
            $render['end_date']=$request->end_date;
        }elseif(isset($request->start_date))
        {
            $attendance=$attendance->where('date',$request->start_date);
            $render['start_date']=$request->start_date;
        }
        if(isset($request->status))
        {
            $attendance=$attendance->where('status',$request->status);
            $render['status']=$request->status;
        }
        $attendance= $attendance->orderBy('id','DESC');
        $attendance= $attendance->paginate(10);
        $attendance= $attendance->appends($render);
        $data['attendances']=$attendance;
        $data['user']=$user;
        return view('admin.attendance.show',$data);
    }
}
