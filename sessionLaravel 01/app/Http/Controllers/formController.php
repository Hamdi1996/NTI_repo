<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class formController extends Controller
{
    //

    public function register()
    {
        return view('form');
        
    }

    public function store(Request $request)
    {
        $name      = $request->name;
        $email     = $request->email;
        $password  = $request->password;
        $address   = $request->address;
        $gender    = $request->gender;
        $website   = $request->website;
   
        $errors = [];
        if(empty($name)){
          $errors['Name'] = "Field Required";
        }
        elseif(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
          $errors['Name'] = "Field Muts String";
        }

        
        if(empty($email)){
           $errors['email'] = "Field Required";
         }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           $errors['email'] = "Ivalid Email";
         }

         if(empty($password)){
            $errors['Password'] = "Field Required";
          }
          elseif(strlen($password)<6){
            $errors['Password'] = "Password Must be More than 6";
          }

          if(empty($address)){
            $errors['address'] = "Field Required";
          }
          elseif(!strlen($address)==6){
            $errors['address'] = "Password Must be 10";
          }

          if (empty($gender)) {
            $errors['gender'] = "Gender is required";
          } 

          if (empty($website)) {
            $errors['website'] = "Required URL";
          } elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
              $errors['website'] = "Invalid URL";
            }
          
  
   
        if(count($errors) > 0 ){
            foreach($errors as $key => $value){
   
              echo '* '.$key.' : '.$value;
   
           }
        }else{
             
              return view('profile',compact('errors'));
        }
        
    }

    public function show()
    {
        # code...
    }
}
