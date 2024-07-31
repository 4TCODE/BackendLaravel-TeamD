<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

use App\Models\Client;
use App\Models\category;
use App\Models\Products;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function index():View
    {
       
        return view("dashboard.welcome");
    }
}
