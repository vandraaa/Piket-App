<?php

namespace App\Exports;

use App\Models\Jadwal_rpla;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class JadwalRPLAExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    public function collection()
    {
        return Jadwal_rpla::all();
    }

    public function headings(): array
    {
        return [
            'Hari',
            'Siswa 1',
            'Siswa 2',
            'Siswa 3',
            'Siswa 4',
            'Siswa 5',
        ];
    }

    public function map($row): array
    {
        return [
            // You can modify the mapping here as per your requirement
            $row->hari,
            $row->siswa_1,
            $row->siswa_2,
            $row->siswa_3,
            $row->siswa_4,
            $row->siswa_5,
        ];
    }
}
