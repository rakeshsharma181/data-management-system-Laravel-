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
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Role</th>
        @if(session('role')=='User Admin' || session('role')=='Superadmin')

        <th>Action</th>
@endif
      </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
      <tr>
        <td>{{$user['fname']}}</td>
        <td>{{$user['lname']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['role']}}</td>
        @if(session('role')=='User Admin' || session('role')=='Superadmin')
        <td><a href="edit/{{$user['id']}}"> Edit</a>
        <a onclick="return confirm('Do you want to delete?')"href="delete/{{$user['id']}}"> Delete</a></td> @endif
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
