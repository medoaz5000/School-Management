<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\User;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = 'Teacher List';
        return view('admin.teacher.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add new Teacher';
        return view('admin.teacher.add', $data);
    }


    public function insert()
    {
        
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) 
        {
            $data['header_title'] = 'Edit Teacher';
            return view('admin.teacher.edit', $data);
        }else {
            abort(404);
        }
    }
}
