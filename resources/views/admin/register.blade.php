<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>闲鱼后台注册</title>
    <link rel="stylesheet" href="/admin/css/vendor.css">
    <!-- Theme initialization -->
    <script>
        var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
        var themeName = themeSettings.themeName || '';
        if (themeName)
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
        }
        else
        {
            document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
        }
    </script>
</head>

<body>
<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> 闲鱼后台管理系统 </h1>
            </header>
            <div class="auth-content">
                @if(count($errors) > 0)
                    <div class="alert alert-danger" id="error">
                        <ul>
                            @foreach($errors -> all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('admin/doregister') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>
                            用户名:
                        </label>
                        <input class="form-control underlined" name="uname" placeholder="请输入6-12位字母组合"
                               required type="text">
                    </div>
                    <div class="form-group">
                        <label>
                            密码:
                        </label>
                        <input type="password" class="form-control underlined" name="password"
                               placeholder="你的密码" required>
                    </div>
                    <div class="form-group">
                        <label>
                            密码:
                        </label>
                        <input type="password" class="form-control underlined" name="repwd"
                               placeholder="再次输入密码" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">
                            注&nbsp;&nbsp;册
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function re_captcha() {
        $url = "{{ URL('/code/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
    }
</script>
<script src="/admin/js/vendor.js"></script>
<script src="/admin/js/app.js"></script>
<script>
    setTimeout(function(){
        $('#error').hide();
    },3000);
</script>
</body>

</html>