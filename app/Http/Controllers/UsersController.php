<?php

namespace Create_template\Http\Controllers;

use Illuminate\Http\Request;

use Create_template\User;
use Create_template\Template;
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
        
        // $テーブル名->カラム名 = $request->name="入力したい値"
        // user_idには、ユーザーインスタンスであるuser()のidを入れる
        $templates->user_id = $request->user()->id;
        $templates->content = $request->content;
        $templates->save();
        
        $id = Auth::id();
        
        // Saveが押されたら、Template listsに遷移させる
        return redirect()->route('templates.show', ['id' => $id]);
    }
    
    /* 上書き保存機能(後々、実装予定)
    public function update(Request $request)
    {
        $templates = Template::find($request->id);
        
        $templates->user_id = $request->user()->id;
        $templates->content = $request->content;
        $templates->save();
        
        return redirect('/templates');
        
    }   */
    
    public function show($id)
    {   
        $user = User::find($id);
        
        $templates = $user->templates()->orderBy('created_at', 'desc')->paginate(3);
        
        $data = [
            'user' => $user,
            'templates' => $templates,
        ];
        
        // 他のユーザーの一覧は見れないようにする
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
