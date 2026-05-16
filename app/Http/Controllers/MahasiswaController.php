<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $datas = Mahasiswa::query();
        
        if($request->filled('search')) {
            $datas->where('nama','like','%'.$request->search.'%')
            ->orWhere('nim','like','%'.$request->search.'%');
        }

        $datas = $datas->paginate(10);

        return view('mahasiswa.index',compact('datas'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success','Data Berhasil Ditambahkan !');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show',compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit',compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success','Data Berhasil Diupdate !');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success','Data Berhasil Dihapus !');
    }

}
