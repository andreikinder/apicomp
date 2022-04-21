<?php

namespace App\Models;

trait FilterModel
{
    public function scopeFilter($query, array  $filters){

        $query->when($filters['search'] ?? false, function($query, $search){
            $query->where( fn($query) =>  $query->where('name', 'like', '%'. $search  .'%'));

        });
    }
}
