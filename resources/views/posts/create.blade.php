<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Create Post</title>
</head>
<body>
<div class="container">
    <h1> Create New Post </h1>
    <form action="{{route('posts.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" placeholder="enter post title" value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" class="form-control @error('body') is-invalid @enderror" id="body" name="body" placeholder="enter post body" value="{{old('body')}}">
            @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <a class="btn btn-primary" href="{{route('posts.index')}}" role="button">Back to home</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
</body>
</html>
