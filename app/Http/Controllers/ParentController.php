<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{

    public function list(){
        $data['getRecord']= User::getParent();
        $data['header_title'] = "Parent List";
        return view('admin.parent.list', $data);

       
    }

    public function add()
    {
        $data['header_title'] = "add new Parent";
        return view('admin.parent.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:15|min:8',
            'address' => 'max:255',
            'occupation' => 'max:250'

            ]);

        $student = new User;
        $student->name = trim($request->name);
        //$student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);


        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhi') . Str::random(30);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->mobile_number = $request->mobile_number;
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password); // Use bcrypt to hash the password
        $student->user_type = 4;
        $student->save(); // Save the student record to the database

        // Optionally, you can redirect or return a response
        return redirect('admin/parent/list')->with('success', 'Parent added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
        $data['header_title'] = "Edit parent";
        return view('admin.parent.edit', $data);
    }
    else
    {
        abort(404);
    }
  }

  public function update($id,Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile_number' => 'max:15|min:8',
            'address' => 'max:255',
            'occupation' => 'max:250'
            ]);

    $student = User::getSingle($id);
    $student->name = trim($request->name);
    $student->last_name = trim($request->last_name);
    $student->gender = trim($request->gender);
    $student->occupation = trim($request->occupation);
    $student->address = trim($request->address);

    if(!empty($request->file('profile_pic')))
    {
        $ext = $request->file('profile_pic')->getClientOriginalExtension();
        $file = $request->file('profile_pic');
        $randomStr = date('Ymdhi') . Str::random(30);
        $filename = strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $filename);

        $student->profile_pic = $filename;
    }

        $student->mobile_number = $request->mobile_number;
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->user_type = 4;
        $student->save();

      if(!empty($request->password)){
    $student->password = Hash::make($request->password);
        }


    $student->save(); // Save the student record to the database

    // Optionally, you can redirect or return a response
    return redirect('admin/parent/list')->with('success', 'Student Updated successfully');

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
    public function myStudent($id)
    {
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSeachStudent'] = User::getSeachStudent();
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "Parent Student List";
        return view('admin.parent.my_student', $data);
    }

    public function AssignStudentParent($student_id, $parent_id)
    {
        $student = User::getSingle($student_id);
        $student-> parent_id = $parent_id;
        $student->save();

        return redirect()->back()->with('success',"Student Successfully Assign");
    }

    public function AssignStudentParentDelete($student_id)
    {
        $student = User::getSingle($student_id);
        $student-> parent_id = null;
        $student->save();

        return redirect()->back()->with('success',"Student Successfully Assign Deleted");
    }
    
    //parent side
    public function myStudentParent()
    {
        $id = Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "Parent student list";

        return view('parent.my_student', $data);
    }
    


}
