<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Comment System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Style -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
        <style type="text/css">
            .b-example-divider {
              height: 3rem;
              background-color: rgba(0, 0, 0, .1);
              border: solid rgba(0, 0, 0, .15);
              border-width: 1px 0;
              box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            @media (min-width: 992px) {
              .rounded-lg-3 { border-radius: .3rem; }
            }

            body{
                margin-top:20px;
                background:#ebeef0;
            }

            .img-sm {
                width: 46px;
                height: 46px;
            }

            .panel {
                box-shadow: 0 2px 0 rgba(0,0,0,0.075);
                border-radius: 0;
                border: 0;
                margin-bottom: 15px;
                background-color: #fff;
            }

            .panel .panel-footer, .panel>:last-child {
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            .panel .panel-heading, .panel>:first-child {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

            .panel-body {
                padding: 25px 20px;
            }


            .media-block .media-left {
                display: block;
                float: left
            }

            .media-block .media-right {
                float: right
            }

            .media-block .media-body {
                display: block;
                overflow: hidden;
                width: auto
            }

            .middle .media-left,
            .middle .media-right,
            .middle .media-body {
                vertical-align: middle
            }

            .thumbnail {
                border-radius: 0;
                border-color: #e9e9e9
            }

            .tag.tag-sm, .btn-group-sm>.tag {
                padding: 5px 10px;
            }

            .tag:not(.label) {
                background-color: #fff;
                padding: 6px 12px;
                border-radius: 2px;
                border: 1px solid #cdd6e1;
                font-size: 12px;
                line-height: 1.42857;
                vertical-align: middle;
                -webkit-transition: all .15s;
                transition: all .15s;
            }
            .text-muted, a.text-muted:hover, a.text-muted:focus {
                color: #acacac;
            }
            .text-sm {
                font-size: 0.9em;
            }
            .text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
                line-height: 1.25;
            }

            .btn-trans {
                background-color: transparent;
                border-color: transparent;
                color: #929292;
            }

            .btn-icon {
                padding-left: 9px;
                padding-right: 9px;
            }

            .btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
                padding: 5px 10px !important;
            }

            .mar-top {
                margin-top: 15px;
            }
            .mar-left {
                margin-left: 50px;
            }
            .font-weight-bold{
                font-weight: bold;
            }

            .author-name-color{
                color: #3384ed;
            }
            .img-sm {
                width: 46px;
                height: 46px;
            }
            .img-circle {
                border-radius: 50%;
            }
            img {
                vertical-align: middle;
                border: 0;
            }
            .pad-10{
                padding: 10px;
            }

        </style>
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-lg-12">
                        <h1 class="display-5 fw-bold lh-1 mb-3">Laravel and Vue</h1>
                        <p class="lead">
                            <span class="font-weight-bold">Laravel</span> is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.
                        </p>
                        <p class="lead">
                            <span class="font-weight-bold">Vue</span> is a progressive framework for building user interfaces. Unlike other monolithic frameworks, Vue is designed from the ground up to be incrementally adoptable. The core library is focused on the view layer only, and is easy to pick up and integrate with other libraries or existing projects. On the other hand, Vue is also perfectly capable of powering sophisticated Single-Page Applications when used in combination with modern tooling and supporting libraries.
                        </p>

                        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
                        </div> -->
                    </div>
                </div>
                <comments></comments>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}" defer=""></script>
    </body>
</html>
