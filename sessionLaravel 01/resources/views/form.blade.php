
     <!DOCTYPE html>
     <html lang="en">
     <head>
       <title>Register</title>
       <meta charset="utf-8">
       <style>
     .error {color: #FF0000;}
     </style>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     </head>
     <body>
     
     <div class="container">
       <h2>Register</h2>
       <form method="post" action="<?php echo url('form')?>"  enctype ="multipart/form-data">
    
        @method('Post')
        @csrf     
       <div class="form-group">
         <label for="exampleInputEmail1">Name</label>
         <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
        
       </div>
      
     
       <div class="form-group">
         <label for="exampleInputEmail1">Email address</label>
         <input type="email" name="email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        
       </div>
     
       <div class="form-group">
         <label for="exampleInputPassword1">Password</label>
         <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
       
       </div>
       <div class="form-group">
         <label for="exampleInputPassword1">Address</label>
         <input type="text" name="address"   class="form-control" id="exampleInputPassword1" placeholder="Address">
         
       </div>
       <div class="form-group">
         <label for="exampleInputPassword1">Gender</label>
         <input type="radio" name="gender"value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?> >Female
         <input type="radio" name="gender"value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?>>Male
         <
       </div>
       
       <div class="form-group">
         <label for="exampleInputEmail1">LinkedIn Profile</label>
         <input type="text" name="website" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Linkedin Profile">
        
       </div>
       <button type="submit" class="btn btn-primary">Save</button>
     </form>

     </div>
     
     </body>
     </html>