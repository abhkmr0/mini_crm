<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;

use App\Models\Company;

class CompanyApiController extends Controller
{
    public function show($id)
    {
        $company = Company::find($id);

        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        return response()->json(['company' => $company], 200);
    }

    public function store(StoreCompanyRequest $request)
    {
        $logoPath = $request->file('logo')->store('public/logos');
        $logoPath = str_replace('public/', '', $logoPath);
        $company = Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'logo' => $logoPath,
            'website' => $request->input('website'),
        ]);

        return response()->json(['company' => $company], 201);
    }
}
