<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <!-- Styles -->
        <style>
           form label {
            display: inline-block;
            width: 100px;
            }

            form div {
            margin-bottom: 10px;
            }

            .error {
            color: red;
            margin-left: 5px;
            }

            label.error {
            display: inline;
            }

        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div>
            @if($errors->any())
            <h4 class="error">{{$errors->first()}}</h4>
            @endif
                <h2>User Form:</h2>
                <form action="{{url('addUser')}}" id="userform" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name"></input>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"></input>
                </div>
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password"></input>
                </div>
                <div>
                    <label for="phone">phone:</label>
                    <input type="text" id="phone" name="phone"></input>
                </div>
                <div>
                    <label for="first_name">Country:</label>
                    <input type="text" id="country" name="country"></input>
                </div>
                <div>
                    <label for="first_name">City:</label>
                    <input type="text" id="city" name="city"></input>
                </div>
                <div>
                    <label for="first_name">State:</label>
                    <input type="text" id="state" name="state"></input>
                </div>
                <div>
                    <label for="first_name">Address1:</label>
                    <input type="text" id="address1" name="address1"></input>
                </div>
                <div>
                    <label for="first_name">Address2:</label>
                    <input type="text" id="address2" name="address2"></input>
                </div>
                <div>
                    <!-- <input type="submit" value="Submit" /> -->
                    <button type="submit" class="first_form">Submit</button>
                </div>
                </form>
            </div>
        </div>




        <table class="table">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Addess</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user) 
                <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td><a href="{{url('edituser/'.$user->id)}}"><button class="btn btn-primary">Edit</button></a>
                <a href="{{url('deleteuser/'.$user->id)}}" onclick="return confirm('Are you sure?')"><button class="btn btn-primary">Delete</button></a>
            
                <a href="{{url('softdelete/'.$user->id)}}" onclick="return confirm('Are you sure?')"><button class="btn btn-primary">Soft Delete</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    
    <script>
        // $(document).ready(function() {

            $('.first_form').click(function(e) {
                e.preventDefault();
                var first_name = $('#first_name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var phone = $('#phone').val();
                var country = $('#country').val();
                var city = $('#city').val();
                var state = $('#state').val();
                var address1 = $('#address1').val();

                $(".error").remove();

                if (first_name.length < 1) {
                    $('#first_name').after('<span class="error">This field is required</span>');
                }
                if (phone.length < 1) {
                    $('#phone').after('<span class="error">This field is required</span>');
                }else{
                    var regEx = /^\d*(?:\.\d{1,2})?$/;
                    var validphone = regEx.test(phone);
                    if (!validphone) {
                    $('#phone').after('<span class="error">Enter a valid phone</span>');
                    }
                }
                if (country.length < 1) {
                    $('#country').after('<span class="error">This field is required</span>');
                }
                if (city.length < 1) {
                    $('#city').after('<span class="error">This field is required</span>');
                }
                if (state.length < 1) {
                    $('#state').after('<span class="error">This field is required</span>');
                }
                if (address1.length < 1) {
                    $('#address1').after('<span class="error">This field is required</span>');
                }
                
                if (email.length < 1) {
                    $('#email').after('<span class="error">This field is required</span>');
                } 

                if (password.length < 1) {
                    $('#password').after('<span class="error">Password must be at least 8 characters long</span>');
                }
                
                if(first_name && phone && country && city && state && address1 && email && password)
                {
                    $('#userform').submit();
                }
            });  

        // });

    </script>
</html>
