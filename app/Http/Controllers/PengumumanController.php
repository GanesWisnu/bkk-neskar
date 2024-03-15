<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pengumuman;
use App\Exports\pengumumanExport;

class PengumumanController extends Controller
{

    public function pengumuman() {
        $data = Pengumuman::getPengumuman();
        return view('pages/admin/pengumuman/index', ['data' => $data]);
    }

    public function pengumumanExport() {
        return Excel::download(new pengumumanExport, 'pengumuman.xlsx');
    }

    public function createPengumuman(Request $request) {
        $newItem = [
            'nama' => $request->input('nama_pengumuman')
        ];
        $id = Pengumuman::addPengumuman($newItem);
        return redirect()->route('admin.pengumuman');
    }
}
