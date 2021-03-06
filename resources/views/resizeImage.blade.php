<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="container">
    <h1>Resize Image Uploading Demo</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Original Image:</strong>
                <br/>
                <img src="/images/{{ Session::get('imageName') }}"/>
            </div>
            <div class="col-md-4">
                <strong>Thumbnail Image:</strong>
                <br/>
                <img src="/thumbnail/{{ Session::get('imageName') }}"/>
            </div>
        </div>
    @endif
    <form action="{{route('resizeImagePost')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <br/>
                <input type="text" name="title">
            </div>
            <div class="col-md-12">
                <br/>
                <input type="file" name="image">
            </div>
            <div class="col-md-12">
                <br/>
                <button type="submit" class="btn btn-success">Upload Image</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>