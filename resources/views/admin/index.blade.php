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
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/css/x-admin.css" media="all">
</head>

<body>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header header header-demo">
            <div class="layui-main">
                <a class="logo" href="/admin">
                    暖冬的后台
                </a>
                <ul class="layui-nav" lay-filter="">
                    <li class="layui-nav-item"><a href="/">前台首页</a></li>
                </ul>
            </div>
        </div>
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
                    <li class="layui-nav-item">
                        <a class="javascript:;" href="javascript:;">
                            <i class="layui-icon" style="top: 3px;">&#xe647;</i><cite>日志管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/questionlist">
                                    <cite>日志列表</cite>
                                </a>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a class="javascript:;" href="javascript:;">
                            <i class="layui-icon" style="top: 3px;">&#xe630;</i><cite>分类管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/category">
                                    <cite>分类列表</cite>
                                </a>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a class="javascript:;" href="javascript:;">
                            <i class="layui-icon" style="top: 3px;">&#xe630;</i><cite>链接管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/linklist">
                                    <cite>链接列表</cite>
                                </a>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item">
                        <a class="javascript:;" href="javascript:;">
                            <i class="layui-icon" style="top: 3px;">&#xe606;</i><cite>留言管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd class="">
                                <a href="javascript:;" _href="/admin/commentlist">
                                    <cite>留言列表</cite>
                                </a>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item" style="height: 30px; text-align: center">
                    </li>
                </ul>
            </div>
        </div>
        <div class="layui-tab layui-tab-card site-demo-title" lay-filter="x-tab" lay-allowclose="true">
            <ul class="layui-tab-title">
                <li class="layui-this">
                    日志列表
                    <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                </li>
            </ul>
            <div class="layui-tab-content site-demo site-demo-body">
                <div class="layui-tab-item layui-show">
                    <iframe frameborder="0" src="/admin/questionlist" class="x-iframe"></iframe>
                </div>
            </div>
        </div>
        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">
                &#xe602;
            </i>
        </div>
        <div class="site-mobile-shade">
        </div>
    </div>
    <script src="/lib/layui/layui.js" charset="utf-8"></script>
    <script src="/js/x-admin.js"></script>
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