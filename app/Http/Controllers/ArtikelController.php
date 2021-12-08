<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class ArtikelController extends Controller
{

    private function is_login() {
        if(Auth::user()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function show() {
        $articles = DB::table('tabel')->orderby('id', 'desc')->get();
        return view('show', ['articles'=>$articles]);
    }

    public function add() {
        if($this->is_login())
        {
            return view('add');
        }

        else
        {
            return redirect('/login');
        }
    }

    public function add_process(Request $article) {
        
        // return $article->file('media')->store('media');
        $validateData = $article->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'media' => 'file|mimes:jpeg,png,jpg|max:5000',
        ]);

        $validateData['media']=$article->file('media')->store('media');

        DB::table('tabel')->insert([
            'judul'=>$validateData['judul'],
            'deskripsi'=>$validateData['deskripsi'],
            'media'=>$validateData['media']
        ]);

        return redirect()->action('ArtikelController@show');
    }    

    public function detail($id) {
        $article = DB::table('tabel')->where('id', $id)->first();
        return view('detail', ['article'=>$article]);
    }

    public function show_by_admin() {
        if($this->is_login())
        {
            $articles = DB::table('tabel')->orderby('id', 'desc')->get();
            return view('adminshow', ['articles'=>$articles]);
        }

        else
        {
            return redirect('/login');
        }
    }

    public function edit($id) {
        if($this->is_login())
        {
            $article = DB::table('tabel')->where('id', $id)->first();
            return view('edit', ['article'=>$article]);
        }

        else
        {
            return redirect('/login');
        }
    }

    public function edit_process(Request $article) {

        $validateData = $article->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required|max:255',
            'media' => 'file|mimes:jpeg,png,jpg|max:5000',
        ]);

        $validateData['media']=$article->file('media')->store('media');

        $id = $article->id;
        $judul = $validateData['judul'];
        $deskripsi = $validateData['deskripsi'];
        $media = $validateData['media'];

        DB::table('tabel')->where('id', $id)
                            ->update(['judul' => $judul, 'deskripsi' => $deskripsi,'media'=>$media]);
        Session::flash('success', 'Berhasil');
        return redirect()->action('ArtikelController@show_by_admin');
    }

    public function delete($id) {
        if($this->is_login())
        {
             //menghapus artikel dengan ID sesuai pada URL
            DB::table('tabel')->where('id', $id)
                                ->delete();

            //membuat pesan yang akan ditampilkan ketika artikel berhasil dihapus
            Session::flash('success', 'Artikel berhasil dihapus');
            return redirect()->action('ArtikelController@show_by_admin');
        }

        else
        {
            return redirect('/login');
        }
    }
}