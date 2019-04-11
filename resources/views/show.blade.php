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
    <table class="table table-striped">
        <thead>
        <tr>
            <td>Author</td>
            <td>Title</td>
            <td>Description</td>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->author}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->description}}</td>
            <td><form method="post" action="{{url('/blog/edit')}}">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <input type="hidden" value={{$blog->id}} name="blog_id" />
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </td>
            <td><form method="post" action="{{url('/blog/delete')}}">
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <input type="hidden" value={{$blog->id}} name="blog_id" />
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{url('/create/blog')}}">Create Blog</a>
</body>
</html>
