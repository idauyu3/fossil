<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fossil_post extends Model 
{
    
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
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
    
    protected $fillable = [
        'JapaneseName',
        'ScientificName',
        'comment',
        'image',
        ];
}
