<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
    <h1> You are Logged in</h1>

    <div style="border: 2px solid black; padding: 20px;">
        <h2>Create a New Post</h2>

        <form method="POST" action="/create-post">
            @csrf 
            <!-- need this for security -->
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Post Title" required>
            </div>
            <div>
                <label for="body">Body:</label>
                <textarea id="body" name="body"></textarea>
            </div>
            <button type="submit">Create Post</button>
 
    </div>

    <div style="border: 2px solid black; padding: 20px;">
        <h2> All post</h2>
        @foreach ($posts as $post)
            <div style="border: 1px solid gray; margin-bottom: 10px; padding: 10px;">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->body }}</p>
                <small>By User ID: {{ $post->user_id }}</small>
            </div>
        @endforeach
    </div>

    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>

    </form>
      
    @else
    <div style="border: 2px solid black; padding: 20px;">
      <h2>Register</h2>
        <form method="POST" action="/register">
            @csrf 
            <!-- need this for security -->
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

     <div style="border: 2px solid black; padding: 20px;">
      <h2>Login</h2>
        <form method="POST" action="/login">
            @csrf 
            <!-- need this for security -->
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="loginname" required>
            </div>
        
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="loginpassword" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
    
           
    @endauth
    
</body>
</html>