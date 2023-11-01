<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class SubCategory extends Model
{
    public function getPaginate($limit){
        $table = $this->getTable();
        $categories = [];
        $cats = Capsule::select("SELECT * FROM $table ORDER BY id DESC" . $limit);
        foreach($cats as $category) {
            $date = new Carbon($category->created_at);
            array_push($categories, [
                "id" => $category->id,
                "name" => $category->name,
                "cat_id" => $category->cat_id,
                "created" => $date->toFormattedDateString()
            ]);
        }
        return $categories;
    }
}

?>