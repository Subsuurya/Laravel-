<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @auth
        <p>Congrats you are logged in </p>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Log Out</button>
        </form>
            
            <div> 
                <h2>Create a Post</h2>
                <form action="/create-post" method="POST">
                    @csrf
                    <input name = "title" type="text" placeholder="post title">
                    <textarea name = "body" placeholder="body content..."></textarea>
                    <button type="submit">Create Post</button>
        
                </form>
            </div>

            <div>
                <h2> All Blog Posts </h2>
                @foreach($posts as $post)  
                <div style="border: 2px solid black; margin: 10px; padding: 10px;">
                    <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                    {{$post['body']}}
                    <p><a href = '/edit-post/{{$post->id}}'>Edit</a></p>
                    <form action = "/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>

                    </form>
                </div>

                @endforeach

            </div>
            
    @else
        <div style="text-align: center; border: 2px solid black; padding: 20px;">
            <h2>Register</h2>
            <form action="/register" method = "POST">
                @csrf
                <input name = "name" type="text" placeholder="name" /><br /><br />
                <input name = "email" type="text" placeholder="email" /><br /><br />
                <input name = "password" type="password" placeholder="password" /><br /><br />
                <button type="submit">Register</button>
            </form>
        </div>
        <div style="text-align: center; border: 2px solid black; padding: 20px;">
            <h2>Login</h2>
            <form action="/login" method = "POST">
                @csrf
                <input name = "loginname" type="text" placeholder="name" /><br /><br />
                <input name = "loginpassword" type="password" placeholder="password" /><br /><br />
                <button type="submit">Login</button>
            </form>
        </div>


    @endauth

    

  
   
</body>
</html>