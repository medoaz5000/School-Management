<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;




class StudentController extends Controller
{
    public function list()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = 'Student List';
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = 'Add new Student';
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        //dd($request->hasFile('photo_pic'));
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }

        if(!empty($request->file('image')))
        {
            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $student->photo_pic = $filename;
        }

        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success','Student Successfully Created');

    }

    public function edit($id)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) 
        {
            $data['header_title'] = 'Edit Student';
            return view('admin.student.edit', $data);
        }else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        /*request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);*/

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->religion = trim($request->religion);
        $student->caste = trim($request->caste);
        $student->mobile_number = trim($request->mobile_number);

        if(!empty($request->class_id))
        {
            $student->class_id = trim($request->class_id);
        }
        
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        
        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }

        if(!empty($request->file('image')))
        {
            if(!empty($student->getProfile()))
            {
                unlink ('upload/profile/'.$student->photo_pic);
            }

            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $student->photo_pic = $filename;
        }
        
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->password = hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success',"Student Successfully updated", $student);
    }

    public function delete($id)
    {
        $student = User::getSingle($id);
        $student->is_delete = 1;
        $student->save();

        return redirect('admin/student/list')->with('success',"Student Successfully deleted ");

    }


  
}
