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
            <a><cite>友情链接</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);"
            title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
        <form class="layui-form x-center" action="" style="width:80%">
            <div class="layui-form-pane" style="margin-top: 15px;">
                <div class="layui-form-item">
                    <label class="layui-form-label">日期范围</label>
                    <div class="layui-input-inline">
                        <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
                    </div>
                    <div class="layui-input-inline">
                        <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="username" placeholder="请输入登录名" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                    </div>
                </div>
            </div>
        </form>
        <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button
                class="layui-btn" onclick="admin_add('添加用户','/admin/linkadd','600','500')"><i class="layui-icon">&#xe608;</i>添加</button><span
                class="x-right" style="line-height:40px">共有数据：{{ count($data) }} 条</span></xblock>
        <table class="layui-table">
            <thead>
                <tr>

                    <th>
                        ID
                    </th>
                    <th>
                        链接地址
                    </th>
                    <th>
                        博客名
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $v)
                    <tr>
                        <td>
                            {{ $v['id'] }}
                        </td>
                        <td>
                            {{ $v['link'] }}
                        </td>
                        <td>
                            {{ $v['name'] }}
                        </td>
                        <td class="td-manage">
                            <a title="删除" href="javascript:;" onclick="admin_del(this,'{{ $v['id'] }}')" style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div id="page"></div>
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/js/x-layui.js" charset="utf-8"></script>
    <script>
        layui.use(['laydate', 'element', 'laypage', 'layer'], function () {
            $ = layui.jquery;//jquery
            laydate = layui.laydate;//日期插件
            lement = layui.element();//面包导航
            layer = layui.layer;//弹出层



            var start = {
                min: laydate.now()
                , max: '2099-06-16 23:59:59'
                , istoday: false
                , choose: function (datas) {
                    end.min = datas; //开始日选好后，重置结束日的最小日期
                    end.start = datas //将结束日的初始值设定为开始日
                }
            };

            var end = {
                min: laydate.now()
                , max: '2099-06-16 23:59:59'
                , istoday: false
                , choose: function (datas) {
                    start.max = datas; //结束日选好后，重置开始日的最大日期
                }
            };

            document.getElementById('LAY_demorange_s').onclick = function () {
                start.elem = this;
                laydate(start);
            }
            document.getElementById('LAY_demorange_e').onclick = function () {
                end.elem = this
                laydate(end);
            }

        });

        //批量删除提交
        function delAll() {
            layer.confirm('确认要删除吗？', function (index) {
                //捉到所有被选中的，发异步进行删除
                layer.msg('删除成功', { icon: 1 });
            });
        }
        /*添加*/
        function admin_add(title, url, w, h) {
            x_admin_show(title, url, w, h);
        }

        /*停用*/
        function admin_stop(obj, id) {
            layer.confirm('确认要停用吗？', function (index) {
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
                $(obj).remove();
                layer.msg('已停用!', { icon: 5, time: 1000 });
            });
        }

        /*启用*/
        function admin_start(obj, id) {
            layer.confirm('确认要启用吗？', function (index) {
                //发异步把用户状态进行更改
                $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="admin_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!', { icon: 6, time: 1000 });
            });
        }
        /*删除*/
        function admin_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    url:'/admin/dellink/'+id,
                    type:'post',
                    data: { _token:"{{ csrf_token() }}" },
                    dataType: "json",
                })
                //发异步删除数据
                $(obj).parents("tr").remove();
                layer.msg('已删除!', { icon: 1, time: 1000 });
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