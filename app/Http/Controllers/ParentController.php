<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\ClassModel;
use App\Models\User;

class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title'] = 'Parent List';
        return view('admin.parent.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add new Parent';
        return view('admin.parent.add', $data);
    }

    public function insert(Request $request)
    {
        //dd($request->hasFile('photo_pic'));
        $parent = new User;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->mobile_number = trim($request->mobile_number);
        if ($request->hasFile('image')) {
            $parent->photo_pic = $request->file('image')->store('images', 'public');
        }   
        $parent->occupation = trim($request->occupation);
        $parent->adresse = trim($request->adresse);
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        $parent->password = hash::make($request->password);
        $parent->user_type = 4;
        $parent->save();

        return redirect('admin/parent/list')->with('success','Parent Successfully Created');

    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) 
        {
            $data['header_title'] = 'Edit Parent';
            return view('admin.parent.edit', $data);
        }else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        //dd($request->hasFile('image'));
        $parent = User::getSingle($id);;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->mobile_number = trim($request->mobile_number);
        /*if ($request->hasFile('image')) {
            $parent->photo_pic = $request->file('image')->store('images', 'public');
        }*/
        if(!empty($request->file('image')))
        {
            if(!empty($parent->getProfile()))
            {
                unlink ('upload/profile/'.$parent->photo_pic);
            }

            $ext = $request->file('image')->getClientOriginalExtension();
            $file = $request->file('image');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$filename);
            $parent->photo_pic = $filename;
        }

        $parent->occupation = trim($request->occupation);
        $parent->adresse = trim($request->adresse);
        $parent->status = trim($request->status);
        $parent->save();

        return redirect('admin/parent/list')->with('success','Parent Successfully Update');

    }

    public function delete($id)
    {
        $student = User::getSingle($id);
        $student->is_delete = 1;
        $student->save();

        return redirect('admin/parent/list')->with('success',"Parent Successfully deleted ");

    }

    public function myStudent($id)
    {
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['header_title'] = 'Parent Student List';
        return view('admin.parent.my_student', $data);
        
    }

    public function assign_student($id)
    {
        $data['parent_id'] = $id;
        $data['getClass'] = ClassModel::getClass();
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['header_title'] = 'Assign Parent to Student';
        return view('admin.parent.assign_student', $data);
    }
}
