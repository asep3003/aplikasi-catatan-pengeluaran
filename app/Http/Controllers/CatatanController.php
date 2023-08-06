<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catatans = Catatan::orderByDesc('id')->paginate(50);
        return view('catatan.index', compact('catatans'));
    }

    function daftar(Request $request) {
        // mark
        dd($request);
    }

    public function provinsi()
    {
        $url = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
        $response = Http::get($url);
        $data = $response->json();
        return view('provinsi', compact('data'));
    }

    public function kota($provinsiId)
    {
        $url = 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' . $provinsiId . '.json';
        $response = Http::get($url);
        $data = $response->json();
        return response()->json($data);
    }

    public function kecamatan($kotaId)
    {
        $url = 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/' . $kotaId . '.json';
        $response = Http::get($url);
        $data = $response->json();
        return response()->json($data);
    }

    public function kelurahan($kecamatanId)
    {
        $url = 'https://www.emsifa.com/api-wilayah-indonesia/api/villages/' . $kecamatanId . '.json';
        $response = Http::get($url);
        $data = $response->json();
        return response()->json($data);
    }

    // public function provinsi() {
    //     $url = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json';
    //     $response = Http::get($url);
    //     $provinsis = $response->json();

    //     return view('provinsi', compact('provinsis'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembayarans = Pembayaran::get();
        return view('catatan.create', compact('pembayarans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
