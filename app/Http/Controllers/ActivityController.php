<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LuotQuay;
use App\resultSpin;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect('/dang-nhap')->with('message','Bạn phải đăng nhập trước khi vào quay!');
        }
        $result = resultSpin::where('user_id',Auth::id())->get();
        $luot = LuotQuay::select('*')->where('user_id',Auth::id())->first();
        $number = $luot->soluot;
        return view('users.quayso',['num' => $number, 'result' => $result]);
    }
    public function spnit()
    {
        $luot = LuotQuay::select('*')->where('user_id',Auth::id())->first();
        $number = $luot->soluot;
        $id = $luot->id;
        $con = $number - 1;
        $update = LuotQuay::find($id);
        $update->soluot = $con;
        $update->save();
        return response()->json($con);
    }
    public function spnitResult(Request $req)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $gthuong = $req->giaithuong;
        $new = new resultSpin;
        $new->user_id = Auth::id();
        $new->result = $gthuong;
        $new->time = date('d/m/Y').' '.date('H:i:s');
        $new->save();
    }
}
