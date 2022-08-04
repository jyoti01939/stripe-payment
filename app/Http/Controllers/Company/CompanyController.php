<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(5);

        return view('company.index',compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Company::create($input);

        return redirect()->route('company')
                        ->with('success','Company Detail created successfully.');
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('company.edit',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'website' => 'required',
        ]);
        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $company->image = $profileImage ;
        }else{
            unset($company->image);
        }
        $company->save();
        return redirect()->route('company')
                        ->with('success','Company Detail updated successfully');
    }


    public function delete($id)
    {
        $company = Company::find($id);
        $company->delete();
       return redirect()->back()->with('success','Company Detail deleted successfully');

    }
}
