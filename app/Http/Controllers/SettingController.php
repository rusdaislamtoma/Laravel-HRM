<?php

namespace App\Http\Controllers;

use App\Designation;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajaxDesignationByDepartmentId($id){
        $data['designations'] = Designation::where(['department_id'=>$id,'status'=>'Active'])->pluck('name','id');
        return view('admin.setting.ajaxDesignationByDepartmentId',$data);

    }

    public function application_settings()
    {
        $data['title']='Edit company settings';
        $data['settings']['logo']= Setting::where(['type'=>'logo'])->first();
        $data['settings']['company_name']= Setting::where(['type'=>'company_name'])->first();
        return view('admin.setting.company_settings',$data);
    }
    public function update_application_settings(Request $request)
    {
        $request->validate([
            'logo' => 'mimes:png'
        ]);
        $setting= Setting::where('type','company_name')->first();
        $setting->value=$request->company_name;
        $setting->save();

       if($request->hasFile('logo'))
        {
            $setting= Setting::where('type','logo')->first();
            $old_file=$setting->value;
            unlink($old_file);

            $image= $request->file('logo');
            if($image->getClientOriginalExtension()=='png') {
                $image->move('assets', $image->getClientOriginalName());
                //dd('assets',$image->getClientOriginalName());
                $setting->value = 'assets/' . $image->getClientOriginalName();
                $setting->save();
             

            }
        }

        session()->flash('success','Company setting updated');
        return redirect()->back();

    }
}
