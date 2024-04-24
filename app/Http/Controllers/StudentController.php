<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Psy\Command\ListCommand\FunctionEnumerator;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }
    public function add()
    {
         $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add student";
        return view('admin.student.add', $data);
    }


    public function insert(Request $request)
{

    request()->validate([
        'email' => 'required|email|unique:users',
        'weight' => 'max:10',
        'blood_group' => 'max:10',
        'mobile_number' => 'max:15|min:8',
        'adminssion_date' => 'max:50',
        'roll_number' => 'max:50',
        'caste' =>'max:50',
        'religion' =>'max:50',
        'height' => 'max:10',
        ]);

    $student = new User;
    $student->name = trim($request->name);
    $student->last_name = trim($request->last_name);
    $student->admission_number = trim($request->admission_number);
    $student->roll_number = trim($request->roll_number);
    $student->class_id = trim($request->class_id);
    $student->gender = trim($request->gender);
    if(!empty($request->date_of_birth))
    {
        $student->date_of_birth = trim($request->date_of_birth);
    }

    if(!empty($request->file('profile_pic')))
    {
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Y-m-d-h-i') . Str::random(30);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $filename);

        $student->profile_pic = $filename;
    }
    $student->Caste = trim($request->Caste);

    if(!empty($request->adminssion_date))
    {
        $student->adminssion_date = trim($request->adminssion_date);
    }
    $student->blood_group = trim($request->blood_group);
    $student->height = trim($request->height);
    $student->weight = trim($request->weight);
    $student->email = trim($request->email);
    $student->password = Hash::make($request->password); // Use bcrypt to hash the password
    $student->user_type = 3;
    $student->save(); // Save the student record to the database

    // Optionally, you can redirect or return a response
    return redirect('admin/student/list')->with('success', 'Student added successfully');
}

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Edit student";
        return view('admin.student.edit', $data);
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
        'weight' => 'max:10',
        'blood_group' => 'max:10',
        'mobile_number' => 'max:15|min:8',
        'adminssion_date' => 'max:50',
        'roll_number' => 'max:50',
        'caste' =>'max:50',
        'religion' =>'max:50',
        'height' => 'max:10',
        ]);

    $student = User::getSingle($id);
    $student->name = trim($request->name);
    $student->last_name = trim($request->last_name);
    $student->admission_number = trim($request->admission_number);
    $student->roll_number = trim($request->roll_number);
    $student->class_id = trim($request->class_id);
    $student->gender = trim($request->gender);
    if(!empty($request->date_of_birth))
    {
        $student->date_of_birth = trim($request->date_of_birth);
    }

    if(!empty($request->file('profile_pic')))
    {
        if(!empty($student->getProfile()))
        {
            unlink('upload/profile/' .$student->profile_pic);
        }
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Y-m-d-h-i') . Str::random(30);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $filename);

        $student->profile_pic = $filename;
    }
    $student->Caste = trim($request->Caste);

    if(!empty($request->adminssion_date))
    {
        $student->adminssion_date = trim($request->adminssion_date);
    }
    $student->blood_group = trim($request->blood_group);
    $student->height = trim($request->height);
    $student->weight = trim($request->weight);
    $student->email = trim($request->email);
      if(!empty($request->password)){
    $student->password = Hash::make($request->password);
        }

    $student->user_type = 3;
    $student->save(); // Save the student record to the database

    // Optionally, you can redirect or return a response
    return redirect('admin/student/list')->with('success', 'Student Updated successfully');

    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success', "Student Successfully Deleted");
        }
       else
       {
        abort(404);
       }
    }
}
