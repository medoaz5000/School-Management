<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\SubjectModel;


class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = 'Subject List';
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Subject';
        return view('admin.subject.add', $data);
    }

    public function insert(Request $request)
    {
        $sub = new SubjectModel;
        $sub->name = trim(ucfirst($request->name));
        $sub->type= trim($request->type);
        $sub->status = trim($request->status);
        $sub->created_by = Auth::user()->id;
        $sub->save();
        
       return redirect('admin/subject/list')->with('success',"Subject Successfully Created "); 
       
    }

    public function edit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if (!empty($data['getRecord'])) 
        {
            $data['header_title'] = 'Edit Class';
            return view('admin.subject.edit', $data);
        }else {
            abort(404);
        }
        
    }

    public function update($id, Request $request)
    {
        $sub = SubjectModel::getSingle($id);
        $sub->name = $request->name;
        $sub->status = $request->status;
        $sub->save();
        
        return redirect('admin/subject/list')->with('success',"Class Successfully Updated "); 
        
    }

    public function delete($id)
    {
        $sub = SubjectModel::getSingle($id);
        $sub->is_delete = 1;
        $sub->save();

        return redirect('admin/subject/list')->with('success',"Subject Successfully Deleted ");
    }

}
