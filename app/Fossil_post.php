<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Fossil_post extends Model 
{
    
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function searchQuery($keyword)
    {
        return $this->where('JapaneseName', 'LIKE', "%{$keyword}%")->orwhere('ScientificName', 'LIKE', "%{$keyword}%")->orderBy('updated_at', 'DESC')->paginate(5);
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }//リレーション
    
    public function images() 
    {
        return $this->hasMany('App\Image');
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class, 'fossil_post_id');
    }
    
    public function is_like_by_auth_user()
    {
        $id = Auth::id();
        
        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
    
    protected $fillable = [
        'JapaneseName',
        'ScientificName',
        'comment',
        ];
}
