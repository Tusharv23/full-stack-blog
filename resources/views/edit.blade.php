<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <div class="row">
        <form method="post" action="{{url('/blog/update')}}">
            <div class="form-group">
                <input type="hidden" value="{{csrf_token()}}" name="_token" />
                <input type="hidden" value={{$blog->id}} name="blog_id" />
                <label for="title">Blog Title:</label>
                <input type="text" class="form-control" value={{$blog->title}} name="title" />
            </div>
            <div class="form-group">
                <label for="description">Blog Description:</label>
                <textarea cols="5" rows="5" class="form-control" name="description">{{$blog->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="author">Blog Author:</label>
                <input type="text" class="form-control" value={{$blog->author}} name="author" />
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
</body>
</html>
