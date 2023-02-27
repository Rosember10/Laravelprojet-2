<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'content',
        'title_fr',
        'content_fr',
        'date',
        'user_id'

    ];


    public function articleHasUser(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function selectArticle()
    {
     
        $lang = session()->get('localeDB');    
        $query = $this::select('id',DB::raw("(case when title$lang is null then title else title$lang end) as title"), DB::raw("(case when content$lang is null then content else content$lang end) as content"),'date','user_id')
           
            ->get();

        return $query;
    }


}
