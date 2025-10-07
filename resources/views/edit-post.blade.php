<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Edit post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
    @csrf
    @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{$post->title}}">
        </div>
        <div>
            <label for="body">Body:</label>
            <textarea id="body" name="body">{{$post->body}}</textarea>
        </div>
        <button type="submit">Update Post</button>
    </form>
    
</body>
</html>