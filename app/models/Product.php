<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Capsule\Manager as Capsule;

class Product extends Model{
    public function getPaginate($limit){
        $table = $this->getTable();
        $categories = [];
        $cats = Capsule::select("SELECT * FROM $table ORDER BY sub_cat_id" . $limit);
        foreach($cats as $category) {
            $date = new Carbon($category->created_at);
            array_push($categories, [
                "id" => $category->id,
                "name" => $category->name,
                "price" => $category->price,
                "cat_id" => $category->cat_id,
                "sub_cat_id" => $category->sub_cat_id,
                "image" => $category->image,
                "description" => $category->description,
                "created" => $date->toFormattedDateString()
            ]);
        }
        return $categories;
    }
}

?>