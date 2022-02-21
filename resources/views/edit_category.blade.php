
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
   <h3 align="center">Update Category</h3><br />

   <form method="post" action="../update_category/{{$users->id}}">
    @csrf
    <div class="form-group">
     <label>Category Name</label>
     <input type="text" name="name" class="form-control" value="{{$users->name}}" />
    </div>
    <div class="form-group">
     <label>Description</label>
     <input type="textarea" name="description" class="form-control" value="{{$users->description}}" />
    </div>

    <div class="form-group">
     <input type="submit" name="login" class="btn btn-primary" value="Update" />
    </div>
   </form>
  </div>
 </body>
</html>

