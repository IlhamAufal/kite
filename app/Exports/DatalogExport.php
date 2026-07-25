<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DatalogExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $from_date, $to_date;

    public function __construct($from_date = null, $to_date = null)
    {
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function collection()
    {
        $q = DB::table('loguser');
        if ($this->from_date && $this->to_date) {
            $q->whereBetween('login_at', [$this->from_date, $this->to_date]);
        }
        return $q->orderBy('login_at', 'desc')->get(['userid', 'login_at', 'status', 'ip_address', 'user_agent']);
    }

    public function headings(): array
    {
        return ['User ID', 'Login Date', 'Status', 'IP Address', 'User Agent'];
    }
}
