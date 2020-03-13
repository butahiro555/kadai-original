<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable; // 追加

class Template extends Model
{   
    use Sortable; // 追加
    
    protected $fillable = ['content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public $sortable = ['created_at', 'updated_at']; // ソート対象カラム追加
}
