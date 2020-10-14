@include('userprofile/userheader')

<!-- 
<div class="col-12">
    <div class="row">
        <div class="col-12">
            <div class="col-4">
                <div class="sidenav bg-dark">
                    <div class="profilepicdiv">
                        <img src="assets/img/Profile-PNG-Icon.png" class="rounded-circle bg-light profilepic">
                    </div>  
                </div>
            </div>
            <div class="col-4">
                hello
            </div>
            <div class="col-4">
                    hi how are you.............................................................................................
            </div>
        </div>
    </div>
</div>

 -->

 <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">

            @foreach($userdetails as $userdetails)
				<div class="profile-userpic">
					<img src="{{ $userdetails->profilepic }}" class="img-responsive" alt="">
                </div>
                
				<div class="profile-usertitle">
                <div class="profile-usertitle-job">
                   <a href="/changeimage"> Change Profile Pic</a>
					</div>
					<div class="profile-usertitle-name">
                    {{ $userdetails->firstname }} {{ $userdetails->lastname }}
					</div>
					<div class="profile-usertitle-job">
                    {{ $userdetails->email }}
                    </div>
                    <div class="profile-usertitle-job">
                    {{ $userdetails->gender }}
                    </div>
                    <div class="profile-usertitle-job">
                    Edit profile
                    </div>
                    <div class="profile-usertitle-job">
                   <a href="/logout"> Logout</a>
					</div>
                </div>
                

            
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
              <div class="row">
                <div class="col-9">
       
       
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Edit profile</li>
                        </ol>
                        </nav>
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
		  	<input type="text" name="firstname" value="{{ $userdetails->firstname }}" class="form-control" placeholder="">
		</div> <!-- form-group end.// -->
		<div class="col form-group">
            <label>Last name</label>
            <span class="asterisc">*</span> 
		  	<input type="text" name="lastname" value="{{ $userdetails->lastname }}" class="form-control" placeholder=" ">
		</div> <!-- form-group end.// -->
	</div> <!-- form-row end.// -->
	<div class="form-group">
        <label>Email address</label>
        <span class="asterisc">*</span> 
		<input type="text" name="email" class="form-control" value="{{ $userdetails->email }}" readonly placeholder="">
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
        <button type="submit" class="btn btn-primary btn-block"> Edit  </button>
    </div> <!-- form-group// -->      
   </form>
   @endforeach	
</div>
                <div class="col-3">

                <div class="media">
                <div class="card" style="width: 18rem;">
                @foreach($friends as $friends)
                        <div class="card-body">
                            <img src="{{$friends->profilepic}}" class="mr-3" alt="..." width="80px" height="80px">
                            <div class="media-body">
                                <h6 class="mt-0">{{$friends->firstname}} {{$friends->lastname}}</h6>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>

                </div>
                
              </div>

              
            </div>
		</div>
	</div>
</div>







@include('userprofile/userfooter')


