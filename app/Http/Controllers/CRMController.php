<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Policy;
use App\Models\DemageReport;
use App\Models\Announcement;
use Illuminate\Http\Request;


use function Ramsey\Uuid\v1;

class CRMController extends Controller
{
    public function create_department(Request $request)
    {
        $department = new Department();
        $department->department_name = $request->department_name;
        $department->description = $request->description;
        $department->save();
        return response()->json([
            'Department' => $department
        ]);
    }

    public function get_department()
    {
        $dapartment = Department::all();
        return response()->json([
            'Department' => $dapartment
        ]);
    }

    public function create_employee(Request $request)
    {
        $user = new Employee;
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        $user['password'] = $request->password;
        $user['employee_id'] = $request->employee_id;
        $user['department_id'] = $request->department_id;
        $user['status'] = 1;
        $user['created_by'] = $request->created_by;
        $user['phone'] = $request->phone;
        $user->save();
        return response()->json([
            'employees' => $user,
            'message'=>'Employee Create Successfull!'
        ]);
    }

    public function get_employee()
    {
        return response()->json([
            'employee' => Employee::with(['department' => function ($query) {
                $query->select('id', 'department_name');
            }])->get()
        ]);
    }
    
    public function delete_employee($id)
    {
        $data = Employee::find($id);
        $data->delete();
        return response()->json([
            'employees' => $data
        ]);
    }

    public function edit_employee(Request $request, $id)
    {
        $update = Employee::where('id', $id)->update($request->all());
        return response()->json([
            'employees' => $update,
            'message' => 'Employee updated successfully !'
        ]);
    }

    public function delete_department($id)
    {
        $data = Department::find($id);
        $data->delete();
        return response()->json([
            'message' => 'Delete Data successfully !!'
        ]);
    }

    public function create_announcment(Request $request)
    {
        $data = new Announcement;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['department_id'] = $request->department_id;
        $data['created_by'] = $request->created_by;
        $data->save();

        return response()->json([
            'announcements' => $data,
            'message' => 'Announcement Created Successfully !!'

        ]);
    }

    public function login(Request $request)
    {
        $login = Employee::where(['employee_id' => $request['employee_id'], 'password' => $request['password']])->get()->toArray();
        if (count($login)>0) {
            return response()->json([
                'message' => 'Login Successfully !!',
             ]);
        }
        else{
            return response()->json([
                'message' => 'Invalid Login !!'
            ]);
        }
        
    }


    public function get_employee_profile($id){
        $data = Employee::find($id);
        return response()->json([
            'employees' => $data,
            'message' => 'Employee Detail !!'

        ]);
    }

    public function get_team(){
       $team = Employee::all();
       return response()->json([
        'employees' => $team,
        'message' => 'Get Team Detail !!'
       ]);
    }


    public function demage_report(Request $request){
        // echo "<pre>";
        // print_r($request);die;
        $user = new DemageReport;
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['phone'] = $request->phone;
        $user['email'] = $request->email;
        $user['location'] = $request->location;
        $user['department'] = $request->department;
        $user['title'] = $request->title;
        $user['address'] = $request->address;
        $user['date_of_incident'] = $request->date_of_incident;
        $user['time_of_incident'] = $request->time_of_incident;
        $user['reported_date'] = $request->reported_date;
        $user['reported_time'] = $request->reported_time;
        $user['police_report'] = $request->police_report;
        $user['reporting_officer_name'] = $request->reporting_officer_name;
        $user['station_phone'] = $request->station_phone;
        $user['police_phone'] = $request->police_phone;
        $user['status'] = $request->status;
        $user['last_known_location'] = $request->last_known_location;
        $user['description'] = $request->description;
        $user['resolution'] = $request->resolution;
        $user->save();
        return response()->json([
            'demage_reports' => $user,
            'message'=>'Report SuccessfullY'
        ]);


    }

    public function edit_department(Request $request, $id){
        $data = $request->all();
        $department_name = $data['department_name'];
        $description = $data['description'];
        Department::where('id',$id)->update(['department_name' => $department_name, 'description' => $description]);
        return response()->json([
            'message' => 'Department Updated Successfully !!'
        ]);
    }

    public function change_employee_password(Request $request, $id){
        $data = $request->all();
        $password = $data['password'];
        Employee::where('id',$id)->update(['password' => $password]);
        return response()->json([
            'message' => 'Employee Password Updated Successfully !!'
        ]);

    //  }else{
    //     return response()->json([
    //         'message' => 'Opps ! Could not Find id'
    //     ]);
    //  }
  }

  public function policy_create(Request $request)
    {
        $user = new Policy;
        $user['name'] = $request->name;
        $user['description'] = $request->description;
        if($user->save()){
        return response()->json([
            'policies' => $user
        ]);
    }else{
        return response()->json([
            'policies' => "Data can not be inserting !!"
        ]);
    }

    }


    public function policy_delete($id)
    {
        $data = Policy::find($id);
        if($data->delete()){
        return response()->json([
            'policies' => $data,
            'message' => 'Deleted data successfully !!'
        ]);
    }else{
        return response()->json([
            'message' => 'Can not be data deleted'
        ]);
    }
    
    }
    public function policy_edit(Request $request, $id){
        $data = $request->all();
        $name = $data['name'];
        $description = $data['description'];
        Policy::where('id',$id)->update(['name' => $name, 'description' => $description]);
        return response()->json([
            'message' => 'Policy Updated Successfully !!'
        ]);
    }
    public function get_policy(){        
        $data = Policy::all();
        return response()->json([
            'policy' => $data,
            'message' => 'Policy Details !!'

        ]);
    }

}
