<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'わくわくの森') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/saruFace12.png') }}">
        <script>
            (function(d) {
                var config = {
                kitId: 'xwd1kce',
                scriptTimeout: 3000,
                async: true
                },
                h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
            })(document);
        </script>
        <script src="{{ asset('/js/app.js') }}" defer></script>
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="backgroundPng">
            <div id="top">
                <div id="welcome">
                    <h1>ようこそ ~ {{ config('app.name', 'わくわくの森') }}へ</h1>
                     <p class="buttons">
                        <a href="/home">~ 旅に行く ~</a>
                    </p>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
