<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Template;
use Auth;

class TemplatesController extends Controller
{   
    // トップページ
    public function index()
    {   
        $user = Auth::user();
        
        return view('templates.index', ['user' => $user]);
    }
    
    // 作成機能
    public function store(Request $request)
    {   
        $user = Auth::user();
        $templates = new Template;
        
        // $テーブル名->カラム名 = $request->name="入力したい値"
        // user_idには、ユーザーインスタンスであるuser()のidを入れる
        $templates->user_id = $request->user()->id;
        $templates->title = $request->title;
        $templates->content = $request->content;
        $templates->save();
        
        // Saveが押されたら、Template listに遷移させる
        return redirect()->route('templates.show', ['id' => $user->id]);
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
    
    // ユーザーの一覧表示
    public function show($id)
    {   
        $user = Auth::user();
        
        // 他のユーザーの一覧は見れないようにする
        if($user->id == Auth::id()) {
            
        $templates = $user->templates()->sortable()->paginate(10);
        
        return view('templates.show', ['templates' => $templates]);
        }
    }
    
    // 検索機能
    public function search(Request $request)
    {   
        $user = Auth::user();
        
        // ログインユーザーのテンプレートのみ取得する($query = Template::query()だと、他のユーザーのテンプレートまで引っ張ってきてしまう)
        $template = $user->templates();
        
        // 検索ワードと同じtitleをとってくる
        $templates = $template->where('title', '=', $request->keyword)->sortable()->paginate(10);
        
        return view('templates.show', ['templates' => $templates]);
    }
    
    // 削除機能
    public function destroy($id)
    {
        $templates = Template::find($id);
        $templates->delete();
        
        return back();
    }
}
