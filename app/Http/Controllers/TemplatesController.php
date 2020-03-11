<?php

namespace Create_template\Http\Controllers;

use Illuminate\Http\Request;

use Create_template\User;
use Create_template\Template;
use Auth;

class TemplatesController extends Controller
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
        $templates->title = $request->title;
        $templates->content = $request->content;
        $templates->save();
        
        $id = Auth::id();
        
        // Saveが押されたら、Template listsに遷移させる
        return redirect()->route('templates.show', ['id' => $id]);
        
    }
    
    // 上書き保存機能
    public function update(Request $request, $id)
    {   
        $templates = Template::find($id);
        $templates->title = $request->title;
        $templates->content = $request->content;
        $templates->save();
        
        return redirect()->route('templates.show', ['id' => $id]);
        
    }
    
    public function show($id)
    {   
        $id = Auth::id();
        $user = User::find($id);
        
        $templates = $user->templates()->sortable()->paginate(10);
        
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
