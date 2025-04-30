<?php

namespace App\Imports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class GuestsImport implements ToModel, WithHeadingRow, WithValidation
{
    private $skippedRows = [];
    
    public function model(array $row)
    {
        $normalized = array_change_key_case($row, CASE_LOWER);
        
        if (!isset($normalized['nama']) || !isset($normalized['alamat'])) {
            $this->skippedRows[] = $row;
            return null;
        }

        return new Guest([
            'name'        => $normalized['nama'],
            'address'     => $normalized['alamat'],
            'unique_code' => $this->generateGuestCode($normalized['nama']),
        ]);
    }
    
    public function rules(): array
    {
        return [
            'nama' => 'required',
            'alamat' => 'required',
        ];
    }
    
    public function getSkippedRows()
    {
        return $this->skippedRows;
    }
    
    private function generateGuestCode($name)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
        $slug = preg_replace('/-+/', '-', $slug);
        $slugPart = substr($slug, 0, 3);
        $randomPart = mt_rand(1000, 9999);
        return strtoupper($slugPart) . $randomPart;
    }
}