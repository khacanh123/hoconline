<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Lesson;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\User;
use App\shoppingCart;
class UserController extends Controller
{
    function index()
    {
        $title = "Trang học online - Tiết kiệm chi phí";
        $desciption = "Học online mọi lúc mọi nơi, khóa học giá rẻ";
        $author = "HinGroup";
        $keyword = "Khóa học giá rẻ, học online giá rẻ";
        if(Auth::check()){
            $cart = shoppingCart::where('user_id', Auth::id())->get();
        }else{
            $cart = [];
        }
        $listCourse = Course::select('*')->paginate(6);
        return view('users.page.index',[
            'title' => $title,
            'description' => $desciption,
            'author' => $author,
            'keyword' => $keyword,
            'list' => $listCourse,
            'cart' =>  $cart
        ]);
    }
    function courseDetail(Request $req, $courseId)
    {
        $detail = Course::find($courseId);
        $title = $detail->name;
        $desciption = "Học online mọi lúc mọi nơi, khóa học giá rẻ";
        $author = "HinGroup";
        $keyword = $detail->name." Khóa học giá rẻ, học online giá rẻ";
        $list = Lesson::where('course_id',$detail->course_code)->get();

        return view('users.page.detail',[
            'title' => $title,
            'description' => $desciption,
            'author' => $author,
            'keyword' => $keyword,
            'detail' => $detail,
            'list' => $list]);
    }

    function addCart(Request $request)
    {
        $data = [];
        if(!Auth::check()){
            //err = 1 chua dang nhap
            $error = 1;
            return response()->json(['result' =>$error, 'data' => $data]);
        }else{
            $cout = shoppingCart::where('course_id', $request->id)->count();
            if($cout <= 0 ){
                $new = new shoppingCart;
                $new->course_id = $request->id;
                $new->user_id = Auth::id();
                $new->name = $request->name;
                $new->price = $request->price;
                $new->save();
                $result = shoppingCart::where('user_id',Auth::id())->get();
                return response()->json(['result'=>2, 'data'=>$result]);
            }else{
                //err = 3 đã có trong cart
                return response()->json(['result' =>3, 'data' => $data]);
            }
        }
    }
    function login()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('users.login');
    }
    function signup()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('users.signup');
    }
    function PostSignup(Request $req)
    {
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'full_name'=>'required',
                're_password'=>'required|same:password',
                'telephone' =>'required|max:10|min:10'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'telephone.min|telephone.max|telephone.required' => 'Số điện thoại phải có độ dài 10 kí tự là số'
            ]);
        $user = new User();
        $user->name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->telephone = $req->telephone;
        $user->save();
        return redirect('/dang-nhap')->with('success','Tạo tài khoản thành công');
    }
    function PostLogin(Request $req)
    {
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        $user = User::where([
                ['email','=',$req->email]
            ])->first();

        if($user){
            if(Auth::attempt($credentials)){

            return redirect('/')->with('message','Đăng nhập thành công');
            }
            else{
                return redirect()->back()->with('message','Đăng nhập không thành công');
            }
        }
        else{
           return redirect()->back()->with('message','Tài khoản chưa kích hoạt'); 
        }
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }

}
