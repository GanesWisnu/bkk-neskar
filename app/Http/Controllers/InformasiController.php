<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function getInformasi() {
        $data = [
            [
                "id" => "1",
                "judul" => "Lowongan Kerja",
                "isi" => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc. Sed auctor, ipsum id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc. Sed auctor, ipsum id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc. Sed auctor, ipsum id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc.</p>",
                "gambar_cover" => "https://via.placeholder.com/150",
                "tanggal" => "2022-01-01"
            ],
            [
                "id" => "2",
                "judul" => "Pengumuman",
                "isi" => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod, nunc id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc. Sed auctor, ipsum id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc. Sed auctor, ipsum id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc. Sed auctor, ipsum id tincidunt lacinia, nisl nunc aliquet nunc, nec aliquet nunc nunc ac nunc.</p>",
                "gambar_cover" => "https://via.placeholder.com/150",
                "tanggal" => "2022-01-01"
            ]
        ];

        return view('pages/admin/informasi/index', ['data' => $data]);
    }
}
