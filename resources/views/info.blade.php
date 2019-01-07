<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $data['title'] }}</title>
  <meta name="keywords" content="个人博客,暖冬个人博客,暖冬" />
  <meta name="description" content="暖冬个人博客" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/css/base.css" rel="stylesheet">
  <link href="/css/index.css" rel="stylesheet">
  <link href="/css/m.css" rel="stylesheet">
  <script src="/js/jquery.min.js" type="text/javascript"></script>
  <script src="/js/jquery.easyfader.min.js"></script>
  <script src="/js/scrollReveal.js"></script>
  <script src="/js/common.js"></script>
  <!--[if lt IE 9]>
<script src="/js/modernizr.js"></script>
<![endif]-->
</head>

<body>
  <header>
    <!--menu begin-->
    <div class="menu">
      <nav class="nav" id="topnav">
        <h1 class="logo"><a href="/">暖冬的博客</a></h1>
        <li><a href="/">网站首页</a> </li>
        @foreach ($top['cat1'] as $v)
        <li><a href="javaScript:;">{{ $v['name'] }}</a>
          <ul class="sub-nav">
            @foreach ($top['cat2'] as $i)
            @if ($i['pid'] == $v['id'])
            <li><a href="/list/{{$i->id}}">{{ $i['name'] }}</a></li>
            @endif
            @endforeach
          </ul>
        </li>
        @endforeach
        <li><a href="/time">时间轴</a> </li>
        <li><a href="/about">关于我</a> </li>
        <li><a href="/gbook">留言</a> </li>
        <!--search begin-->
        <div id="search_bar" class="search_bar">
          <form id="searchform" action="[!--news.url--]e/search/index.php" method="post" name="searchform">
            <input class="input" placeholder="想搜点什么呢..." type="text" name="keyboard" id="keyboard">
            <input type="hidden" name="show" value="title" />
            <input type="hidden" name="tempid" value="1" />
            <input type="hidden" name="tbname" value="news">
            <input type="hidden" name="Submit" value="搜索" />
            <span class="search_ico"></span>
          </form>
        </div>
        <!--search end-->
      </nav>
    </div>
    <!--menu end-->
    <div id="mnav">
      <h2><a href="/" class="mlogo">暖冬博客</a><span class="navicon"></span></h2>
      <dl class="list_dl">
        <dt class="list_dt"> <a href="/">网站首页</a> </dt>
        @foreach ($top['cat1'] as $v)
        <dt class="list_dt"> <a href="javaScript:;">{{ $v['name'] }}</a> </dt>
        <dd class="list_dd">
          <ul>
            @foreach ($top['cat2'] as $i)
            @if ($i['pid'] == $v['id'])
            <li><a href="/list/{{$i->id}} ">{{ $i['name'] }}</a></li>
            @endif
            @endforeach
          </ul>
        </dd>
        @endforeach
        <dt class="list_dt"> <a href="/about">关于我</a> </dt>
        <dt class="list_dt"> <a href="/time">时间轴</a> </dt>
        <dt class="list_dt"> <a href="/gbook">留言</a> </dt>
      </dl>
    </div>
  </header>
  <article>
    <div class="infosbox">
      <div class="newsview">
        <h3 class="news_title">{{ $data['title'] }}</h3>


        <div class="bloginfo">
          <ul>
            <li class="timer">{{ substr($data['created_at'],0,10) }}</li>
            <li class="view">{{ $data['display'] }}已阅读</li>
            <li class="like">{{ $data['like'] }}</li>
          </ul>
        </div>
        <div class="news_about">
          <strong>简介</strong>
          {{ $data['describe'] }}
        </div>
        <div class="news_con">
          {!! $data['content'] !!}
        </div>
      </div>
      <div class="share">
        <p class="diggit"><a href="JavaScript:;" onclick="zan({{ $data['id'] }})">很赞哦！</a>(<b id="diggnum">{{ $data['like'] }}</b>)</p>
        <p class="dasbox"><a href="javascript:void(0)" onClick="dashangToggle()" class="dashang" title="打赏，支持一下">打赏本站</a></p>
        <div class="hide_box"></div>
        <div class="shang_box"> <a class="shang_close" href="javascript:void(0)" onclick="dashangToggle()" title="关闭">关闭</a>
          <div class="shang_tit">
            <p>感谢您的支持，我会继续努力的!</p>
          </div>
          <div class="shang_payimg"> <img src="/images/alipayimg.jpg" alt="扫码支持" title="扫一扫"> </div>
          <div class="pay_explain">扫码打赏，你说多少就多少</div>
          <div class="shang_payselect">
            <div class="pay_item checked" data-id="alipay"> <span class="radiobox"></span> <span class="pay_logo"><img
                  src="/images/alipay.jpg" alt="支付宝"></span> </div>
            <div class="pay_item" data-id="weipay"> <span class="radiobox"></span> <span class="pay_logo"><img src="/images/wechat.jpg"
                  alt="微信"></span> </div>
          </div>
          <script type="text/javascript">
            $(function () {
              $(".pay_item").click(function () {
                $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
                var dataid = $(this).attr('data-id');
                $(".shang_payimg img").attr("src", "/images/" + dataid + "img.jpg");
                $("#shang_pay_txt").text(dataid == "alipay" ? "支付宝" : "微信");
              });
            });
            function dashangToggle() {
              $(".hide_box").fadeToggle();
              $(".shang_box").fadeToggle();
            }
            function zan(id){
              var a = document.getElementById('diggnum').innerHTML

              document.getElementById('diggnum').innerHTML = ++a
                $.ajax({
                  url:'/admin/like/'+id,
                  type:'post',
                  data: { _token:"{{ csrf_token() }}" },
                  dataType: "json",
              })
            }
          </script>
        </div>
      </div>
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
          @foreach ($blog as $v)
        <li><a href="/info/{{$v['id']}}" title="{{ $v['title'] }}">{{ $v['title'] }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
    <div class="sidebar">
      <div class="tuijian">
        <h2 class="hometitle">推荐文章</h2>
        <ul class="sidenews">
          @foreach ($right['like'] as $v)
          <li> <i><img src="{{ $right['like_img'][$v['id']]['src'] }}"></i>
            <p><a href="/info/{{ $v['id'] }}">{{ $v['title'] }}</a></p>
            <span>{{ substr($v['created_at'],0,10) }}</span>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="tuijian">
        <h2 class="hometitle">点击排行</h2>
        <ul class="sidenews">
          @foreach ($right['display'] as $v)
          <li> <i><img src="{{ $right['display_img'][$v['id']]['src'] }}"></i>
            <p><a href="/info/{{ $v['id'] }}">{{ $v['title'] }}</a></p>
            <span>{{ substr($v['created_at'],0,10) }}</span>
          </li>
          @endforeach
        </ul>
      </div>
      <div class="links">
        <h2 class="hometitle">友情链接</h2>
        <ul>
          @foreach ($right['link'] as $v)
          <li><a href="{{ $v['link'] }}" target="_blank">{{ $v['name'] }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="guanzhu" id="follow-us">
        <h2 class="hometitle">关注我们 么么哒！</h2>
        <ul>
          <li class="qq"><a href="javaScript:;" target="_blank"><span>QQ号</span>2399805056</a></li>
          <li class="email"><a href="javaScript:;" target="_blank"><span>邮箱帐号</span>15203576944@163.com</a></li>
          <li class="wxgzh"><a href="javaScript:;" target="_blank"><span>微信号</span>weixin-linsansi</a></li>
          <li class="wx"><img src="/images/wx.jpg"></li>
        </ul>
      </div>
    </div>
  </article>
  <footer>
    <p>Design by <a href="javaScript:;" target="_blank">暖冬个人博客</a> <a href="javaScript:;">晋ICP备18013961号-1</a></p>
  </footer>
  <a href="#" class="cd-top">Top</a>
</body>

</html>