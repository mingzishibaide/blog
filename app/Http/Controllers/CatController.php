<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cat;


class CatController extends Controller
{
    public function category(){
        $cat1 = Cat::where('pid','0')->get();
        $cat2 = Cat::where('pid','!=','0')->get();
        return view('/admin/category',[
            'cat1' => $cat1,
            'cat2' => $cat2
        ]);
    }
    public function addCat(Request $req)
    {
        $cat = $req->all();
        unset($cat['_token']);
        Cat::insert($cat);
        return redirect(route('category'));
    }
    public function cateedit($id)
    {
        $cat1 = Cat::where('pid','0')->get();
        $cat = Cat::where('id',$id)->first();
        return view('/admin/cate-edit',[
            'cat' => $cat,
            'cat1' => $cat1
        ]);
    }
    public function editcate(Request $req , $id){
        $cat = $req->all();
        unset($cat['_token']);
        Cat::where('id', $id)->update($cat);
        echo "<script>parent.location.reload()</script>";
    }
    public function delcate($id){
        Cat::where('id',$id)->orWhere('pid',$id)->delete();
    }

}
