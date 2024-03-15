<?php

namespace App\Http\Controllers;

// Excel Laravel
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

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
                'id' => '12',
                'username' => "admin",
                'password' => "12345",
                'name' => "John Doe",
                'role' => "administrator",
                'status' => "active",
                'created_at' => "2022-01-01"
            ],
            [
                'id' => '13',
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
        $data = [
            [
                "id" => "1",
                "kd_perusahaan" => "123",
                "nama_perusahaan" => "PT. ABC",
                "alamat" => "Jl. ABC No. 123",
                "telepon" => "081234567890"
            ],
        ];
        return view('pages/admin/perusahaan/index', ['data' => $data]);
    }

    public function lowongan() {
        $data = [
            [
                "id_lowongan" => "1",
                "nama_perusahaan" => "PT. ABC",
                "posisi" => "Software Engineer",
                "deskripsi" => "<ul><li>Memiliki pengalaman minimal 2 tahun</li><li>Menguasai bahasa pemrograman PHP, HTML, CSS, dan JavaScript</li><li>Menguasai framework Laravel</li></ul>",
                "jumlah_pelamar" => "0",
                "kriteria" => [1, 2, 3],
                "informasi_tambahan" => "Silahkan kirimkan CV dan portofolio ke email",
                "batas_waktu" => "2022-01-01",
            ]
        ];
        return view('pages/admin/lowongan/index', ['data' => $data]);
    }

    public function kriteria() {
        $data = [
            [
                "id" => 1,
                "nama" => "Nama",
                "tipe" => "text",
            ]
        ];
        return view('pages/admin/kriteria/index', ['data' => $data]);
    }

    public function pelamar() : view {
        $data = [
            [
                "id" => 1,
                "nama" => "Nama",
                "tipe" => "text",
            ]
        ];
        return view('pages/admin/pelamar/index', ['data' => $data]);
    }

    
}
