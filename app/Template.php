<?php

namespace Create_template;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{   
    protected $fillable = ['content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
