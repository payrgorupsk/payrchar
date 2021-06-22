<?php

namespace App\Http\Controllers\sidebar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SidebarFooterController extends Controller
{
    public function about()
    {
        $data['menu'] = 'about';
        return view('sidebar.about', $data);
    }

    public function privacy()
    {
        $data['menu'] = 'privacy';
        return view('sidebar.privacy', $data);
    }

    public function terms()
    {
        $data['menu'] = 'terms';
        return view('sidebar.terms', $data);
    }
}
