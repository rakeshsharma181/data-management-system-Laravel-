
<!DOCTYPE html>
<html>
 <head>
  <title>ADD USER</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <a href="admin" class="previous">&laquo; Back</a>

  <div class="container box">
   <h3 align="center">Add User</h3><br />
   <form method="post" action="create">
    @csrf
    <div class="form-group">
     <label>First Name</label>
     <input type="text" name="name" class="form-control" value ="{{old('name')}}"/>
     <span style="color:red"> @error("name"){{$message}}@enderror</span>
    </div>
    <div class="form-group">
     <label>Last Name</label>
     <input type="text" name="lname" class="form-control"value ="{{old('lname')}}" />
     <span style="color:red"> @error("lname"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <label>Email</label>
     <input type="email" name="email" class="form-control" value ="{{old('email')}}" />
     <span style="color:red"> @error("email"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="password" class="form-control" value ="{{old('password')}}"/>
     <span style="color:red"> @error("password"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <label>Confirm Password</label>
     <input type="password" name="cpassword" class="form-control" />
     <span style="color:red"> @error("cpassword"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <label>Role</label>
<select class="form-select" aria-label="Default select example" name="role" value ="{{old('role')}}">
  <option selected>Select Role</option>
  <option value="User Admin">User Admin</option>
  <option value="Sales">Sales</option>
</select>
<span style="color:red"> @error("role"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Submit" />
    </div>
   </form>
  </div>
 </body>
</html>

