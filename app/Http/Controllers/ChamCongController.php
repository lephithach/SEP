<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use App\Models\ChamCongModel;

class ChamCongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $getCookie = $request->cookie('checkchamcong');
        return $getCookie;
    }

    public function getCookie() {
        $request = new Request();
        $getCookie = $request->cookie('checkchamcong');
        return $getCookie;
    }

    public function getIpWan() {
        // Pull contents from ip6.me
        $file = file_get_contents('http://ip6.me/');

        // Trim IP based on HTML formatting
        $pos = strpos( $file, '+3' ) + 3;
        $ip = substr( $file, $pos, strlen( $file ) );

        // Trim IP based on HTML formatting
        $pos = strpos( $ip, '</' );
        $ip = substr( $ip, 0, $pos );

        return $ip;
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
        $MSNV = 1;
        $ngayCham = date('Y-m-d');
        $chamVao = date('H:i:s');

        $status = ChamCongModel::insert([
            'IDCC' => null,
            'MSNV' => $MSNV,
            'NgayCham' => $ngayCham,
            'ChamVao' => $chamVao,
            'ChamRa' => $chamVao,
            'IPChamCong' => $this->getIpWan(),
            'LyDo' => null,
            'GhiChu' => null,
            'Duyet' => 0
        ]);

        if($status) {
            // Set cookie 1 day
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Chấm công thành công'
            ])->withCookie(cookie('checkchamcong', '1', 86400));
        } else {
            return redirect()->back()->with([
                'status' => 'danger',
                'message' => 'Chấm công thất bại, vui lòng kiểm tra lại'
            ]);
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
