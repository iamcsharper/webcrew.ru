<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        html, body {
            overflow: hidden;
        }
        .middle-container {
            display: table;
            height: 100%;
            width: 100%;
        }

        .middle {
            display: table-cell;
            vertical-align: middle;
        }

        .center-col {
            float: none;
            margin-left: auto;
            margin-right: auto;
        }

        #main {
            opacity: 0;
        }

        .huge {
            font-size: 15em;
            display: inline-block;
            margin: 0;
            padding: 0;
        }

        .oops {
            display: inline-block;
        }

        .oops > img {
            margin-top: 10px;
        }
        #loader {
            opacity: 0;
        }

        #loading {
            opacity: 1;
            -webkit-animation: rotation 1.3s 1 ease-in-out;
            z-index: 100;
        }


        @-webkit-keyframes rotation {
            from {
                -webkit-transform: rotate(0deg) scale(9, 9) translate(-10px, -100px);
            }
            to {
                zoom: 1;
                -webkit-transform: rotate(359deg) scale(1, 1) translate(0, 0);
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div id="main" class="middle-container">
        <div class="middle">
            <div class="row">
                <div class="col-md-12 center-col text-center">
                    <div class="oops">
                        <img id="loader" class="img-responsive" width="100px"
                             src="{{asset('images/sad_emoji.png')}}"
                             alt="">
                        <h2>Упс.</h2>
                    </div>
                    <h1 class="huge">404</h1>
                </div>
                <div class="col-md-8 col-xs-12 center-col">
                    <h2>Такой страницы не существует. Если вы думаете, что это ошибка, дайте нам знать</h2>
                    <a href="mailto:ilyhaa19@gmail.com" class="btn btn-lg btn-block btn-primary">Отправить
                        письмо</a>
                    <hr>
                    <div class="text-center">
                    <a href="{{ (redirect()->back()->getTargetUrl() != url()->full()) ? redirect()->back()->getTargetUrl() : route('home')  }}" class="btn btn-link ">Вернуться назад</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let optimizedResize = (function () {

        var callbacks = [],
            running = false;

        // fired on resize event
        function resize() {

            if (!running) {
                running = true;

                if (window.requestAnimationFrame) {
                    window.requestAnimationFrame(runCallbacks);
                } else {
                    setTimeout(runCallbacks, 66);
                }
            }

        }

        // run the actual callbacks
        function runCallbacks() {

            callbacks.forEach(function (callback) {
                callback();
            });

            running = false;
        }

        // adds callback to loop
        function addCallback(callback) {

            if (callback) {
                callbacks.push(callback);
            }

        }

        return {
            // public method to add additional callback
            add: function (callback) {
                if (!callbacks.length) {
                    window.addEventListener('resize', resize);
                }
                addCallback(callback);
            }
        }
    }());

    function fadeIn(el, display, speed) {
        el.style.opacity = 0;
        el.style.display = display || "block";

        (function fade() {
            var val = parseFloat(el.style.opacity);
            if (!((val += .1*speed) > 1)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }

    const el = document.getElementById('main'),
        emoji = document.getElementById('loader');

    let resize = function () {
        el.style.minHeight = window.innerHeight + "px";
    };

    function getPos(el) {
        // yay readability
        for (var lx=0, ly=0; el !== null; lx += el.offsetLeft, ly += el.offsetTop, el = el.offsetParent);
        return {x: lx,y: ly};
    }

    window.addEventListener('load', () => {
        let offs = getPos(emoji);
        emoji.style.position = "absolute";
        emoji.style.top = offs.y + "px";
        emoji.style.left = offs.x + "px";

        resize();

        emoji.id = 'loading';
        fadeIn(emoji, null, .5);

        fadeIn(el, 'table', 0.2);
    });
    optimizedResize.add(resize);
</script>
</body>
</html>