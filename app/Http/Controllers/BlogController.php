<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Models\Cat;
use App\Models\Blog;
use App\Models\Image;
use App\Models\Message;
use App\Models\Link;


class BlogController extends Controller
{

    public function top(){
        $cat1 = Cat::where('pid', '0')->get();
        $cat2 = Cat::where('pid', '!=', '0')->get();
        return ['cat1' => $cat1,'cat2' => $cat2,];
    }

    public function right(){
        $display = Blog::orderBy('display', 'desc')->limit(5)->get();
        foreach ($display as $v) {
            $display_img[$v['id']] = Image::select('src')->where('blog_id', $v['id'])->first();
        }
        $like = Blog::orderBy('like', 'desc')->limit(5)->get();
        foreach ($like as $v) {
            $like_img[$v['id']] = Image::select('src')->where('blog_id', $v['id'])->first();
        }
        $link = Link::get();
        return ['display' => $display,'display_img' => $display_img,'like' => $like,'like_img' => $like_img,'link'=>$link];
    }

    public function index(){
        $top = $this->top();
        $right = $this->right();
        $data = $this->getblog(1);
        $lunb = Blog::where('state',1)->limit(5)->select('id','title')->get();
        foreach($lunb as $v){
            $v['img'] = Image::where('blog_id',$v['id'])->value('src');
        } 
        $ro = Blog::where('state',2)->orderBy('id','desc')->select('id','title','cid')->first();
        $ro['img'] = Image::where('blog_id',$ro['id'])->value('src');
        $ro['cat'] = Cat::where('id',$ro['cid'])->value('name');
        $rt = Blog::where('state',3)->orderBy('id','desc')->select('id','title','cid')->first();
        $rt['img'] = Image::where('blog_id',$rt['id'])->value('src');
        $rt['cat'] = Cat::where('id',$rt['cid'])->value('name');
        return view('index', [
            'top' => $top,
            'right' => $right,
            'data' => $data['data'],
            'img' => $data['img'],
            'lunb' => $lunb,
            'ro' => $ro,
            'rt' => $rt,
        ]);
    }

    public function getblog($page){
        $img = [];
        $data = Blog::orderBy('id', 'desc')->offset(($page-1)*10)->limit($page*10)->get();
        foreach ($data as $v) {
            $v['cat'] = Cat::where('id', $v['cid'])->value('name');
            $img[$v['id']] = Image::select('src')->where('blog_id', $v['id'])->get();
        }
        if($img == []){
            return null;
        }
        return ['data' => $data,'img' => $img];
    }


    public function time(){
        $top = $this->top();
        $data = Blog::select('id','title','content','created_at')->orderBy('id', 'desc')->simplePaginate(15);
        return view('time',[
            'top' => $top,
            'data' => $data
        ]);
    }


    public function info($id){
        Blog::increment('display', 1);
        $top = $this->top();
        $right = $this->right();
        $data = Blog::where('id',$id)->first();
        $blog = Blog::select('id','title')->where('cid',$data['cid'])->limit(10)->get();
        return view('info',[
            'data' => $data,
            'top' => $top,
            'right' => $right,
            'blog' => $blog
        ]);

    }

public function gbook(){
    $mes = Message::get();
    $top = $this->top();
    return view('gbook',[
        'top' => $top,
        'mes' => $mes,
    ]);
}

public function about(){
    $top = $this->top();
    return view('about',[
        'top' => $top,
    ]);
}
public function list($id){
    $top = $this->top();
    $right = $this->right();
    $data = Blog::orderBy('id', 'desc')->where('cid',$id)->paginate(10);
    foreach ($data as $v) {
        $img[$v['id']][] = Image::select('src')->where('blog_id', $v['id'])->get();
    }

    return view('list',[
        'top' => $top,
        'right' => $right,
        'data' => $data,
        'img' => $img
    ]);
}
public function life(){
    $top = $this->top();
    $right = $this->right();
    return view('life',[
        'top' => $top,
        'right' => $right
    ]);
}


















    public function like($id){
        $data = Blog::where('id',$id)->increment('like');
    }

    public function questionlist(){
        $data = Blog::orderBy('id', 'desc')->get();
        $cat = Cat::select('name')->get('id');
        return view('/admin/question-list',[
            'data' => $data,
            'cat' => $cat
        ]);
    }

    public function questionadd(){
        $cat1 = Cat::where('pid', '0')->get();
        $cat2 = Cat::where('pid', '!=', '0')->get();
        return view('/admin/question-add',[
            'cat1' => $cat1,
            'cat2' => $cat2,
        ]);
    }

    public function img(Request $req){
        $path = $req->file('file');
        $img = $path->store("/public/imgs/" . date("Y-m-d"));
        $url = Storage::url($img);
        $data = [
            "code" => 0,
            "msg" => "",
            "data" => [
                "src" => $url,
                "title" => "123"
            ]
        ];
        return json_encode($data);
    }

    public function addquestion(Request $req){
        $data = $req->all();
        unset($data['_token']);
        unset($data['file']);
        $id = Blog::insertGetId($data);
        $str = $data['content'];
        $pattern = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
        preg_match_all($pattern, $str, $match);
        if($match!=null){
            $img = $match[1];
            foreach ($img as $v) {
                Image::insert([
                    'src' => $v,
                    'blog_id' =>$id
                ]);
            }
        }
        echo "<script>parent.location.reload()</script>";
    }

    public function questionedit($id){
        $cat1 = Cat::where('pid', '0')->get();
        $cat2 = Cat::where('pid', '!=', '0')->get();
        $data = Blog::select('id','title','content','cid')->where('id',$id)->first();
        return view('/admin/question-edit',[
            'data' => $data,
            'cat1' => $cat1,
            'cat2' => $cat2,
        ]);
    }
    public function editquestion(Request $req,$id){
        $data = $req->all();
        unset($data['_token']);
        unset($data['file']);
        Blog::where('id', $id)->update($data);
        echo "<script>parent.location.reload()</script>";
    }

    public function delquestion($id){
        Blog::where('id',$id)->delete();
        $src = Image::select('src')->where('blog_id',$id)->get();
        foreach ($src as $v ) {
            $aa = str_replace("storage", "public", $v['src']);
            Storage::delete($aa);
        }
        Image::where('blog_id',$id)->delete();
    }

    public function delimg(){
        $img = Image::select('src')->get();
        foreach ($img as $v ) {
            $imgs[] = str_replace("storage", "public", substr($v['src'], 1));
            $imgs = array_unique($imgs);
        }
        $files = Storage::allFiles('public/imgs');
        $bb = array_intersect($files,$imgs);
        $file = array_diff($files,$bb);
        $cc = Storage::delete($file);
    }

}
