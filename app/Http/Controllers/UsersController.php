<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Hash;

class UsersController extends Controller
{   
    // ユーザー情報
    public function index()
    {
        $user = Auth::user();
        
        return view('users.index', ['user' => $user]);
    }
    
    // ユーザーネーム変更ページへ遷移
    public function name_edit()
    {
        $user = Auth::user();
        
        return view('users.name_edit', ['user' => $user]);
    }
    
    // ユーザーネーム変更
    public function name_update(Request $request)
    {   
        $this->validate($request, ['name' => 'required|max:20']);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        
        return redirect()->route('users.index');
    }
    
    // メールアドレス変更ページへ遷移
    public function mail_edit()
    {
        $user = Auth::user();
        
        return view('users.mail_edit', ['user' => $user]);
    }
    
    // メールアドレス変更
    public function mail_update(Request $request)
    {   
        $this->validate($request, ['email' => 'required']);
        
        $user = Auth::user();
        $user->email = $request->email;
        $user->save();
        
        return redirect()->route('users.index');
    }
    
    // 現在のパスワード確認ページへ遷移
    public function password_current()
    {
        $user = Auth::user();
        
        return view('users.password_current', ['user' => $user]);
    }
    
    // 現在のパスワードを確認して、一致していたらパスワード変更ページへ遷移
    public function password_new(Request $request)
    {   
        $this->validate($request, ['password' => 'required']);
        $password = $request['password'];
        $user = Auth::user();
        
        // ハッシュ化されたパスワードを比較して、一致しているかの確認
        if(Hash::check($password, $user->password))
        {
            return view('users.password_new', ['user' => $user]);
            
        }else {
            
            return back();
        }
    }
    
    // パスワード変更
    public function password_update(Request $request)
    {   
        $this->validate($request, ['password' => 'required|min:8']);
        
        
        return redirect()->route('users.index');
    }
    
    
}
