<?php

namespace App\Imports;

use App\Attendance;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use \PhpOffice\PhpSpreadsheet\Shared\Date;

class AttendancesImport extends DefaultValueBinder implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

            $user=User::where('employee_id',$row['user_id'])->first();
            //dd($user);
           // dd(count($user));
            if(!empty($user)) {
                $attendance = Attendance::where('user_id', $user->id)->where('date', Date::excelToDateTimeObject($row['date']))->exists();
                if (!$attendance) {
                    return new Attendance([
                        'user_id' => $user->id,
                        'date' => Date::excelToDateTimeObject($row['date']),
                        'in_time' => $row['in_time'],
                        'out_time' => $row['out_time'],
                        'status' => $row['status'],
                         session()->flash('success','Attendance Uploaded Successfully'),

                    ]);
                }
                else{

                    session()->flash('error','Attendance Already Exists of Users');
                }
            }




    }
}
