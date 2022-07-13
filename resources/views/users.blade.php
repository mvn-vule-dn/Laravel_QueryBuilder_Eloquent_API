<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>List User</title>
    <style>
        table thead tr th{
            min-width: 80px;
        }
    </style>
</head>
<body class="antialiased">
    <div class=".container-md" style="margin: 50px 10% ;">
        <h1>List User</h1>
        <a href="/create-user" class="btn btn-primary">Add User</a>
        <a href="/users" class="btn btn-primary">Show List User</a><br><br>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Age</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i < count($users); $i++)
                    <tr>
                        <th scope='row'>{{($i+1)}}</th>
                        <td scope='row'><img src="http://localhost{{$users[$i]->avatar}}" alt="avatar" style="width: 70px; heigh:auto;"></td>
                        <td scope='row'><a href="users/{{$users[$i]->id}}/posts">{{$users[$i]->name}}</a></td>
                        <td scope='row'>{{$users[$i]->email}}</td>
                        <td scope='row'>{{$users[$i]->age}}</td>
                        <td scope='row'>{{$users[$i]->birthday}}</td>
                        <td scope='row'>
                            {{-- <a href="/Laravel-Practice/public/deleteUser/{{$users[$i]->id}}" class='btn btn-danger'>Delete</a> --}}
                            <a href="/users/{{$users[$i]->id}}/comments" class='btn btn-primary' style="margin-bottom:10px">View comment</a><br>
                            <a href="/users/{{$users[$i]->id}}" class='btn btn-primary'>Show</a>
                        </td>
                    </tr>
                @endfor
                </tr>
            </tbody>
        </table>
    </div>
    
</body>
</html>