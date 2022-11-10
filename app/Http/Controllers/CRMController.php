<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class CRMController extends Controller
{
    public function create_department(Request $request)
    {
        $department = new Department();
        $department->department_name = $request->department_name;
        $department->save();
        return response()->json([
            'Department' => $department
        ]);
    }

    public function get_department()
    {

        return response()->json([
            'Department' => Department::all()
        ]);
    }

    public function create_employee(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());die;
        $user = new Employee;
        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        $user['password'] = $request->password;
        $user['employee_id'] = $request->employee_id;
        $user['department_id'] = $request->department_id;
        $user['profile_img'] = $request->profile_img;
        $user['status'] = $request->status;
        $user['created_by'] = $request->created_by;
        $user->save();
        return response()->json([
            'employees' => $user
        ]);
    }

    public function get_employee()
    {

        return response()->json([
            'employee' => Employee::all()
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
        // Employee::where('id',$id)->first();
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
        $login = Employee::where(['employee_id' => $request['employee_id'], 'password' => $request['password']]);

        if ($login) {
            return response()->json([
                'message' => 'Login Successfully !!',
            ]);
        }
    }


}
