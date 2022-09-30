<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function subcategory($category_id) {
        $subcategories = Subcategory::where("category_id", $category_id)->get();
        $options = '';
        foreach($subcategories as $row){
            $options .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        return $options;
    }
}
