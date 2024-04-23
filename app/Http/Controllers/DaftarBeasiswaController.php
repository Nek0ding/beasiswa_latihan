<?php

namespace App\Http\Controllers;

use App\Models\beasiswa;
use App\Models\daftar;
use Illuminate\Http\Request;

class DaftarBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beasiswa = beasiswa::get();
        $ipk_random = rand(20, 40) / 10;
        return view('daftar', compact('ipk_random', 'beasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $beasiswa = new daftar();
        $beasiswa->nama = $request->nama;
        $beasiswa->email = $request->email;
        $beasiswa->nomor_hp = $request->nomor;
        $beasiswa->semester = $request->semester;
        $beasiswa->ipk = $request->ipk_random;
        $beasiswa->pilihan_beasiswa = $request->pilihan_beasiswa;
        $beasiswa->status_pengajuan = "Belum Diverifikasi";
        $beasiswa->save();
        return redirect()->route('hasil.index')->with('message', 'ANDA BERHASIL MENDAFTAR');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
