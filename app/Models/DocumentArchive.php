<?php
    
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentArchive extends Model
{
    protected $fillable = [
        'user_id',
        'original_name',
        'stored_name',
        'stored_path',
        'text_left',
        'text_right',
        'wm_color',
        'page_count',
        'file_size',
        'locked_at',
    ];

    protected $casts = [
        'locked_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

