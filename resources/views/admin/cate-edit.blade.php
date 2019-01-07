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
        <form class="layui-form" action="{{route('editcate',['id'=>$cat['id']])}}" method="post">
            @csrf
            <div class="layui-form-item">
                <label for="cname" class="layui-form-label">
                    ID
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="cname" required="" lay-verify="required" autocomplete="off" value="{{ $cat['id'] }}" disabled="" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="cname" class="layui-form-label">
                    <span class="x-red">*</span>分类名
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="name" value="{{ $cat['name'] }}" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">所属分类</label>
                <div class="layui-input-inline">
                    <select @if ($cat['pid'] == 0) disabled  @endif name="pid">
                        <option value="0">顶级分类</option>
                        @foreach ($cat1 as $v)
                            <option @if ($v['id'] == $cat['pid']) selected  @endif value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button class="layui-btn" lay-filter="save" lay-submit="">
                    保存
                </button>
            </div>
        </form>
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8">
    </script>
    <script src="/js/x-layui.js" charset="utf-8">
    </script>
    <script>
        layui.use(['form', 'layer'], function () {
            $ = layui.jquery;
            var form = layui.form()
                , layer = layui.layer;
            //监听提交
            form.on('submit(save)', function (data) {
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("保存成功", { icon: 6 }, function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return true
            });
        });
    </script>
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</body>

</html>