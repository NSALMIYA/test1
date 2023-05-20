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
            <h4>{{$errors->first()}}</h4>
            @endif
                <h2>User Edit:</h2>
                <?php $add = explode(',', $users->address); ?>
                <form action="{{url('updateUser')}}" id="userform" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="userID" value="{{$users->id}}">
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value="{{$users->name}}"></input>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{$users->email}}"></input>
                </div>

                <div>
                    <label for="phone">phone:</label>
                    <input type="text" id="phone" name="phone" value="{{$users->phone}}"></input>
                </div>
                <div>
                    <label for="first_name">Country:</label>
                    <input type="text" id="country" name="country" value="{{$users->country}}"></input>
                </div>
                <div>
                    <label for="first_name">City:</label>
                    <input type="text" id="city" name="city" value="{{$users->city}}"></input>
                </div>
                <div>
                    <label for="first_name">State:</label>
                    <input type="text" id="state" name="state" value="{{$users->state}}"></input>
                </div>
                <div>
                    <label for="first_name">Address1:</label>
                    <input type="text" id="address1" name="address1" value="{{$add[0]}}"></input>
                </div>
                <div>
                    <label for="first_name">Address2:</label>
                    <input type="text" id="address2" name="address2" value="{{$add[1]}}"></input>
                </div>
                <div>
                    <!-- <input type="submit" value="Submit" /> -->
                    <button type="submit" class="first_form">Submit</button>
                </div>
                </form>
            </div>
        </div>


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

              
                if(first_name && phone && country && city && state && address1 && email )
                {
                    $('#userform').submit();
                }
            });  

        // });

    </script>
</html>
