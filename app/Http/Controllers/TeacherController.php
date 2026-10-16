<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Support\PanelData;

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

    // teacher/my_class : classes dyalo + subjects dyal kol classe
    public function myClass()
    {
        $classes  = PanelData::teacherClasses(Auth::id());
        $ids      = $classes->pluck('id')->all();

        $data['header_title']   = 'My Classes';
        $data['classes']        = $classes;
        $data['subjects']       = PanelData::subjectRows($ids)->groupBy('class_id');
        $data['studentCounts']  = PanelData::students($ids)->groupBy('class_id')->map->count();

        return view('teacher.my_class', $data);
    }

    // teacher/my_student : students dyal classes dyalo
    public function myStudent()
    {
        $ids = PanelData::teacherClasses(Auth::id())->pluck('id')->all();

        $data['header_title'] = 'My Students';
        $data['students']     = PanelData::students($ids);

        return view('teacher.my_student', $data);
    }
}
