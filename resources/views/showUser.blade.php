<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>User</title>
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
        <a href="/users/{{$user->id}}/comments" class="btn btn-primary hBack">Back</a>
        <a href="/users" class="btn btn-primary hBack">List User</a>
    </div>
</body>
</html>