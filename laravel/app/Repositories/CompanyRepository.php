<?php

namespace App\Repositories;

use App\Interfaces\CompanyInterface;
use App\Models\Company;
use App\Models\Image;

class CompanyRepository implements CompanyInterface {

    public function getAllCompanys() {
        return Company::latest()->paginate(5);
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
        $company = Company::find($id);
        if ($company) {
            $company['name'] = $request->name;
            $company['email'] = $request->email;
            $company['logo'] = $request->logo;
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