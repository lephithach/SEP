<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;
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

        // Insert table
        // $chamCong = new ChamCongModel();
        // $chamCong->IDCC = null;
        // $chamCong->MSNV = $MSNV;
        // $chamCong->NgayCham = $ngayCham;
        // $chamCong->ChamVao = $chamVao;
        // $chamCong->ChamRa = $chamVao;
        // $chamCong->IPChamCong = $this->getIpWan();
        // $chamCong->LyDo = null;
        // $chamCong->GhiChu = null;
        // $chamCong->Duyet = 0;
        // $chamCong->save();

        // dd($chamCong->save());

        $idInsert = ChamCongModel::insertGetId([
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

        // Redirect back
        return redirect()->back()
            // Set cookie 1 day
            ->withCookies([
                Cookie::make('checkChamCong', true, 86400),
                Cookie::make('msnvChamCong', '1', 86400),
                Cookie::make('IDCC', $idInsert, 86400)
            ]);
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
        // ChamCongModel::update()
        dd($request->IDCC);
    }

    public function checkOut(Request $request) {
        $IDCC = $request->IDCC;
        $msnvChamCong = $request->msnvChamCong;
        $chamRa = date('H:i:s');

        $statusUpdate = ChamCongModel::where('IDCC', $IDCC)->where('MSNV', $msnvChamCong)->update(['ChamRa' => $chamRa]);

        if($statusUpdate) {
            return redirect()->back()
                ->withCookie(Cookie::forget('checkChamCong'))
                ->withCookie(Cookie::forget('msnvChamCong'))
                ->withCookie(Cookie::forget('IDCC'));
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
        dd('delete');
    }
}
