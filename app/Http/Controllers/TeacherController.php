<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getTeacher();
        $data['header_title'] = "teacher List";
        return view('admin.teacher.list', $data);
    }
    public function add()
    {
      //  $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add teacher";
        return view('admin.teacher.add', $data);
    }

    public function insert(Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users','email' => 'max:50|min:4',
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50'
            ]);

        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Y-m-d-h-i') . Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }
        $teacher->Caste = trim($request->Caste);

        if(!empty($request->adminssion_date))
        {
            $teacher->adminssion_date = trim($request->adminssion_date);
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_expirience = trim($request->work_expirience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password); // Use bcrypt to hash the password
        $teacher->user_type = 2;
        $teacher->save(); // Save the student record to the database

        // Optionally, you can redirect or return a response
        return redirect('admin/teacher/list')->with('success', 'Teacher added successfully');
    }

        public function edit($id)
        {
            $data['getRecord'] = User::getSingle($id);
            if(!empty($data['getRecord']))
            {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit', $data);
        }
        else
        {
            abort(404);
        }

    }
        public function update($id,Request $request)
        {

        request()->validate([
            'email' => 'required|email|unique:users,email, ' .$id,
            'mobile_number' => 'max:15|min:8',
            'marital_status' => 'max:50',
            ]);

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->gender = trim($request->gender);

        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Y-m-d-h-i') . Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }
        $teacher->Caste = trim($request->Caste);

        if(!empty($request->adminssion_date))
        {
            $teacher->adminssion_date = trim($request->adminssion_date);
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_expirience = trim($request->work_expirience);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password); // Use bcrypt to hash the password
        $teacher->user_type = 2;
        $teacher->save(); // Save the student record to the database

        // Optionally, you can redirect or return a response
        return redirect('admin/teacher/list')->with('success', 'Teacher Updated successfully');

        }

        public function delete($id)
        {
            $getRecord = User::getSingle($id);
            if(!empty($getRecord))
            {
                $getRecord->is_delete = 1;
                $getRecord->save();
                return redirect()->back()->with('success', "Teacher Successfully Deleted");
            }
           else
           {
            abort(404);
           }
        }



}
