<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rw;
use Validator;
use Illuminate\Http\Request;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Rw = Rw::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Kasus',
            'data' => $Rw
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'positif' => 'required',
            'sembuh' => 'required',
            'meninggal' => 'required'
        ],
            [
                'positif.required' => 'Masukan positif Kasus !!!',
                'sembuh.required' => 'Masukan sembuh Kasus !!!',
                'meninggal.required' => 'Masukan meninggal Kasus !!!'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data' => $validator->errors()
            ],400);

        } else {

             $Rw = Rw::create([
                'positif' => $request->input('positif'),
                'sembuh'   => $request->input('sembuh'),
                'meninggal'   => $request->input('meninggal')
            ]);


            if ($Rw) {
                return response()->json([
                    'success' => true,
                    'message' => 'Rw Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Rw Gagal Disimpan!',
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Rw = Rw::whereId($id)->first();

        if ($Rw) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Rw!',
                'data'    => $Rw
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rw Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'positif' => 'required',
            'sembuh' => 'required',
            'meninggal' => 'required'
        ],
            [
                'positif.required' => 'Masukkan Kasus Positif  !!!',
                'sembuh.required' => 'Masukkan Kasus Sembuh !!!',
                'meninggal.required' => 'Masukkan Kasus Meninggal !!!'
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Data Yang Kosong',
                'data' => $validator->errors()
            ],400);

        } else {

            $Rw = Rw::whereId($request->input('id'))->update([
                'positif' => $request->input('positif'),
                'sembuh' => $request->input('sembuh'),
                'meninggal' => $request->input('meninggal')
            ]);


            if ($Rw) {
                return response()->json([
                    'success' => true,
                    'message' => 'Rw Berhasil DiUpdate !!!!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Rw Gagal DiUpdate !!!!',
                ], 500);
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Rw = Rw::findOrFail($id);
        $Rw->delete();

        if ($Rw) {
            return response()->json([
                'success' => true,
                'message' => 'Rw Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rw Gagal Dihapus!',
            ], 500);
        }

    }
}
