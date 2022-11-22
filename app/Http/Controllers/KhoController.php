<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhoModel;

class KhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productList = KhoModel::paginate(12);

        return view('kho', compact('productList'));
    }

    public function fakedata() {
        $dataFake = [];

        for($i = 0; $i < 1000; $i++) {
            $dataFake[] = [
                'ID_SP' => null,
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
        // 
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
