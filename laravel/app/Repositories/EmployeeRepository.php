<?php

namespace App\Repositories;

use App\Interfaces\EmployeeInterface;
use App\Models\Employee;
use App\Models\Image;

class EmployeeRepository implements EmployeeInterface {

    public function getAllEmployees() {
        return Employee::latest()->paginate(5);
    }

    public function createEmployee($request) {

        return Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id,
        ]);
    }

    public function getEmployeeById($id) {
        return Employee::find($id);
    }

    public function updateEmployee($request, $id) {
        $employee = Employee::find($id);
        if ($employee) {
            $employee['name'] = $request->name;
            $employee['email'] = $request->email;
            $employee['company_id'] = $request->company_id;
            $employee->save();
            return $employee;
        }
    }

    public function deleteEmployee($id) {
        $employee = Employee::find($id);
        if ($employee) {
            return $employee->delete();
        }
    }

    public function getEmployeeByCompany($companyId) {
        return Employee::where('company_id',$companyId)->get();
    }
    
}