<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>
            X-admin v1.0
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="/css/x-admin.css" media="all">
    </head>

    <body>
        <div class="x-body">
            <form action="{{ route('addquestion') }}" method="post" class="layui-form layui-form-pane">
                @csrf
                <div class="layui-form-item">
                    <label for="L_title" class="layui-form-label">
                        标题
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="L_title" name="title" required lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_title" class="layui-form-label">
                        描述
                    </label>
                    <div class="layui-input-block">
                        <input type="text" id="L_title" name="describe" required lay-verify="title"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <div class="layui-input-block">
                        <textarea id="L_content" name="content" placeholder="请输入内容" class="layui-textarea fly-editor" style="height: 260px;"></textarea>
                    </div>
                    <label for="L_content" class="layui-form-label" style="top: -2px;">
                        内容
                    </label>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">
                            所在类别
                        </label>
                        <div class="layui-input-block">
                            <select lay-verify="required" name="cid">
                                <option>
                                </option>
                                @foreach ($cat1 as $v)
                                    <optgroup label="{{ $v['name'] }}">
                                        @foreach ($cat2 as $i)
                                            @if ($v['id'] == $i['pid'])
                                                <option value="{{ $i['id'] }}">{{ $i['name'] }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">
                            所在位置
                        </label>
                        <div class="layui-input-block">
                            <select lay-verify="required" name="state">
                                <option value="0">没有可以没有图片</option>
                                <option value="1">轮播图必须有图片</option>
                                <option value="2">右1必须有图片</option>
                                <option value="3">右2必须有图片</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn" lay-filter="add" lay-submit>
                        立即发布
                    </button>
                </div>
            </form>
        </div>
        <script src="/lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="/js/x-layui.js" charset="utf-8">
        </script>
        <script>
            layui.use(['form','layer','layedit'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer
              ,layedit = layui.layedit;


                layedit.set({
                  uploadImage: {
                    url: "{{ route('img') }}", //接口url
                    type: 'post', //默认post
                  }
                })

            //创建一个编辑器
            editIndex = layedit.build('L_content');



              //监听提交
              form.on('submit(add)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("增加成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
              });


            });
        </script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0];
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>

</html>