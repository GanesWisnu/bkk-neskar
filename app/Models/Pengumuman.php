<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected static $data = [
        [
            "id" => 1,
            "nama" => "Pengumuman 1",
            "tanggal" => "2022-01-01",
        ]
    ];

    public static function getPengumuman() {
        return static::$data;
    }

    public static function addPengumuman($newItem) {
        $newItem['id'] = count(static::$data) + 1;
        $newItem['tanggal'] = date('Y-m-d');
        static::$data[] = $newItem;
        return $newItem['id'];
    }
}
