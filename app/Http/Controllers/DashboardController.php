<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\MsProduct;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = Login::count();
        $productCount = MsProduct::count();

        return view('dashboard', compact('userCount', 'productCount'));
    }
}
