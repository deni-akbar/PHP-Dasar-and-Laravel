<?php

namespace App\Http\Controllers;

use App\Interfaces\CompanyInterface;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller {
    private $companyInterface;

    public function __construct(CompanyInterface $companyInterface) {
        $this->companyInterface = $companyInterface;
    }

    public function index() {
        $companys = $this->companyInterface->getAllCompanys();
        return view('companys.index', compact('companys'));
    }

    public function create() {
        return view('companys.create');
    }

    public function store(CompanyRequest $request) {
        try {
            $company = $this->companyInterface->createCompany($request);
            if ($company) {
                return redirect()->route('companies.index')->with('success', 'company added successfully');
            } else {
                return back()->with('failed', 'Failed');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function show($id) {
        try {
            $company = $this->companyInterface->getCompanyById($id);
            if ($company) {
                $isView = true;
                return view('companys.create', compact('company', 'isView'));
            } else {
                return redirect('companys.index')->with('failed', 'Failed! no company found');
            }
        } catch (Exception $e) {
            return redirect('companys.index')->with('failed', $e->getMessage());
        }
    }

    public function edit($id) {
        try {
            $company = $this->companyInterface->getCompanyById($id);
            if ($company) {
                $isEdit = true;
                return view('companys.create', compact('company', 'isEdit'));
            } else {
                return redirect('companys.index')->with('failed', 'Failed');
            }
        } catch (Exception $e) {
            return redirect('companys.index')->with('failed', $e->getMessage());
        }
    }

    public function update(CompanyRequest $request, $id) {
        try {
            $company = $this->companyInterface->updateCompany($request, $id);
            if ($company) {
                return redirect()->route('companies.index')->with('success', 'successsss');
            } else {
                return back()->with('failed', 'failedddd');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $company = $this->companyInterface->deleteCompany($id);
            if ($company) {
                return redirect()->route('companies.index')->with('success', 'suceeeessssssss');
            } else {
                return back()->with('failed', 'failedddddd');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function find(Request $request)
    {
        $term = trim($request->q);

        if($term){
            $companys = $this->companyInterface->getCompanysByname($term);
        }else{
            $companys = $this->companyInterface->getAllCompanys();
        }
        
        $formatted_tags = [];

        foreach ($companys as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }
        // dd($formatted_tags);
        return response()->json($formatted_tags);
    }

}