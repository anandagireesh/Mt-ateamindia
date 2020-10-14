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
                   <a href="/logout"> Change Profile Pic</a>
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
        <div class="container">
<div class="col-md-6">
    <div class="form-group">
        <label>Upload Image</label>
        <form action="/updateimage" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="input-group">
            <input type="hidden" value="{{ $userdetails->gender }}">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">

                    Browse&hellip; <input type="file" name="image" id="imgInp">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload'/>
    </div>
    <button type="submit" class="btn btn-outline-success">Success</button>
</form>
@endforeach	
</div>
</div>
<script type="text/javascript">
$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
	});
</script>
</div>
            
                
                
              </div>

              
            </div>
		</div>
	</div>
</div>







@include('userprofile/userfooter')


