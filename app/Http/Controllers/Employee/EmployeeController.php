<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
   public function index()
   {
    $employees = Employee::join('companies','companies.id','=','employees.company')
                ->select('companies.*','employees.*','companies.name as company_name')
                 ->paginate(5);

        return view('employee.index',compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   public function create()
   {
        $company = Company::all();
            // dd($employees);
        return view('employee.create',compact('company'));
   }

   public function store(Request $request)
   {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required'
    ]);
    $employee = new Employee();
    $employee->first_name = $request->first_name;
    $employee->last_name = $request->last_name;
    $employee->company = $request->company;
    $employee->email = $request->email;
    $employee->mobile = $request->mobile;
    $employee->save();
    return redirect()->route('employee')
                        ->with('success','Employee Detail created successfully.');
   }

   public function edit($id)
   {
    $employee = Employee::find($id);
    $company = Company::all();
    return view('employee.edit',compact('employee','company'));
   }

   public function update(Request $request, $id)
   {
    $employee = Employee::find($id);
       $employee->first_name = $request->first_name;
       $employee->last_name = $request->last_name;
       $employee->company = $request->company;
       $employee->email = $request->email;
       $employee->mobile = $request->mobile;
       $employee->save();
       return redirect()->route('employee')->with('message','Your data is updated successfully');
   }

   public function delete($id)
   {
    $employee = Employee::find($id);
       $employee->delete();
       return redirect()->back();
   }
}
