<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmployeeApiController extends Controller
{

    public function index($id)
    {
        // Find the company by ID
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Company not found.'], 404);
        }

        // Get employees of the found company
        $employees = Employee::where('company_id', $company->id)->get();

        return response()->json(['company_name' => $company->name, 'employees' => $employees], 200);
    }

    public function storeEmp(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        // Find the company by ID
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Company not found.'], 404);
        }

        // Create a new employee
        $employee = new Employee($validatedData);
        $employee->company_id = $company->id;
        $employee->save();

        return response()->json(['message' => 'Employee added successfully', 'employee' => $employee], 201);
    }


}
