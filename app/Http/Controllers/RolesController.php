<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::paginate(10);
        return view("backend.role.index")->with("roles", $roles);
    }

    public function create(Request $request){
        // $role = Role::create($request->all());
        return view("backend.role.create");
    }
    public function store(Request $request){
        $this->validate(request(), [
            "name"=> "string|required|max:100",
            "jobTitle"=>"string|required",
            "description"=> "string|nullable",
            "status"=> "required",
        ]);
        $data= $request->all();
        $status = Role::create($data);
        if($status){
            request()->session()->flash("success","Lưu thành công");
        }else{
            request()->session()->flash("error","Đã có lỗi xảy ra, lưu không thành công");
        }
        return redirect()->route("roles.index");
    }
}
