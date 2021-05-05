<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password], input[type=email] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2>Register Form</h2>

<form action="{{route('save')}}" method="post">
@if(Session::get('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif

@if(Session::get('fail'))
<div class="alert alert-fail">{{Session::get('fail')}}</div>
@endif

  @csrf
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Name</b></label>
    <input type="text" placeholder="Enter Username" name="name" required>
    <span style=color:red">@error('name'){{$message}}@enderror</span>

    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
    <span style=color:red">@error('email'){{$message}}@enderror</span>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <span style=color:red">@error('password'){{$message}}@enderror</span>
        
    <button type="submit">SignUp</button>
   
  </div>
  <a href="{{route('loginnow')}}">Login Now</a>
  </form>

</body>
</html>
