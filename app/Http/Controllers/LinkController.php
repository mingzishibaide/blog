<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function linklist(){
        $data = Link::get();
        return view('admin/link-list', [
            'data' => $data
        ]);
    }

    public function linkadd()
    {
        return view('admin/link-add');
    }
    public function addlink(Request $req)
    {
        $data = $req->all();
        unset($data['_token']);
        Link::insert($data);
        echo "<script>parent.location.reload()</script>";
    }

    public function dellink($id){
        Link::where('id', $id)->delete();
    }

}
