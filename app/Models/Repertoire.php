<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Repertoire extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'title',
        'title_fr',
        'repertoire_url',
        'date',
        'user_id'
    
    ];

    public function repertoireHasUser(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

      public function selectRepertoire()
    {
        $lang = session()->get('localeDB');    
        $query = $this::select('id',DB::raw("(case when title$lang is null then title else title$lang end) as title"),'repertoire_url','date','user_id')
        ->paginate(3);

        return $query;
    }

    public function selectMesRepertoire()
    {
        $lang = session()->get('localeDB');    
        $query = $this::select('id',DB::raw("(case when title$lang is null then title else title$lang end) as title"),'repertoire_url','date','user_id')->where('user_id',Auth::user()->id)->paginate(3);

        return $query;
    }

    








}
