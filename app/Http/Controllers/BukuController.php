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
                return view('buku.create');
            }

    /**
     * Store a newly created resource in storage.
     */   
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'judul' => 'required|string|max:255',
                'penulis' => 'required|string|max:255',
                'harga' => 'required|numeric',
                'tgl_terbit' => 'required|date',
            ]);

            $tambah_buku = Buku::create([
                'judul' => $validatedData['judul'],
                'penulis' => $validatedData['penulis'],
                'harga' => $validatedData['harga'],
                'tgl_terbit' => $validatedData['tgl_terbit'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($tambah_buku) {
                return redirect('/buku')->with('success', 'Berhasil menambahkan data');
            } else {
                return back()->with('error', 'Data yang diinput gagal');
            }
        }

        private function getBuku($id)
        {
            return Buku::findOrFail($id);
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
        $buku = Buku::find($id);
        if ($buku) {
            $edit = Buku::find($id); // Mengambil data buku berdasarkan ID
            return view('buku.edit', compact('edit')); // Mengirim variabel $edit ke view
        } else {
            return redirect('/buku')->with('error', 'Data tidak ditemukan');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {

        $buku = Buku::find($id);
        if ($buku) {
            $buku->judul = $request->judul;
            $buku->penulis = $request->penulis;
            $buku->harga = $request->harga;
            $buku->tgl_terbit = $request->tgl_terbit;
            $buku->save();
            
            return redirect('/buku')->with('success', 'berhasil mengubah data');
        } else {
            return back()->with('error', 'Data tidak ditemukan');
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('/buku');
    }
}
