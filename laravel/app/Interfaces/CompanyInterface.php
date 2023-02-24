<?php

namespace App\Interfaces;
use App\Http\Requests\CompanyRequest;

interface CompanyInterface {
    // interface get all postingan
    public function getAllCompanys();
    // interface create postingan
    public function createCompany(CompanyRequest $request);
    // interface get data by id
    public function getCompanyById($postId);
    // interface update data by id
    public function updateCompany(CompanyRequest $request, $postId);
    // interface delete data by id
    public function deleteCompany($postId);
}