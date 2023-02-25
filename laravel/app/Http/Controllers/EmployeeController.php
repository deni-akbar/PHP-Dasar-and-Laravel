<?php

namespace App\Http\Controllers;

use App\Interfaces\EmployeeInterface;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeImportRequest;
use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller {
    private $employeeInterface;

    public function __construct(EmployeeInterface $employeeInterface) {
        $this->employeeInterface = $employeeInterface;
    }

    public function index() {
        $employees = $this->employeeInterface->getAllEmployees();
        return view('employees.index', compact('employees'));
    }

    public function create() {
        return view('employees.create');
    }

    public function store(EmployeeRequest $request) {
        try {
            $employee = $this->employeeInterface->createEmployee($request);
            if ($employee) {
                return redirect()->route('employees.index')->with('success', 'employee added successfully');
            } else {
                return back()->with('failed', 'Failed');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function show($id) {
        try {
            $employee = $this->employeeInterface->getEmployeeById($id);
            if ($employee) {
                $isView = true;
                return view('employees.create', compact('employee', 'isView'));
            } else {
                return redirect('employees.index')->with('failed', 'Failed! no employee found');
            }
        } catch (Exception $e) {
            return redirect('employees.index')->with('failed', $e->getMessage());
        }
    }

    public function edit($id) {
        try {
            $employee = $this->employeeInterface->getEmployeeById($id);
            if ($employee) {
                $isEdit = true;
                return view('employees.create', compact('employee', 'isEdit'));
            } else {
                return redirect('employees.index')->with('failed', 'Failed');
            }
        } catch (Exception $e) {
            return redirect('employees.index')->with('failed', $e->getMessage());
        }
    }

    public function update(EmployeeRequest $request, $id) {
        try {
            $employee = $this->employeeInterface->updateEmployee($request, $id);
            if ($employee) {
                return redirect()->route('employees.index')->with('success', 'successsss');
            } else {
                return back()->with('failed', 'failedddd');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function destroy($id) {
        try {
            $employee = $this->employeeInterface->deleteEmployee($id);
            if ($employee) {
                return redirect()->route('employees.index')->with('success', 'suceeeessssssss');
            } else {
                return back()->with('failed', 'failedddddd');
            }
        } catch (Exception $e) {
            return back()->with('failed', $e->getMessage());
        }
    }

    public function cetak_pdf()
    {
        $employees = $this->employeeInterface->getAllEmployees();
 
    	$pdf = PDF::loadview('employees.pdf',['employees'=>$employees]);
    	return $pdf->download('laporan-employee-pdf'.date('ymdhis').".pdf");
    }

    public function import_employee(EmployeeImportRequest  $request){
        Excel::import(new EmployeeImport, $request->file('excel'));

        return back()->with('success', 'Data berhasil diimport!');
    }
}