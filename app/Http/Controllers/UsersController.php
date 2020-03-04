<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Template;
use Auth;

class UsersController extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        
        return view('templates.index', [
            'user' => $user,
            ]);
    }
    
    public function store(Request $request)
    {   
        $templates = new Template;
        
        // $テーブル名->カラム名 = $request->name="入力した値"
        // user_idには、ユーザーインスタンスであるuser()のidを入れる
        $templates->user_id = $request->user()->id;
        $templates->content = $request->content;
        $templates->save();
        
        return redirect('/');
    }
    
    public function show($id)
    {   
        $user = User::find($id);
        
        $templates = $user->templates()->orderBy('created_at', 'desc')->paginate(3);
        
        $data = [
            'user' => $user,
            'templates' => $templates,
        ];
        
        // 他のユーザーのテンプレート一覧は見れないようにする
        if($user->id == Auth::id()){
        
        return view('templates.show', $data);
        
        }else {
        
        return redirect('/');
        }
        
    }
    
    public function destroy($id)
    {
        $templates = Template::find($id);
        $templates->delete();
        
        return back();
    }
}
