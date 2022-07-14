<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <title>List User</title>
</head>
<body class="antialiased">
    <div class=".container-md" style="margin: 50px 10% ;">
        <div style="display: flex;justify-content:space-between;align-items:center;">
            <h1>List User</h1>
            <div style="display:flex; align-self: center;height:40px;">
                <a href="/create-user" class="btn btn-primary">Add User</a>
                <a href="/users" class="btn btn-primary">Show List User</a><br><br>
            </div>
        </div>        
        <form action="/search" method="POST" style="text-align:center;margin-left: 50%; 
                                            transform: translateX(-50%);margin-bottom:16px;
                                            background-color: aliceblue;padding:10px 16px;
                                            border-radius:10px"
        >
        @csrf
            <h3>Search</h3>
            <ul style="list-style: none;display: flex;justify-content:space-around;">
                <li>
                    <label for="name">Name</label>
                    <input type="radio" name="info" id="name" value="name">
                </li>
                <li>
                    <label for="posts">Amount Post</label>
                    <input type="radio" name="info" id="posts" value="posts">
                </li>
                <li>
                    <label for="comments">Amount Comment</label>
                    <input type="radio" name="info" id="comments" value="comments">
                </li>
            </ul>
            <input type="text" name="value" placeholder="Search....." style="height: 40px;border-radius:10px;border:1px solid;width:80%">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
        {{ $users->links() }}
        <br>
        <table id="dtBasicExample" class="sortable table table-success table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th class="th-sm">#</th>
                    <th class="th-sm">Avatar</th>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Email</th>
                    <th class="th-sm">Age</th>
                    <th class="th-sm">Date of Birth</th>
                    <th class="th-sm">Action</th>
                    <th class="th-sm">Info</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th>{{($user->id)}}</th>
                        <td><img src="http://localhost{{$user->avatar}}" alt="avatar" style="width: 70px; heigh:auto;"></td>
                        <td><a href="users/{{$user->id}}/posts">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->age}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>
                            <a href="/users/{{$user->id}}/comments" class='btn btn-primary' style="margin-bottom:10px">View comment</a><br>
                            <a href="/users/{{$user->id}}" class='btn btn-primary'>Show</a>
                        </td>
                        <td>
                            <a href="/users/{{$user->id}}/posts">
                                <p>Total Post: {{count($user->posts)}}</p>
                            </a>
                            <a href="/users/{{$user->id}}/comments">
                                <p>Total Comment: {{count($user->comments)}}</p>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>