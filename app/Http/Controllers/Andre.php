<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Andre extends Controller
{
    public function getData()
    {
    // Logika untuk mendapatkan array data
    $dataBarang = [
        ['id' => 1, 'nama' => 'Beras Panda Wangi', 'harga' => 15000],
        ['id' => 2, 'nama' => 'Tepung Terigu', 'harga' => 20000],
        ['id' => 3, 'nama' => 'Baygon Cair', 'harga' => 13500],
        ['id' => 4, 'nama' => 'Penyedap', 'harga' => 3200],
        ['id' => 5, 'nama' => 'Minyak', 'harga' => 14000],
    ];
    
    return $dataBarang;
}

public function tampilkan(){
    $data = $this->getData();
    return view('Andre_view', compact('data'));
}

public function Andre_view()
{
    return view('Andre_view');
}

}
