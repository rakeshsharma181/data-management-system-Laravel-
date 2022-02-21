
<!DOCTYPE html>
<html>
 <head>
  <title>Update</title>
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
  <a href="../admin" class="previous">&laquo; Back</a>

  <div class="container box">
   <h3 align="center">Update User</h3><br />

   <form method="post" action="update/{{$users->id}}">
    @csrf
    <div class="form-group">
     <label>First Name</label>
     <input type="text" name="name" class="form-control" value="{{$users->fname}}" />
    </div>
    <div class="form-group">
     <label>Last Name</label>
     <input type="text" name="lname" class="form-control" value="{{$users->lname}}" />
    </div>
    <div class="form-group">
     <label>Email</label>
     <input type="email" name="email" class="form-control" value="{{$users->email}}" />
    </div>
    <div class="form-group">
     <label>Enter Password</label>
     <input type="password" name="password" class="form-control" value="{{$users->password}}" />
    </div>
    <div class="form-group">
     <label>Confirm Password</label>
     <input type="password" name="cpassword" class="form-control" value="{{$users->password}}"  />
    </div>
    <div class="form-group">
     <label>Role</label>
     
     <input type="text" name="role" class="form-control" value="{{$users->role}}"  />
    </div>
    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="update" />
    </div>
   </form>
  </div>
 </body>
</html>

