<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $request->flash();
        $datas = Nilai::with('mahasiswa');
        if($request->filled('search'))
        {
            $datas->whereHas('mahasiswa',function($query)use($request){
                 $query->where('nama','like','%'.$request->search.'%')
                ->orWhere('nim','like','%'.$request->search.'%');
            })->orWhere('mata_kuliah','like','%'.$request->search.'%');
        }

        $datas = $datas->paginate(10);
        return view('nilai.index',compact('datas'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        return view('nilai.create',compact('mahasiswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah'  => 'required',
            'nilai'        => 'required|integer|min:0|max:100'
        ]);

        $data = $request->all();
        $data['klasifikasi'] =  $this->hitungKlasifikasi($data['nilai']);

        Nilai::create($data);

        return redirect()->route('nilai.index')->with('success','data berhasil disimpan !');
    }

    public function show(Nilai $nilai)
    {
        $nilai->load('mahasiswa');
        return view('nilai.show',compact('nilai'));
    }

    public function edit(Nilai $nilai)
    {
        $mahasiswas = Mahasiswa::all();
        return view('nilai.edit',compact('nilai','mahasiswas'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'mahasiswa_id' => 'required|exists:mahasiswas,id',
            'mata_kuliah'  => 'required',
            'nilai'        => 'required|integer|min:0|max:100'
        ]);

        $data = $request->all();
        $data['klasifikasi'] =  $this->hitungKlasifikasi($data['nilai']);

        $nilai->update($data);

        return redirect()->route('nilai.index')->with('success','data berhasil diupdate !');
    }


    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success','data berhasil dihapus !');
    }

    public function hitungKlasifikasi($nilai)
    {
        if($nilai >= 85)
        {
            return 'A';

        }elseif($nilai >= 70)
        {
            return 'B';

        }elseif($nilai >= 60)
        {
            return 'C';

        }elseif($nilai >= 50)
        {
            return 'D';
        }else{
            return 'E';
        }
    }
}
