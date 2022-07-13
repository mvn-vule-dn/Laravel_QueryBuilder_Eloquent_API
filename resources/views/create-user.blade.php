<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create User</title>
    <style>
        table thead tr th{
            min-width: 80px;
        }
        table tr td{
            /* min-width: 160px; */
            padding: 5px;
        }
        table tbody tr{
            padding-bottom: 10px
        }
    </style>
</head>
<body class="antialiased">
    <section style="margin: 0 10%;background-color:aliceblue;">
        <h2 style="padding: 15px 40px">Create user:</h2>
        <div style="padding: 30px;display: flex; justify-content: center;">
            <form action="/create-user" method="POST" style="background-color: aqua;padding: 30px 50px;border-radius:10px">
                {{csrf_field()}}
                <table>
                    <tr>
                        <th><label for="username">User Name:</label></th>
                        <td><input type="text" name="username" id="username" placeholder="Enter your name" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="age">Age:</label></th>
                        <td><input type="text" name="age" id="age" placeholder="Enter your age" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="birthday">Date of Birth:</label></th>
                        <td><input type="date" name="birthday" id="birthday" placeholder="Choose your birthday" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="tel">Tel:</label></th>
                        <td><input type="text" name="tel" id="tel" placeholder="Enter your phone number" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="address">Address:</label></th>
                        <td><input type="text" name="address" id="address" placeholder="Enter your address" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="province">Province:</label></th>
                        <td><input type="text" name="province" id="province" placeholder="Enter your province" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="email">Email:</label></th>
                        <td><input type="text" name="email" id="email" placeholder="Enter your email" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="password">Password:</label></th>
                        <td><input type="password" name="password" id="password" placeholder="Enter your password" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label for="confirm-password">Confirm Password:</label></th>
                        <td><input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" class="form-control"></td>
                    </tr>
                </table>
                <input type="submit" value="Create User" class="btn btn-primary">
            </form>
        </div>
    </section>
    <div class=".container-md" style="margin: 50px 10% ;">
        <a href="/users" class="btn btn-primary hBack">List User</a>
    </div>
</body>
</html>