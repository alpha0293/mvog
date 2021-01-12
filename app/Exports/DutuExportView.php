<?php
namespace App\Exports;

use App\Dutu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DutuExportView implements FromView
{
    public function view(): View
    {
        return view('admin.dutu.lenlop', [
            'lstlenlop' => Dutu::all(),
            'index' => 1,
        ]);
    }
}