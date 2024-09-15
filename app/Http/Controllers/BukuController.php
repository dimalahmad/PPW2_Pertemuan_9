<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $data_buku = Buku::all(); // Mendapatkan semua data buku
    $jumlah_buku = Buku::count(); // Menghitung jumlah total buku
    $total_harga = Buku::sum('harga'); // Menghitung total harga dari semua buku
    return view('buku.index', compact('data_buku', 'jumlah_buku', 'total_harga')); // Mengirimkan data buku, jumlah buku, dan total harga ke view
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
