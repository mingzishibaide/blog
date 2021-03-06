<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>关于我</title>
  <meta name="keywords" content="个人博客,暖冬个人博客,暖冬" />
  <meta name="description" content="暖冬个人博客" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/base.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  <link href="css/m.css" rel="stylesheet">
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/jquery.easyfader.min.js"></script>
  <script src="js/scrollReveal.js"></script>
  <script src="js/common.js"></script>
  <!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
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
  <div class="pagebg ab"> </div>
  <div class="container">
    <h1 class="t_nav"><span>像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。</span><a href="/" class="n1">网站首页</a><a href="#" class="n2">关于我</a></h1>
    <div class="news_infos">
      <ul>
        <p>90后的苦逼程序员，自17年接触程序开发学习过H5C3，JavaScript，PHP，Python，对于PHP有较为深入的研究</p>
      </ul>
    </div>
    <div class="sidebar">
      <div class="about">
        <p class="avatar"> <img src="images/avatar.jpg" style="height:100px;" alt=""> </p>
        <p class="abname">dancesmile | 暖冬</p>
        <p class="abposition">Web前端设计师、网页设计</p>
        <p class="abtext"> 90后的苦逼程序员，自17年接触程序开发学习过H5C3，JavaScript，PHP，Python，对于PHP有较为深入的研究。 </p>
      </div>
      <div class="weixin">
        <h2 class="hometitle">微信关注</h2>
        <ul>
          <img src="images/wx.jpg">
        </ul>
      </div>
    </div>
  </div>
  <footer>
    <p>Design by <a href="javaScript:;" target="_blank">暖冬个人博客</a> <a href="javaScript:;">晋ICP备18013961号-1</a></p>
  </footer>
  <a href="#" class="cd-top">Top</a>
</body>
</html>