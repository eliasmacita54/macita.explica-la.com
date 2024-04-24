<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserController extends Controller
{
    
    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->user_type == 3){
            return view('student.my_account', $data);
        }
        else if(Auth::user()->user_type == 4){
            return view('parent.my_account', $data);
        }
        
    }
    public function UpdateMyAccountAdmin(Request $request)
    { 
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' .$id
            ]);

        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);

        //$user->user_type = 1;
        $admin->save();

        return redirect()->back()->with('success', "Account sucessfully updated");
    }
    
    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email, '.$id,
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

        $teacher->marital_status = trim($request->marital_status);
        $teacher->address = trim($request->address);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_expirience = trim($request->work_expirience);
        $teacher->email = trim($request->email);
       
        $teacher->user_type = 2;
        $teacher->save(); // Save the student record to the database

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Account Updated successfully');

    }

    public function UpdateMyAccountParent(Request $request)
    {
        {
            $id = Auth::user()->id;
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
            $student->email = trim($request->email);
            $student->user_type = 4;
            $student->save();
    
        $student->save(); // Save the student record to the database

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Account Updated successfully');

        }
    }

    public function UpdateMyAccountStudent(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users',
            'weight' => 'max:10',
            'blood_group' => 'max:10',
            'mobile_number' => 'max:15|min:8',
            'caste' =>'max:50',
            'religion' =>'max:50',
            'height' => 'max:10',
            ]);
      
    $student = new User;
    $student->name = trim($request->name);
    $student->last_name = trim($request->last_name);
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
    $student->blood_group = trim($request->blood_group);
    $student->height = trim($request->height);
    $student->weight = trim($request->weight);
    $student->email = trim($request->email); 
    $student->user_type = 3;
    $student->save(); //student record to the database

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Account Updated successfully');

    }
    
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', " Password successfully updated");
        }
        else
        {
            return redirect()->back()->with('error', "Old Password is not correct");
        }
    }

}
