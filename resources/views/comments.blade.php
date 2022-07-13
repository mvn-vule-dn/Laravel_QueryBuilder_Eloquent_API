<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>List Comment</title>
    <style>
        table thead tr th{
            min-width: 80px;
        }
    </style>
</head>
<body class="antialiased">
    <div class=".container-md" style="margin: 50px 10% ;">
        <div style="display: flex;justify-content: space-between;">
            <h1>List Comment</h1>
            @if(count($comments)>0)
            <a href="/comments/{{$comments[0]->user_id}}/users" class="btn btn-primary" style="height: 40px;align-self:center">Show User</a>
            @endIf
        </div>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Content</th> 
                    <th scope="col">Post id</th>
                </tr>
            </thead>
            @if(count($comments)>0)
            <tbody>
                @for($i=0; $i < count($comments); $i++)
                    <tr>
                        <th scope='row'>{{($i+1)}}</th>
                        <td scope='row'>{{$comments[$i]->user_id}}</td>
                        <td scope='row'>{{$comments[$i]->content}}</td>
                        <td scope='row'>{{$comments[$i]->post_id}}</td>
                    </tr>
                @endfor
                </tr>
            </tbody>
            @endIf
        </table>
        <a href="/users" class="btn btn-primary hBack">List User</a>
    </div>
    
</body>
</html>