<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    //function to show employee home page
    public function home(){
        $id=Auth::user()->id;
        $employee=User::find($id);
        return view('employees.home',[
            'employee'=>$employee
        ]);
    }

    //function to list all employees in database
    public function list(){
        $employees = User::get();
        if($employees){
            return view('employees.listEmployees',[
                'employees' => $employees,
            ]);
        }
    }

    //function to show employee with a specific id
    public function show($id){

//      $employee=User::where('id','=',$id)->first();
        $employee=User::find($id);
        if($employee){
            return view('employees.showEmployee',[
                'employee' => $employee,
            ]);
        }
    }

    //function to return create employee form
    public function create(){
        $companies=company::select('id','name')->get();
        return view('employees.create',[
            'companies'=>$companies,
            compact($companies)
        ]);
    }

    //function to add employee
    public function add(Request $request){

        //data validation
        $validated=Validator::make($request->all(),[
            'name'=>'required|max:50|min:3',
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:50|min:5',
            'phone'=>'required|min:11|numeric',
        ]);

        if($validated->fails()){
            return redirect('/employees/create')
                ->withErrors($validated)
                ->withInput();

        }

        $employee = new User();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->phone = $request->phone;
        $employee->company_id = $request->company_id;
        $employee->save();
        return redirect('employees/list');

    }

    //function to return edit company
    public function edit($id){
        $employee=User::find($id);
        return view('employees.editEmployee',[
            'employee'=> $employee
        ]);
    }

    //function to update employee
    public function update($id,Request $request){

        //data validation
        $validated=Validator::make($request->all(),[
            'name'=>'required|max:50|min:3',
            'email'=>'required|email|max:100',
            'phone'=>'required|min:11|numeric',
        ]);

        if($validated->fails()){
            return redirect('/employees/edit/'.$id)
                ->withErrors($validated)
                ->withInput();

        }
        $employee=User::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->save();
        return redirect('employees/list');

    }

    //function to delete employee
    public function delete($id){
        $employee=User::find($id);
        $employee->delete();
        return redirect('employees/list');
    }






}
