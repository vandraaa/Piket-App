<?php

namespace App\Exports;

use App\Models\Laporan_rplc;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanRPLCExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Laporan_rplc::all();
    }

    public function headings(): array {
        return [
            'tanggal',
            'hari',
            'siswa_1',
            'status_1',
            'siswa_2',
            'status_2',
            'siswa_3',
            'status_3',
            'siswa_4',
            'status_4',
            'siswa_5',
            'status_5',
        ];
    }

    public function map($row): array
    {
        // Exclude id, created_at, and updated_at columns from the exported data
        return [
            $row->tanggal,
            $row->hari,
            $row->siswa_1,
            $row->status_1,
            $row->siswa_2,
            $row->status_2,
            $row->siswa_3,
            $row->status_3,
            $row->siswa_4,
            $row->status_4,
            $row->siswa_5,
            $row->status_5,
        ];
    }
}
