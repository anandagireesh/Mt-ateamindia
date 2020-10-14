<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
       .signup{
        padding-top:50px;
        }
        .asterisc {
             color: red;
    
              }
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
</head>
<body>
<div class="row justify-content-center signup">
<div class="col-md-6">
<div class="card">
<header class="card-header">
	
	<h4 class="card-title mt-2">Sign up</h4>
</header>
<article class="card-body">
<form action="/registerprocess" method="post">
        {{ csrf_field() }}
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
	<div class="form-row">
		<div class="col form-group">
            <label>First name </label>  
            <span class="asterisc">*</span> 
		  	<input type="text" name="firstname" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
            <label>Last name</label>
            <span class="asterisc">*</span> 
		  	<input type="text" name="lastname" class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
        <label>Email address</label>
        <span class="asterisc">*</span> 
		<input type="text" name="email" class="form-control" placeholder="">
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div> <!-- form-group end.// -->
	<div class="form-group">
			<label class="form-check form-check-inline">
            
		  <input class="form-check-input" type="radio" name="gender" value="Male">
		  <span class="form-check-label"> Male </span>
		</label>
		<label class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="gender" value="Female">
		  <span class="form-check-label"> Female</span>
		</label>
	<div class="form-group">
        <label>Create password</label>
        <span class="asterisc">*</span> 
	    <input class="form-control" name="password" type="password">
	</div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the 'Register' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Have an account? <a href="">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div> 
</body>
</html>