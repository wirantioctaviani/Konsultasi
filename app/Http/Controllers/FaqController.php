<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Path\To\DOMDocument;

class FaqController extends Controller
{
    public function managefaq()
        {
            $active = 'faq';
            $datakategori = \App\Models\tb_faq_kategori::leftjoin('mstr_layanan', function($join3) {
                            $join3->on('faq_kategori.layanan_id', '=', 'mstr_layanan.id');})
                        ->get();
            // dd($datafaq);

            $datalayanan = \App\Models\mstr_layanan::get();

            return view('admin.managefaq')->with(['active' => $active, 'datakategori' => $datakategori, 'datalayanan' => $datalayanan]);
        }

    // public function editfaq()
    //     {
    //         $active = 'faq';
    //         $datafaq = \App\Models\tb_faq_subkategori::leftjoin('faq_kategori', function($join2) {
    //                         $join2->on('faq_subkategori.kategori_id', '=', 'faq_kategori.id_kategori');})
    //                     ->leftjoin('mstr_layanan', function($join3) {
    //                         $join3->on('faq_kategori.layanan_id', '=', 'mstr_layanan.id');})
    //                     ->select('id_subkategori', 'id_kategori', 'jenis_layanan', 'subbid_id', 'nama_kategori', 'nama_subkategori', 'jawaban')
    //                     ->get();
    //         // dd($datafaq);

    //         return view('admin.managefaq')->with(['active' => $active, 'datafaq' => $datafaq]);
    //     }

    public function addkategori(Request $request)
    {
            // dd($request->all());
            $active = 'faq';
            $kategori = \App\Models\tb_faq_kategori::create(
                [
                'nama_kategori' => $request->nama_kategori,
                'layanan_id' => $request->layanan_id,
                ]);

            return redirect()->action('App\Http\Controllers\FaqController@managefaq')->with(['active' => $active])->with('sukses', 'Kategori FAQ Berhasil Ditambahkan');
    }

    public function editkategori(Request $request)
    {   
        $active = 'faq';
        // dd($request->id_kategori);
        // dd($request->all());
        $updatekat = \App\Models\tb_faq_kategori::where('id_kategori',$request->id_kategori)
                    ->update(['nama_kategori' => $request->nama_kategori,
                              'layanan_id' => $request->layanan_id ]);

        return redirect()->action('App\Http\Controllers\FaqController@managefaq')->with('sukses', 'Kategori FAQ Berhasil Diperbarui');
    }


    public function deletekategori(Request $request)
    {   
        $active = 'faq';
        // dd($request->id_kategori);
        // dd($request->all());
        $delkat = \App\Models\tb_faq_kategori::where('id_kategori',$request->id_kategori)
                    ->delete();

        // $delsubkat = \App\Models\tb_faq_subkategori::where('kategori_id',$request->id_kategori)
                    // ->delete();

        return redirect()->action('App\Http\Controllers\FaqController@managefaq')->with('sukses', 'Kategori FAQ Berhasil Dihapus');
    }

    public function managesubkategori(Request $request)
    {
            $active = 'faq';
            $kategori_id = $request->id_kategori;
            $layanan_id = $request->layanan_id;
            // dd($kategori_id);
            $datasubkategori = \App\Models\tb_faq_subkategori::leftjoin('faq_kategori', function($join2) {
                            $join2->on('faq_subkategori.kategori_id', '=', 'faq_kategori.id_kategori');})
                        ->leftjoin('mstr_layanan', function($join3) {
                            $join3->on('faq_kategori.layanan_id', '=', 'mstr_layanan.id');})
                        ->select('id_subkategori', 'id_kategori', 'jenis_layanan', 'subbid_id', 'nama_kategori', 'nama_subkategori', 'jawaban')
                        ->where('kategori_id', $kategori_id)
                        ->get();
            // dd($datafaq);

            return view('admin.managesubkategori')->with(['active' => $active, 'datasubkategori' => $datasubkategori, 'kategori_id' => $kategori_id, 'layanan_id' => $layanan_id]);
    }

    public function addsubkategori(Request $request)
    {
            // dd($request->all());
            $active = 'faq';
            
            $subkategori = new \App\Models\tb_faq_subkategori;
            $subkategori->nama_subkategori = $request->nama_subkategori;
                          $dom = new \DOMDocument();
                          libxml_use_internal_errors(true);
                          $dom->loadHTML($request->jawaban,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
                          libxml_clear_errors();
            $subkategori->jawaban     = $dom->saveHTML();
            $subkategori->kategori_id = $request->kategori_id;
            $subkategori->save();  

            return redirect()->action('App\Http\Controllers\FaqController@managesubkategori', ['id_kategori' => $request->kategori_id, 'layanan_id' => $request->layanan_id])->with(['active' => $active])->with('sukses', 'Subkategori FAQ Berhasil Ditambahkan');
    }

    public function editsubkategori(Request $request)
    {   
        $active = 'faq';
        // dd($request->id_kategori);
        // dd($request->all());
        $updatekat = \App\Models\tb_faq_subkategori::where('id_subkategori',$request->id_subkategori)
                    ->update(['nama_subkategori' => $request->nama_subkategori,
                              'jawaban' => $request->jawaban ]);

        return redirect()->action('App\Http\Controllers\FaqController@managefaq')->with('sukses', 'Subkategori FAQ Berhasil Diperbarui');
    }


    public function deletesubkategori(Request $request)
    {   
        $active = 'faq';
        // dd($request->id_kategori);
        // dd($request->all());
        $delsubkat = \App\Models\tb_faq_subkategori::where('id_subkategori',$request->id_subkategori)
                    ->delete();

        // $delsubkat = \App\Models\tb_faq_subkategori::where('kategori_id',$request->id_kategori)
                    // ->delete();

        return redirect()->action('App\Http\Controllers\FaqController@managesubkategori', ['id_kategori' => $request->kategori_id, 'layanan_id' => $request->layanan_id])->with('sukses', 'Subkategori FAQ Berhasil Dihapus');
    }
}
