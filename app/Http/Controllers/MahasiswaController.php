<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $query = Mahasiswa::query();
        if ($search) {
            $query->where('nama', 'like', "%$search%");
        }
        $mahasiswa = $query->orderBy('nim', 'desc')->get();

        return view('index', compact('mahasiswa', 'search'));
    }

    public function admin(Request $request)
    {
        $search = $request->query('search');
        $query = Mahasiswa::query();
        if ($search) {
            $query->where('nama', 'like', "%$search%");
        }
        $mahasiswa = $query->orderBy('nim', 'desc')->get();

        return view('admin', compact('mahasiswa', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'jurusan' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'usia' => 'required',
        ]);
        Mahasiswa::create($validated);

        return redirect('/');
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
        $edit = Mahasiswa::find($id);

        return view('edit')->with('edit', $edit);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $value = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'usia' => $request->usia,
        ];
        Mahasiswa::where('id', $id)->update($value);

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mahasiswa::where('id', $id)->first()->delete();

        return redirect('/admin');
    }
}
