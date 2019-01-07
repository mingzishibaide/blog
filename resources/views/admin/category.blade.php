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
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a><cite>首页</cite></a>
            <a><cite>分类管理</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <form method="post" class="layui-form x-center" action="{{Route('addcat')}}" style="width:50%">
            @csrf
            <div class="layui-form-pane" style="margin-top: 15px;">
                <div class="layui-form-item">
                    <label class="layui-form-label" style="width:60px">所属分类</label>
                    <div class="layui-input-inline" style="width:120px;text-align: left">
                        <select name="pid">
                            <option value="0">顶级分类</option>
                            @foreach ($cat1 as $v)
                                <option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="layui-input-inline" style="width:120px">
                        <input type="text" name="name" placeholder="分类名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="add"><i class="layui-icon">&#xe608;</i>增加</button>
                    </div>
                </div>
            </div>
        </form>
        <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><span class="x-right" style="line-height:40px">共有数据：{{ count($cat2) }} 条</span></xblock>
        <table class="layui-table">
            <thead>
                <tr>
                    <th><input type="checkbox" name="" value=""></th>
                    <th>ID</th>
                    <th>PID</th>
                    <th>分类名</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody id="x-link">
                            @foreach ($cat1 as $v)
                                <tr>
                                    <td><input type="checkbox" value="{{ $v['id'] }}" name=""></td>
                                    <td>{{ $v['id'] }}</td>
                                    <td>{{ $v['pid'] }}</td>
                                    <td>{{ $v['name'] }}</td>
                                    <td class="td-manage">
                                        <a title="编辑" href="javascript:;" onclick="cate_edit('编辑','/admin/cateedit/','{{ $v['id'] }}','','510')" class="ml-5" style="text-decoration:none">
                                            <i class="layui-icon">&#xe642;</i>
                                        </a>
                                        <a title="删除" href="javascript:;" onclick="cate_del(this,'{{ $v['id'] }}')" style="text-decoration:none">
                                            <i class="layui-icon">&#xe640;</i>
                                        </a>
                                    </td>
                                </tr>
                                @foreach ($cat2 as $i)
                                    @if ($i['pid'] == $v['id'])
                                     <tr>
                                        <td><input type="checkbox" value="{{ $i['id'] }}" name=""></td>
                                        <td>{{ $i['id'] }}</td>
                                        <td>{{ $i['pid'] }}</td>
                                        <td>{{ $i['name'] }}</td>
                                        <td class="td-manage">
                                            <a title="编辑" href="javascript:;" onclick="cate_edit('编辑','/admin/cateedit/','{{ $i['id'] }}','','510')" class="ml-5" style="text-decoration:none">
                                                <i class="layui-icon">&#xe642;</i>
                                            </a>
                                            <a title="删除" href="javascript:;" onclick="cate_del(this,'{{ $i['id'] }}')" style="text-decoration:none">
                                                <i class="layui-icon">&#xe640;</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            @endforeach
            </tbody>
        </table>
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/js/x-layui.js" charset="utf-8"></script>
    <script>
        layui.use(['element', 'layer', 'form'], function () {
            $ = layui.jquery;//jquery
            lement = layui.element();//面包导航
        })
        //批量删除提交
        function delAll() {
            layer.confirm('确认要删除吗？', function (index) {
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', { icon: 1 });
            });
        }
        //-编辑
        function cate_edit(title, url, id, w, h) {
            x_admin_show(title, url+id, w, h);
        }
        /*-删除*/
        function cate_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                //发异步删除数据
                $.ajax({
                    url:'/admin/delcate/'+id,
                    type:'post',
                    data: { _token:"{{ csrf_token() }}" },
                    dataType: "json",
                })
                $(obj).parents("tr").remove();
                layer.msg('已删除!', { icon: 1, time: 1000 });
                location.replace(location.href);
            });
        }
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