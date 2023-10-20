<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ["name", "slug"];

    public function genPaginate($limit)
    {
        $table = $this->getTable();
        $categories = [];
        $cats = Capsule::select("SELECT * FROM $table ORDER BY id DESC" . $limit);
        foreach($cats as $category) {
            $date = new Carbon($category->created_at);
            array_push($categories, [
                "id" => $category->id,
                "name" => $category->name,
                "slug" => $category->slug,
                "created" => $date->toFormattedDateString()
            ]);
        }
        return $categories;
    }

    
}

?>