<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>{{date("l jS \of F Y h:i:s A")}}</p>
<hr>
<h1>Register Form</h1>
    <form action="{{url('/insert')}}" method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
         <p>Name: <input type="text" name="name"></p>
         <p>Email: <input type="email" name="email"></p>
         <p>Password: <input type="password" name="password"></p>
         <!-- <p>Repeat Password: <input type="repeat" name="repeat"></p> -->
         <p>Gender:
         	<select name="gender">
         		<option value="Male">Male</option>
         		<option value="Female">Female</option>
         	</select></p>
         <p>Photo: <input type="file" name="image"></p>
         
         
        
         <button type="submit">Register</button>

    </form>
</body>
</html>