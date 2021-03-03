<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Provinsi;
use App\Http\Models\Kota;
use App\Http\Models\Kecamatan;
use App\Http\Models\Kelurahan;
use App\Http\Models\Rw;
use App\Http\Models\Tracking;
use Illuminate\Support\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        // Count Up
        $positif = DB::table('rws')
            ->select('trackings.positif',
            'trackings.sembuh', 'trackings.meninggal')
            ->join('trackings','rws.id','=','trackings.id_rw')
            ->sum('trackings.positif'); 
        $sembuh = DB::table('rws')
            ->select('trackings.positif',
            'trackings.sembuh','trackings.meninggal')
            ->join('trackings','rws.id','=','trackings.id_rw')
            ->sum('trackings.sembuh');
        $meninggal = DB::table('rws')
            ->select('trackings.positif',
            'trackings.sembuh','trackings.meninggal')
            ->join('trackings','rws.id','=','trackings.id_rw')
            ->sum('trackings.meninggal');
        // $global = file_get_contents('https://api.kawalcorona.com/positif');
        // $posglobal = json_decode($global, TRUE);

        // Date
        $tanggal = Carbon::now()->format('D d-M-Y');

        // Table Provinsi
        $tampil = DB::table('provinsis')
                  ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
                  ->join('rws','rws.id_kelurahan','=','kelurahans.id')
                  ->join('trackings','trackings.id_rw','=','rws.id')
                  ->select('nama_provinsi',
                          DB::raw('sum(trackings.positif) as positif'),
                          DB::raw('sum(trackings.sembuh) as sembuh'),
                          DB::raw('sum(trackings.meninggal) as meninggal'))
                  ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                  ->get();

        //Table Dunia
        // $datadunia= file_get_contents("https://api.kawalcorona.com/");
        // $dunia = json_decode($datadunia, TRUE);
            
        return view('fronindex',compact('positif','sembuh','meninggal', 'tanggal','tampil'));
    }
}
