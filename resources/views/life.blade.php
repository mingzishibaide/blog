<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>暖冬个人博客</title>
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
  <div class="pagebg sh"></div>
  <div class="container">
    <h1 class="t_nav"><span>慢生活，不是懒惰，放慢速度不是拖延时间，而是让我们在生活中寻找到平衡。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">慢生活</a></h1>
    <!--blogsbox begin-->
    <div class="blogsbox">
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="blogpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">帝国cms 首页或者列表页 实现图文不同样式调用方法</a></h3>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！...</p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view">4567已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bplist"><a href="/" title="">
            <li><img src="/images/avatar.jpg" alt=""></li>
            <li><img src="/images/toppic02.jpg" alt=""></li>
            <li><img src="/images/banner01.jpg" alt=""></li>
          </a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bigpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="blogpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">帝国cms 首页或者列表页 实现图文不同样式调用方法</a></h3>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！...</p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view">4567已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bplist"><a href="/" title="">
            <li><img src="/images/avatar.jpg" alt=""></li>
            <li><img src="/images/bi05.jpg" alt=""></li>
            <li><img src="/images/banner01.jpg" alt=""></li>
          </a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="blogpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">帝国cms 首页或者列表页 实现图文不同样式调用方法</a></h3>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！...</p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view">4567已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bplist"><a href="/" title="">
            <li><img src="/images/avatar.jpg" alt=""></li>
            <li><img src="/images/toppic02.jpg" alt=""></li>
            <li><img src="/images/banner01.jpg" alt=""></li>
          </a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bigpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="blogpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">帝国cms 首页或者列表页 实现图文不同样式调用方法</a></h3>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！...</p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view">4567已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bplist"><a href="/" title="">
            <li><img src="/images/avatar.jpg" alt=""></li>
            <li><img src="/images/bi05.jpg" alt=""></li>
            <li><img src="/images/banner01.jpg" alt=""></li>
          </a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bigpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">帝国cms 首页或者列表页 实现图文不同样式调用方法</a></h3>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！...</p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view">4567已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bplist"><a href="/" title="">
            <li><img src="/images/avatar.jpg" alt=""></li>
            <li><img src="/images/bi05.jpg" alt=""></li>
            <li><img src="/images/banner01.jpg" alt=""></li>
          </a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>
      <div class="blogs" data-scroll-reveal="enter bottom over 1s">
        <h3 class="blogtitle"><a href="/" target="_blank">别让这些闹心的套路，毁了你的网页设计!</a></h3>
        <span class="bigpic"><a href="/" title=""><img src="/images/toppic01.jpg" alt=""></a></span>
        <p class="blogtext">如图，要实现上图效果，我采用如下方法：1、首先在数据库模型，增加字段，分别是图片2，图片3。2、增加标签模板，用if，else if
          来判断，输出。思路已打开，样式调用就可以多样化啦！... </p>
        <div class="bloginfo">
          <ul>
            <li class="author"><a href="/">杨青</a></li>
            <li class="lmname"><a href="/">学无止境</a></li>
            <li class="timer">2018-5-13</li>
            <li class="view"><span>34567</span>已阅读</li>
            <li class="like">9999</li>
          </ul>
        </div>
      </div>

      <div class="pagelist"><a title="Total record">&nbsp;<b>45</b> </a>&nbsp;&nbsp;&nbsp;<b>1</b>&nbsp;<a href="/download//index_2">2</a>&nbsp;<a
          href="/download//index_2">下一页</a>&nbsp;<a href="/download//index_2">尾页</a></div>

    </div>
    <!--blogsbox end-->
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
          <li><a href="http://www.yangqq.com" target="_blank">杨青博客</a></li>
          <li><a href="http://www.yangqq.com" target="_blank">D设计师博客</a></li>
          <li><a href="http://www.yangqq.com" target="_blank">优秀个人博客</a></li>
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
  </div>
  <footer>
    <p>Design by <a href="javaScript:;" target="_blank">暖冬个人博客</a> <a href="javaScript:;"></a></p>
  </footer>
  <a href="#" class="cd-top">Top</a>
</body>

</html>