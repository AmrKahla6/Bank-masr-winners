<?php

namespace App\Http\Controllers;

use App\Winner;
use App\Exports\UsersExport;
use App\Exports\WinnersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       $winners = Winner::latest()->get();
       $lastwinner = Winner::latest()->first();
       return view('import',compact('winners','lastwinner'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new UsersImport,request()->file('file'));

        return back();
    }


     /**
    * @return \Illuminate\Support\Collection
    */
    public function exportWinner()
    {
        return Excel::download(new WinnersExport, 'winners.xlsx');
    }
}
