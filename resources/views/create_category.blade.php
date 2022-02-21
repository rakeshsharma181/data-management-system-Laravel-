
<!DOCTYPE html>
<html>
 <head>
  <title>create category</title>
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
   <h3 align="center">Add Category</h3><br />
   <form method="post" action="add_category">
    @csrf
    <div class="form-group">
     <label>Category Name</label>
     <input type="text" name="name" class="form-control" value ="{{old('name')}}"/>
     <span style="color:red"> @error("name"){{$message}}@enderror</span>
    </div>
    <div class="form-group">
     <label>Category Description</label>
     <input type="textarea" name="description" class="form-control"value ="{{old('lname')}}" />
     <span style="color:red"> @error("description"){{$message}}@enderror</span>

    </div>
    
    <div class="form-group">
     <input type="submit" name="category" class="btn btn-primary" value="ADD" />
    </div>
   </form>
  </div>
 </body>
</html>

