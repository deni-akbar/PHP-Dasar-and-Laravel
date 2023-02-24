<?php

namespace App\Interfaces;
use App\Http\Requests\EmployeeRequest;

interface EmployeeInterface {
    // interface get all postingan
    public function getAllEmployees();
    // interface create postingan
    public function createEmployee(EmployeeRequest $request);
    // interface get data by id
    public function getEmployeeById($postId);
    // interface update data by id
    public function updateEmployee(EmployeeRequest $request, $postId);
    // interface delete data by id
    public function deleteEmployee($postId);
}