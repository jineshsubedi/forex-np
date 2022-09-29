<?php

namespace Jinesh\Forexnp\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForexnpController extends Controller
{
    public function index(Request $request)
    {
        $data['page'] = 1;
        $data['per_page'] = 20;
        $data['from'] = Date('Y-m-d');
        $data['to'] = Date('Y-m-d');
        $data['title'] = config('forex.title');
        return view('forex::index')->with('datas', $data);
    }
}
