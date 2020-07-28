<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ReportController extends Controller
{
    public function index(){
       $users = DB::table('cities')
       ->orderBy('totalBooks','DESC')
       ->get();

       $tables = DB::table('users')
       ->orderBy('total_books','DESC')
       ->get();

       $sales = DB::table('products')
       ->orderBy('total_sales','DESC')
       ->get();
        

        

        return view('report.report', [
            'users' => $users,
            'tables' => $tables,
            'sales' => $sales
            ]);
    }

    
}
