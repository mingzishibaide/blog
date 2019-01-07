<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function commentlist(){
        $mes = Message::get();
        return view('/admin/comment-list',[
            'mes' => $mes
        ]);
    }

    public function login(Request $req){
        dd($req->all()['key']);
    }

    public function addgbook(Request $req){
         $validatedData = $req->validate([
            'mail' => 'required|email',
            'name' => 'required',
            'content' => 'required',
            ],$messages = [
                'mail.email' => '请填写正确的邮箱',
                'mail.required'  => '邮箱不能为空',
                'name.required'  => '名字不能为空',
                'content.required'  => '留言内容不能为空',
            ]
        );
        $data = $req->all();
        unset($data['_token']);
        Message::insert($data);
        echo "<script>window.location.href='/gbook';</script>";
    }

    public function delcomment($id){
        Message::where('id',$id)->delete();
    }
}
