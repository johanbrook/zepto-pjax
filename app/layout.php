<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo empty($title) ? '' : "$title - "; ?>pjax</title>
    <script src="https://github.com/madrobby/zepto/raw/master/src/zepto.js"></script>
    <script src="https://github.com/madrobby/zepto/raw/master/src/event.js"></script>
    <script src="https://github.com/madrobby/zepto/raw/master/src/ajax.js"></script>
    <script src="./zepto.cookie.js"></script>
    <script src="./zepto.pjax.js"></script>
    <script type="text/javascript">
        $(function() {
            var checkbox = $('input[type="checkbox"]');
            checkbox[0].checked = Boolean($.cookie('pjax'));
            if (!checkbox[0].checked) $.fn.pjax = $.noop;
            checkbox.bind('change', function(e) {
                $.cookie('pjax', e.currentTarget.checked ? true : null);
                window.location = location.href
            })
        });
        $(function(){
            // pjax
            $('ul a').pjax('#main')
        });
    </script>
    <style type="text/css">
        pre{
            float:left;
        }
        #main{
            font-family:Helvetica,Arial,sans-serif;
            float:left;
            margin-left:-120px;
            padding-top:80px;
            width:30%;
        }
        ul{padding-left:15px;}
    </style>
</head>
<body>

<pre>

               ／￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣￣
               |　<b>It's <?php echo strftime('%I:%M:%S %p'); ?></b>
               ＼＿　 ＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
        .--.     (  )
       /    \   ( )
      ## a  a  .
      (   '._)
       |'-- |
     _.\___/_   ___<label><input type="checkbox" name="pjax" />pjax</label>___
   ."\> \Y/|<'.  '._.-'
  /  \ \_\/ /  '-' /
  | --'\_/|/ |   _/
  |___.-' |  |`'`
    |     |  |
    |    / './
   /__./` | |
      \   | |
       \  | |
       ;  | |
       /  | |
 jgs  |___\_.\_
      `-"--'---'

<a href="https://github.com/jimisaacs/zepto-pjax">github.com/jimisaacs/zepto-pjax</a>
</pre>

<div id="main">
    <?php echo $view_content; ?>
</div>
</body>
</html>