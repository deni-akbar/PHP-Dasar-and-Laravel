<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel
{
    public function model(array $row)
    {
        return new Employee([
           'name'     => $row[0],
           'email'    => $row[1], 
           'company_id' => $row[2],
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }
}