<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    //function to list all companies in database
    public function list(){
        $companies = Company::get();
        if($companies){
            return view('companies.listCompanies',[
                'companies' => $companies,
            ]);
        }
    }

    //function to show company with a specific id
    public function show($id){

//      $company=Company::where('id','=',$id)->first();
        $company=Company::find($id);
        $employees=User::where('company_id','=', $company->id)->get()->all();
        return view('companies.showcompany',[
            'company' => $company,
            'employees' => $employees,
        ]);
    }

    //function to return create company form
    public function create(){
        return view('companies.create');
    }

    //function to add company
    public function add(Request $request){

        //data validation
        $validated=Validator::make($request->all(),[
            'name'=>'required|max:50|min:3',
            'email'=>'required|email|max:100',
            'telephone'=>'required|min:11|numeric',
            'address'=>'required|max:250|min:5',
        ]);

        if($validated->fails()){
            return redirect('/companies/create')
                ->withErrors($validated)
                ->withInput();

        }

        $company = new Company();
        $company->name = $request->name;
        $company->email = $request->email;
        $company->telephone = $request->telephone;
        $company->address = $request->address;
        $company->save();
        return redirect('companies/list');

    }

    //function to return edit company
    public function edit($id){
        $company=Company::find($id);
        return view('companies.editCompany',[
            'company'=> $company
        ]);
    }

    //function to update company
    public function update($id,Request $request){

        //data validation
        $validated=Validator::make($request->all(),[
            'name'=>'required|max:50|min:3',
            'email'=>'required|email|max:100',
            'telephone'=>'required|min:11|numeric',
            'address'=>'required|max:250|min:5',
        ]);

        if($validated->fails()){
            return redirect('/companies/edit/'.$id)
                ->withErrors($validated)
                ->withInput();

        }
        $company=company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->telephone = $request->telephone;
        $company->address = $request->address;
        $company->save();
        return redirect('companies/list');

    }

    //function to delete company
    public function delete($id){
        $company=Company::find($id);
        $users=User::where('company_id','=',$id);
        $users->delete();
        $company->delete();
        return redirect('companies/list');
    }



}
