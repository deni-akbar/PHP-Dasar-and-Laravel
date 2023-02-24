<?php

namespace App\Repositories;

use App\Interfaces\CompanyInterface;
use App\Models\Company;
use App\Models\Image;

class CompanyRepository implements CompanyInterface {

    public function getAllCompanys() {
        return Company::latest()->paginate(5);
    }

    public function getCompanysByname($key) {
        return Company::where('name','LIKE',"%$key%")->get();
    }

    public function createCompany($request) {
        $name="";
            if ($logo = $request->file('logo')) {
                $path = $logo->store('company');
                $name = $logo->getClientOriginalName();
            }

        return Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $name,
            'website' => $request->website,
        ]);
    }

    public function getCompanyById($id) {
        return Company::find($id);
    }

    public function updateCompany($request, $id) {
        $name="";
        if ($logo = $request->file('logo')) {
            $path = $logo->store('company');
            $name = $logo->getClientOriginalName();
        }
        $company = Company::find($id);
        if ($company) {
            $company['name'] = $request->name;
            $company['email'] = $request->email;
            $company['logo'] = $name;
            $company['website'] = $request->website;
            $company->save();
            return $company;
        }
    }

    public function deleteCompany($id) {
        $company = Company::find($id);
        if ($company) {
            return $company->delete();
        }
    }
}