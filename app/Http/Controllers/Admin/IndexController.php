<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Culture;
use App\Models\Fertilizer;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller {
    public function __invoke() {
        $data = [];
        $data['fertilizers'] = Fertilizer::all()->count();
        $data['cultures'] = Culture::all()->count();
        $data['clients'] = Client::all()->count();
        $data['users'] = User::all()->count();
        return view('admin.index', compact('data'));
    }
}
