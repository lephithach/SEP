<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KhachHangModel;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khachHangList = KhachHangModel::paginate('5');
        return view('sep.khachhang.danh-sach-khach-hang', compact('khachHangList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sep.khachhang.them-khach-hang');
    }

    public function find(Request $request) {
        if($request) {
            $sdt = $request->sdt;
            $result = KhachHangModel::find($sdt);
            return view('sep.khachhang.tra-cuu-khach-hang', compact('result'));
        }

        return view('sep.khachhang.tra-cuu-khach-hang');
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
            'sdt' => 'required|numeric|digits_between:10,12|unique:khachhang,SDTKhachHang',
            'ho' => 'required',
            'ten' => 'required',
            'ngaysinh' => 'nullable|date',
            'gioitinh' => 'required',
            'diachi' => 'nullable',
            'email' => 'nullable',
            'cccd' => 'nullable|numeric|digits:9,12',
        ], [
            'sdt.required' => 'Số điện thoại không được để trống',
            'sdt.numeric' => 'Số điện thoại phải là số',
            'sdt.digits' => 'Số điện thoại quá dài',
            'sdt.unique' => 'Số điện thoại đã có, vui lòng kiểm tra lại',
            'ho.required' => 'Họ không được để trống',
            'ten.required' => 'Tên không được để trống',
            'ngaysinh.required' => 'Ngày sinh không được để trống',
            'ngaysinh.date' => 'Ngày sinh sai định dạng',
            'gioitinh.required' => 'Giới tính không được để trống',
            'diachi.required' => 'Địa chỉ không được để trống',
            'email.required' => 'Email không được để trống',
            'cccd.required' => 'CCCD không được để trống',
            'cccd.numeric' => 'CCCD phải là số',
            'cccd.digits' => 'CCCD quá dài',
        ]);

        $arrayInput = [
            'SDTKhachHang' => $request->sdt,
            'Ho' => $request->ho,
            'Ten' => $request->ten,
            'NgaySinh' => $request->ngaysinh,
            'GioiTinh' => $request->gioitinh,
            'DiaChi' => $request->diachi,
            'Email' =>$request->email,
            'CCCD' => $request->cccd
        ];

        $resultAdd = KhachHangModel::insert($arrayInput);

        if($resultAdd) {
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Thêm thành công'
            ]);
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Thêm thất bại, vui lòng kiểm tra lại'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sdt = $request->sdt;

        $result = KhachHangModel::find($sdt);

        return view('sep.khachhang.tra-cuu-khach-hang', compact('result'));
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
