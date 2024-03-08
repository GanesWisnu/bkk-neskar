<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index() : View {
        return view('pages/admin/index');
    }

    public function userConfig() {
        $data = [
            [
                'id' => 12,
                'username' => "admin",
                'password' => "12345",
                'name' => "John Doe",
                'role' => "administrator",
                'status' => "active",
                'created_at' => "2022-01-01"
            ],
            [
                'id' => 13,
                'username' => "user",
                'password' => "12345",
                'name' => "Jane Doe",
                'role' => "administrator",
                'status' => "inactive",
                'created_at' => "2022-01-01"
            ]
        ];
        return view('pages/admin/user_config/index', ['data' => $data]);
    }

    public function perusahaan() {
        return view('pages/admin/perusahaan/index');
    }
}
