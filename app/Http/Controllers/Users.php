<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class Users extends Controller
{
    

  public function login(Request $req)
  {
    

      $email=$req->post('email');
      $pass=$req->post('password');
      $result=User::where(['email'=>$email,'password'=>Hash::check($req->$pass, 'password')])->get();

      if(isset($result['0']->fname))
      {

          $req->session()->put('admin_login',true);
          $req->session()->put('id',$result['0']->fname);
          $req->session()->put('role',$result['0']->role);

          $categories=Category::count();
          $req->session()->put('category',$categories);

          $users=User::count();
          $req->session()->put('user',$users);

          $products=Product::count();
          $req->session()->put('product',$products);
      

          return redirect('admin');
      }
      else{

        $req->session()->flash('error','Please enter valid login details');
        return redirect('./');
      }
  }
public function create(Request $req)
{

$req->validate([
'name'=>'required',
'lname'=>'required',
'email'=>'required',
'password' => 'required',
'cpassword' => 'required|same:password',
'role' => 'required'
]);

    $data=new User;
    $data->fname=$req->name;
    $data->lname=$req->lname;
    $data->email=$req->email;
    $data->password=Hash::make($req->password);
    $data->role=$req->role;
    $data->save();

    $maildata=['name'=>$req->name,'email'=>$req->email,'password'=>$req->password];
    $user['to']=$data->email;
    Mail::send('mail',$maildata,function($message) use ($user)

     {
         $message->to($user['to']);
         $message->subject('Welcome at Neosoft');

     });

     return redirect('list');
}

public function list(Request $req)
{

$data=User::orderBy('created_at','desc')->paginate(5);
return view('show',['users'=>$data]);
}

public function userupdate()
{

    $data=User::paginate(5);
    return view('update',['users'=>$data]);
}

public function edit($id)
{
    $data=User::find($id);

    return view('edit',['users'=>$data]);


}
public function update(Request $req,$id)
{
 
    $data =User::find($id);
    $data->fname=$req->name;
    $data->lname=$req->lname;
    $data->email=$req->email;
    $data->password=$req->password;
    $data->role=$req->role;
    $data->save();
    $maildata=['name'=>$req->name,'email'=>$req->email,'password'=>$req->password];
    $user['to']=$data->email;
    Mail::send('updatemail',$maildata,function($message) use ($user)
 
      {
          $message->to($user['to']);
          $message->subject('User Details Updated');
 
      });

     return redirect('list');

}
public function delete($id)
{
    User::destroy(array('id',$id));
    return redirect('list');

}


public function add(Request $req)
{

$req->validate([
'name'=>'required',
'description'=>'required'
]);

    $data=new Category;
    $data->name=$req->name;
    $data->description=$req->description;
     $data->save();

     return redirect('list_category');
}

public function list_category(Request $req)
{
    
    $data=Category::orderBy('created_at','desc')->paginate(5);
    return view('show_category',['users'=>$data]);
    
}

public function edit_category($id)
{
    $data=Category::find($id);

    return view('edit_category',['users'=>$data]);


}


public function update_category(Request $req,$id)
{
 
    $data =Category::find($id);
    $data->name=$req->name;
    $data->description=$req->description;
    $data->save();
     return redirect('list_category');

}

public function delete_category($id)
{
    

    $brand = Category::find($id);
    $brand->products()->delete();
    Category::destroy(array('id',$id));

    return redirect('list_category');

}

public function product()
{
    $data=Category::all();
    return view('create_product',['users'=>$data]);
}


public function add_product(Request $req)
{

$req->validate([
'name'=>'required',
'description'=>'required',
'price'=>'required',
'image'=>'required|mimes:png,jpg,jpeg|max:2048',
'category'=>'required'

]);

    $data=new Product;
    $data->name=$req->name;
    $data->description=$req->description;
    $data->price=$req->price;
    $data->image=$req->file('image')->store('docs');
    $data->category_id=$req->category;

     $data->save();

     return redirect('list_product');
}

public function list_product(Request $req)
{
   
    $data=Product::orderBy('created_at','desc')->paginate(5);
    return view('show_product',['users'=>$data]);
}

public function edit_product($id)
{

 
    $data=Product::find($id);

    return view('edit_product',['users'=>$data]);


}

public function update_product(Request $req,$id)
{
    $req->validate([
        'name'=>'required',
        'description'=>'required',
        'price'=>'required',
        'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        'category'=>'required'
        
        ]);

    $data =Product::find($id);
    $data->name=$req->name;
    $data->description=$req->description;
    $data->price=$req->price;
    $data->image=$req->file('image')->store('docs');
    $data->category_id=$req->category;
    $data->save();
     return redirect('list_product');

}

public function delete_product($id)
{
    Product::destroy(array('id',$id));
    return redirect('list_product');

}

}
