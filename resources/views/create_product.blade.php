
<!DOCTYPE html>
<html>
 <head>
  <title>create product</title>
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
   <h3 align="center">Add Product</h3><br />
   <form method="post" action="add_product" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
     <label>Product Name</label>
     <input type="text" name="name" class="form-control" value ="{{old('name')}}"/>
     <span style="color:red"> @error("name"){{$message}}@enderror</span>
    </div>
    <div class="form-group">
     <label>Product Description</label>
     <input type="textarea" name="description" class="form-control"value ="{{old('description')}}" />
     <span style="color:red"> @error("description"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <label>Product Price</label>
     <input type="number" name="price" class="form-control"value ="{{old('price')}}" />
     <span style="color:red"> @error("price"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <label>Product Image</label>
     <input type="file" name="image" class="form-control"  />
     <span style="color:red"> @error("image"){{$message}}@enderror</span>

    </div>
    <div class="form-group">
     <label>Product Category</label>
     <select class="form-select" aria-label="Default select example" name="category" value ="{{old('category')}}">
  <option selected value="">Select Category</option>
  @foreach($users as $user)
<option name ="category"value="{{$user['id']}}">{{$user['name']}}</option>
@endforeach

</select>
     <span style="color:red"> @error("category"){{$message}}@enderror</span>

    </div>
    
    
    <div class="form-group">
     <input type="submit" name="add" class="btn btn-primary" value="ADD" />
    </div>
   </form>
  </div>
 </body>
</html>

 