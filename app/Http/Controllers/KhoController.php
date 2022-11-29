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
        // if(\Request::get('s-soluong')) {
        //     $tensp = \Request::get('s-soluong');
        //     // $productList = KhoModel::where('TenSP', 'like', $tensp)->paginate(12);
            
        //     // dd($tensp);
        // } else {
        //     // $productList = KhoModel::paginate(12);
        // }
        $productList = KhoModel::where('SoLuong', '=', '2');
        
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
            'tensp.required' => 'Tên Sản Phẩm không được để trống',
            'soluong.required' => 'Số Lượng không được để trống',
            'soluong.integer' => 'Số Lượng phải là số',
            'gianhap.required' => 'Giá Nhập không được để trống',
            'gianhap.integer' => 'Giá Nhập phải là số',
            'giaban.required' => 'Giá Bán không được để trống',
            'giaban.integer' => 'Giá Bán phải là số',
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
        //
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
