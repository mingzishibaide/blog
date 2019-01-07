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
    <h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">学无止境</a></h1>
    <!--blogsbox begin-->
    <div class="blogsbox">
      @foreach ($data as $v)
        <div class="blogs" data-scroll-reveal="enter bottom over 1s">
          <h3 class="blogtitle"><a href="/info/{{ $v['id'] }}" target="_blank">{{ $v['title'] }}</a></h3>
          @if (count($img[$v['id']][0])==1)
            <span class="blogpic"><a href="/info/{{ $v['id'] }}" title="">@foreach ($img[$v['id']][0] as $i)<img src="{{ $i->src }}" alt="">@endforeach</a></span>
          @elseif(count($img[$v['id']][0])==3)
            <span class="bplist">
              <a href="/info/{{ $v['id'] }}" title="">
                @foreach ($img[$v['id']][0] as $i)
                <li><img src="{{ $i->src }}" alt=""></li>
                @endforeach
              </a>
            </span>
          @endif
          <p class="blogtext">{{ mb_substr($v['describe'],0,50,'utf-8').'....' }} </p>
          <div class="bloginfo">
            <ul>
              <li class="lmname"><a href="/info/{{ $v['id'] }}">{{ $v['cat'] }}</a></li>
              <li class="timer">{{ substr($v['created_at'],0,10) }}</li>
              <li class="view"><span>{{ $v['display'] }}</span>已阅读</li>
              <li class="like">{{ $v['like'] }}</li>
            </ul>
          </div>
        </div>
      @endforeach
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
  </div>
  </div>
  <footer>
    <p>Design by <a href="javaScript:;" target="_blank">暖冬个人博客</a> <a href="javaScript:;"></a></p>
  </footer>
  <a href="#" class="cd-top">Top</a>
</body>

</html>
<script>
    var a =  false
    var page = 2

   $(window).scroll(function(event){
      if(a) {
          return ;
        }
      // 当滚动到最底部以上50像素时， 加载新内容

      if ( $(document).height()-$(window).scrollTop()-$(window).height()<150){
        a = true
        $.ajax({
          url : '/ajax/getblog/'+page,
          type : 'POST',
          dataType : 'json',
          data : { _token:"{{ csrf_token() }}" },
          success: function (data){
            if(data == null){
              a = true
            }
            var img = data.img
            var data = data.data
            var blog = document.getElementById('blog')
            for (const v in data) {
                          var html = `<div class="blogs" data-scroll-reveal="enter bottom over 1s" >
                          <h3 class="blogtitle"><a href=""/info/`+data[v].id+`" target="_blank">`+data[v]['title']+`</a></h3>`
                          if(img[data[v]['id']].length==1){
                            html += `<span class="blogpic"><a href=""/info/`+data[v].id+`" title=""><img src="`+img[data[v]['id']][0].src+`" alt=""></a></span>`
                          } else if(img[data[v]['id']].length==3){
                            html += `<span class="bplist"><a href=""/info/`+data[v].id+`" title="">`
                                    for (const i in img[data[v]['id']]) {
                                    html += `<li><img src="`+ img[data[v]['id']][i].src +`" alt=""></li>`
                                    }
                            html += `</a></span>`
                          }
                          html += `<p class="blogtext">`+data[v].describe.substr(0,50)+`... </p>
                          <div class="bloginfo">
                            <ul>
                              <li class="lmname"><a href="/list/`+data[v].cid+`">`+ data[v].cat +`</a></li>
                              <li class="timer">`+data[v].created_at.substr(0,10)+`</li>
                              <li class="view"><span>`+data[v].display+`</span>已阅读</li>
                              <li class="like">`+data[v].like+`</li>
                            </ul>
                          </div>
                        </div>`;
            blog.insertAdjacentHTML('beforeEnd',html)
            }
            page++
            a = false
          },
        })
      }
    })

</script>