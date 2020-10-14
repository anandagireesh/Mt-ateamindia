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
                

            @endforeach	
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
              <div class="row">
                <div class="col-9">
       
       
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Friend suggettion</li>
                        </ol>
                        </nav>
                    <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                         <div class="carousel-inner">
                    
                                <div class="carousel-item active">
                                     <div class="row">

                                            @foreach($Fsuggession as $Fsuggession)
                                            
                                                    @if ($Fsuggession->status == 1)
                                                    
                                                    @else
                                                        <div class="col-md-4 mb-3">
                                                             <div class="card">
                                                             <img class="img-fluid" alt="100%x280" src=" {{ $Fsuggession->profilepic }}">
                                                                    <div class="card-body">
                                                                        <h4 class="card-title"> {{ $Fsuggession->firstname }} {{ $Fsuggession->lastname }}</h4>
                                                                    
                                                                        @if ($Fsuggession->status == '0' && $Fsuggession->reciever == $userdetails->id)


                                                                        <a href="/acceptRequest/{{ $Fsuggession->id }}/{{ $Fsuggession->reciever }}"> <button type="button" class="btn btn-outline-danger disabled"> Accept Request</button> </a>
                                                                
                                                                        @else
                                                                        <a href="/sendrequest"> <button type="button" class="btn btn-outline-info"> Send request</button> </a>
                                                                        
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endif

                                                   @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
     
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


