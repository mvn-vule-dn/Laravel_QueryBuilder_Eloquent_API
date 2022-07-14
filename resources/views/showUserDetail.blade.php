<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User Detail</title>
    <style>
        table thead tr th{
            min-width: 80px;
        }
    </style>
</head>
<body class="antialiased">
    <section style="margin: 0 10%;background-color:aliceblue;">
        <h2 style="padding: 15px 40px">Profile:</h2>
        <div style="padding: 30px;display: flex; justify-content: center;">
            <img src="http://localhost{{$user->avatar}}" alt="avatar" style="margin-right: 24px">
            <table>
                <tr>
                    <th>User Name:</th>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <th>Age:</th>
                    <td>{{$user->age}}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{$user->profile->address}}</td>
                </tr>
                <tr>
                    <th>Tel:</th>
                    <td>{{$user->profile->tel}}</td>
                </tr>
                <tr>
                    <th>Province:</th>
                    <td>{{$user->profile->province}}</td>
                </tr>
            </table>
        </div>
    </section>
    <div class=".container-md" style="margin: 50px 10% ;">
        <h1>List Post</h1>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Content</th> 
                    <th scope="col">Create At</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i < count($user->posts); $i++)
                    <tr>
                        <th scope='row'>{{($i+1)}}</th>
                        <td scope='row'>{{$user->posts[$i]->user_id}}</td>
                        <td scope='row'>{{$user->posts[$i]->content}}</td>
                        <td scope='row'>{{$user->posts[$i]->created_at}}</td>
                    </tr>
                @endfor
                </tr>
            </tbody>
        </table>
    </div>
    <div class=".container-md" style="margin: 50px 10% ;">
        <h1>List Comment</h1>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Content</th> 
                    <th scope="col">Post id</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i < count($user->comments); $i++)
                    <tr>
                        <th scope='row'>{{($i+1)}}</th>
                        <td scope='row'>{{$user->comments[$i]->user_id}}</td>
                        <td scope='row'>{{$user->comments[$i]->content}}</td>
                        <td scope='row'>{{$user->comments[$i]->post_id}}</td>
                    </tr>
                @endfor
                </tr>
            </tbody>
        </table>
        <a href="/users" class="btn btn-primary hBack">List User</a>
    </div>
</body>
</html>