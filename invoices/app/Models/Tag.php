<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['tag'];
    public $timestamps = false;

    public static function newTag(string $tag) : array
    {
        // if tag exists, return it
        $tagModel = self::where('tag', $tag)->first();
        if ($tagModel) {
            return [$tag, false];
        }
        // if tag does not exist, create it
        $tagModel = self::create(['tag' => $tag]);
        return [$tag, true];
    }
   
}
