<!DOCTYPE html>
<html lang="en">
<head>
  <title>List of Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<a href="admin" class="previous">&laquo; Back</a>

<div class="container">
  <h2>List of Users</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Categorey Description</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
      <tr>
        <td>{{$user['name']}}</td>
        <td>{{$user['description']}}</td>
        <td><a href="edit_category/{{$user['id']}}"> Edit</a>
        <a onclick="return confirm('if he deletes a category, all the products related to that category will be deleted.')"href="delete_category/{{$user['id']}}"> Delete</a></td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
<span>
  {{$users->links()}}
</span>
<style> 
.w-5{
display:none
}
    </style>
</body>
</html>
