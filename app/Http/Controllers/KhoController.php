<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhoModel;
use DB;

class KhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Select table
        $productList = KhoModel::select("*");

        // Check get value form url
        if($tenSP = \Request::get('s-tensp')) {
            $productList = $productList->where("TenSP", "LIKE", "%{$tenSP}%");
        }
        if($soLuong = \Request::get('s-soluong')) {
            $productList = $productList->where("SoLuong", "=", "{$soLuong}");
        }
        if($khaDung = \Request::get('s-khadung')) {
            $productList = $productList->where("KhaDung", "=", "{$khaDung}");
        }
        if($giaBan = \Request::get('s-giaban')) {
            $productList = $productList->where("GiaBan", "=", "{$giaBan}");
        }
        if($datHang = \Request::get('s-dathang')) {
            $productList = $productList->where("DatHang", "=", "{$datHang}");
        }

        // Pagination
        $productList = $productList->paginate(12);
        
        return view('sep.kho.kho', compact('productList'));
    }

    public function nhapKho() {
        return view('sep.kho.nhap-kho');
    }

    public function fakedata() {
        $dataFake = [];

        for($i = 1; $i <= 100; $i++) {
            $dataFake[] = [
                'MaSP' => null,
                'TenSP' => "SP ${i}",
                'SoLuong' => "4",
                'GiaNhap' => null,
                'GiaBan' => '360000',
                'DatHang' => '1',
                'KhaDung' => '1',
                'NgayNhap' => null,
            ];
        }

        KhoModel::insert($dataFake);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tensp' => 'required',
            'soluong' => 'required|integer',
            'gianhap' => 'required|integer',
            'giaban' => 'required|integer',
        ], [
            'tensp.required' => 'T??n S???n Ph???m kh??ng ???????c ????? tr???ng',
            'soluong.required' => 'S??? L?????ng kh??ng ???????c ????? tr???ng',
            'soluong.integer' => 'S??? L?????ng ph???i l?? s???',
            'gianhap.required' => 'Gi?? Nh???p kh??ng ???????c ????? tr???ng',
            'gianhap.integer' => 'Gi?? Nh???p ph???i l?? s???',
            'giaban.required' => 'Gi?? B??n kh??ng ???????c ????? tr???ng',
            'giaban.integer' => 'Gi?? B??n ph???i l?? s???',
        ]);

        // dd($request->tensp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
