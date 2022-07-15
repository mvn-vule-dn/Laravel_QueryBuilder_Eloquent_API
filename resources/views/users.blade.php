<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

    <title>List User</title>
</head>
<body class="antialiased">
    <div class=".container-md" style="margin: 50px 10% ;">
        <div style="display: flex;justify-content:space-between;align-items:center;">
            <h1>List User</h1>
            <div style="display:flex; align-self: center;height:40px;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate" id="btn-create">Add User</button>
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
                    <label for="username">Name</label>
                    <input type="radio" name="info" id="username" value="name">
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
        @if(Route::current()->getName() == 'users')
        {!! $users->links() !!}
        @endif
        <br>
        <table id="dtBasicExample" class="sortable table table-success table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th class="th-sm">#</th>
                    <th class="th-sm">Avatar</th>
                    <th class="th-sm">Name</th>
                    <th class="th-sm">Email</th>
                    <th class="th-sm">age</th>
                    <th class="th-sm">Date of Birth</th>
                    <th class="th-sm">Amount</th>
                    <th class="th-sm">View</th>
                    <th class="th-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="data-row">
                        <th class="id">{{($user->id)}}</th>
                        <td class="avatar"><img src="{{URL::to($user->avatar)}}" alt="avatar" style="width: 70px; heigh:auto;"></td>
                        <td class="name"><a href="users/{{$user->id}}/posts" class="btn btn-link">{{$user->name}}</a></td>
                        <td class="email">{{$user->email}}</td>
                        <td class="age">{{$user->age}}</td>
                        <td class="birthday">{{$user->birthday}}</td>
                        <td>
                            <a href="/users/{{$user->id}}/posts" class="btn btn-link">
                                <p>Total Post: {{count($user->posts)}}</p>
                            </a>
                            <a href="/users/{{$user->id}}/comments" class="btn btn-link">
                                <p>Total Comment: {{count($user->comments)}}</p>
                            </a>
                        </td>
                        <td>
                            <a href="/users/{{$user->id}}/comments" class='btn btn-info' style="margin-bottom:10px">Comment</a><br>
                            <a href="/users/{{$user->id}}" class='btn btn-info'>Detail</a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" style="margin-bottom:10px" data-toggle="modal" data-item-id="{{$user->id}}" data-target="#modalEdit" id="btn-edit">Edit User</button><br>                            
                            <button type="button" id="btn-delete" class="btn btn-danger" data-toggle="modal" data-item-id="{{$user->id}}" data-target="#modalDelete">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
        
    </div>

    @extends('modal.edit')
    @extends('create-user')
    @extends('modal.delete')

    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
            crossorigin="anonymous"></script>
    <script>
        jQuery(document).ready(function(){
            let ID;
            $(document).on('click', "#btn-edit", async function() {
                await $(this).addClass('edit-item-trigger-clicked'); 
                var options = {
                'backdrop': 'static'
                };
                $('#modalEdit').modal(options);
            })

            $('#modalEdit').on('show.bs.modal', function() {        
                setTimeout(function(){ 
                    var el = $(".edit-item-trigger-clicked"); 
                    var row = el.closest(".data-row");

                    var id = el.data('item-id');
                    var name = row.children(".name").text();
                    var age = row.children(".age").text();
                    var email = row.children(".email").text();
                    var birthday = row.children(".birthday").text();
                    // console.log(name);
                    ID = id;

                    $("#id").val(id);
                    $("#name").val(name);
                    $("#age").val(age);
                    $("#birthday").val(birthday)
                    $("#email").val(email);    
                },1);
            })


            $('#modalEdit').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#modalEdit").trigger("reset");
            })


            $(document).on('click', "#btn-delete", async function() {
                await $(this).addClass('delete-item-trigger-clicked'); 
                var options = {
                'backdrop': 'static'
                };
                $('#modalDelete').modal(options)
            })

            $('#modalDelete').on('show.bs.modal', function() {        
                setTimeout(function(){ 
                    var el = $(".delete-item-trigger-clicked");
                    var id = el.data('item-id');
                    ID = id; 
                },1);
            })


            $('#modalDelete').on('hide.bs.modal', function() {
                $('.delete-item-trigger-clicked').removeClass('delete-item-trigger-clicked')
                $("#modalDelete").trigger("reset");
            })

            //edit
            $('#btn-update-user').on('click', function() {
                var form = new FormData($('#form-edit-user')[0]);
                $.ajax({
                    url: '/api/users/'+ID,
                    type: 'POST',
                    dataType: 'json',
                    data: form,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        window.location.reload();
                        alert("success");
                        // console.log(data)
                    },
                    error: function(e) {
                        alert("something went wrong!!");
                        console.log(e);
                    }
                });
            })

            //create
            $('#btn-create-user').on('click', function() {
            var form = new FormData($('#form-create-user')[0]);
                $.ajax({
                    url: '/api/users',
                    type: 'POST',
                    dataType: 'json',
                    data: form,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert("success");
                        // console.log(data);
                        window.location.reload();
                    },
                    error: function(e) {
                        alert("something went wrong!!");
                        console.log(e);
                    }
                });
            });

            //delete
            $('#delete-confirm').on('click', function() {
                $.ajax({
                    url: '/api/users/'+ID,
                    type: 'DELETE',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert("success");
                        console.log(data);
                        window.location.reload();
                    },
                    error: function(e) {
                        alert("something went wrong!!");
                        console.log(e);
                    }
                });
            });

    });
    </script>
        
</body>
</html>