<?php
namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'extrait',
        'category_id',
        'user_id',
        'status',
        'published_at',

    ];
    protected $dates =['published_at'];
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function picture()
    {
        return $this->hasOne('App\Picture');
    }
    public function setCategoryIdAttribute($value)
    {
        $this->attributes['category_id'] = ($value == 0) ? null : $value;
    }
    
    public function scopeOpened($query)
    {
        return $query->where('status', '=', 'opened');
    }
 
    /**
     *  @return bool
     */
    
    public function hasTag($id)
    {
        if(is_null($this->tags)) return false;
        foreach($this->tags as $tag)
        {
            if($tag->id === $id) return true;
        }
        return false;
    }
}