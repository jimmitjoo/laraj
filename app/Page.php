<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'content',
        'page_type',
        'state',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Page', 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany('App\Page', 'parent_id', 'id');
    }

    public function getPublishTimeAttribute() {
        $date = ($this->publish_at != null) ? $this->publish_at : $this->created_at;
        return date('Y-m-d H:i', strtotime($date));
    }

    public function getPublishRawTimeAttribute() {
        $date = ($this->publish_at != null) ? $this->publish_at : $this->created_at;
        return date('Y-m-d H:i:s', strtotime($date));
    }

}
