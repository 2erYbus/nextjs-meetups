<?php

namespace App\Exports;

use App\Models\Scraper;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvoicesExport implements FromCollection, WithHeadings, WithStyles
{
    public function headings(): array
    {
        return [
            '#',
            'Agent',
            'Phone Number',
            'Image',
        ];
    }
    public function collection()
    {
        return Scraper::all();
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }
}

// 'Agent Details',
//             'Phone Number',
//             'Data Quality',
//             'Status',
//             'Property Type',
//             'Year Built',
//             'Community',
//             'Lot Size',
//             'Mls Number',
//             'Image',