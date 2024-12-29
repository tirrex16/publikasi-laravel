<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::all(); // Mengambil semua data dari tabel 'artikel'
        return response()->json($artikels, 200); // Kembalikan data dalam format JSON
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_artikel' => 'required|string|unique:artikel,id_artikel',
            'id_author' => 'required|integer',
            'penulis_ke' => 'required|integer',
        ]);

        $artikel = Artikel::create($validatedData);
        return response()->json(['message' => 'Artikel berhasil dibuat', 'data' => $artikel], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        return response()->json($artikel, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'id_author' => 'sometimes|required|integer',
            'penulis_ke' => 'sometimes|required|integer',
        ]);

        $artikel->update($validatedData);
        return response()->json(['message' => 'Artikel berhasil diperbarui', 'data' => $artikel], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return response()->json(['message' => 'Artikel tidak ditemukan'], 404);
        }

        $artikel->delete();
        return response()->json(['message' => 'Artikel berhasil dihapus'], 200);
    }
}
