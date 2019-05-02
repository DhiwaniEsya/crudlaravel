<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class EcaController extends Controller
{
    public function home(){
        $buku = Buku::all();
        return view('home', ['buku' => $buku]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'penerbit'=> 'required',
            'tahun_terbit' => 'required|integer',
            'pengarang' => 'required'
          ]);
          $buku = new Buku([
            'judul' => $request->get('judul'),
            'penerbit'=> $request->get('penerbit'),
            'tahun_terbit'=> $request->get('tahun_terbit'),
            'pengarang'=> $request->get('pengarang')
          ]);
          $buku->save();
          return redirect('/')->with('success', 'Book has been added'); 
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $buku = Buku::find($id);

        return view('edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'=>'required',
            'penerbit'=> 'required',
            'tahun_terbit' => 'required|integer',
            'pengarang' => 'required'
          ]);
    
          $buku = Buku::find($id);
          $buku->judul = $request->get('judul');
          $buku->penerbit = $request->get('penerbit');
          $buku->tahun_terbit = $request->get('tahun_terbit');
          $buku->pengarang = $request->get('pengarang');
          $buku->save();
    
          return redirect('/')->with('success', 'Books has been updated');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
   
        return redirect('/')->with('success', 'Books has been deleted Successfully');
    }

}
