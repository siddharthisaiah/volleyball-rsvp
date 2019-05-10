<!-- Start loading and initializing of FB api -->
<script>
 window.fbAsyncInit = function() {
     FB.init({
	 appId      : '415179922611740',
	 cookie     : true,
	 xfbml      : true,
	 version    : 'v3.2'
     });
     
     FB.AppEvents.logPageView();
     
     
 };

 (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>
<!-- End loading and initializing of FB api -->
<style>
    #normal-login-form {
    display : none;
    }
</style>
<div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">BKK VolleyBall Meetup</h2>

                <p>
                    Login and check out upcoming events!
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">

		    <div class="form-group">
			<button id="fb-login" class="btn btn-success btn-facebook block full-width">
			    <i class="fa fa-facebook"></i> Continue with Facebook
			</button>
		    </div>
		    
                    <?php echo form_open("login/authenticate", 'class="m-t" role="form"'); ?>

		    
		    <!--
                    <div class="text-center">
			<a id="nl-btn">
			    <small>or sign in with email</small>
			</a>
                        <br/>
		    </div>
		    -->
                    <div id="normal-login-form">
			<div class="form-group">
                            <input name="username" type="email" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <!-- <a href="#">
                             <small>Forgot password?</small>
                             </a> -->

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
			<?php echo form_close(); ?>
			
		    </div>
                </div>
            </div>
        </div>

        <script>

	 function is_registered_fb_user(fb_user_id) {
	     $.ajax({
		 url: base_url + "login/is_registered_fb_user",
		 type: "POST",
		 async: false, // make it asynchronous so it can return the response
		 data: {
		     user_id : fb_user_id
		 },

		 success: function(response) {
		     response = JSON.parse(response);
		     console.log(response);
		     if (response.status == "success") {
			 return true;
		     }
		 },

		 error: function(response) {
		     console.log("Something went wrong");
		 }
	     });

	     return false;
	 }


	 $('#fb-login').click(function() {
	     console.log("You clicked the fb login button");

	     FB.login(function(response) {
		 if (response.status === "connected") {
		     console.log("the user is logged in and connected");
		     console.log(response);
		     var accessToken = response.authResponse.accessToken;
		     var userId = response.authResponse.userID;
		     console.log("Access Token: " + accessToken);
		     console.log("User Id: " + userId);


		     // get user information like firstname, lastname, profile picture etc
		     FB.api(userId, {fields: "first_name, last_name, picture", access_token : accessToken}, function (response) {
			 var firstName = response.first_name;
			 var lastName = response.last_name;
			 var picUrl = response.picture.data.url;

			 
			 console.log(firstName);
			 console.log(lastName);
			 console.log(picUrl);
			 console.log(userId);
			 console.log(accessToken);

			 $.ajax({
			     url : base_url + "login/login_or_register_fb_user",
			     type: "POST",
			     data: {
				 userId : userId,
				 firstName : firstName,
				 lastName : lastName,
				 picUrl : picUrl,
				 accessToken : accessToken
			     },
			     success: function(response) {
				 response = JSON.parse(response);
				 if (response.status == 'success') {
				     location.reload();
				 }
			     },

			     error: function(response) {
				 alert("could not login, Please try again later");
			     }
			     
			 });
		     });


		     
		     
		 } else {
		     console.log("user is not logged in");
		 }
	     });

	 });

	 /* show the normal login on clicking the link */
	 $('#nl-btn').click(function() {
	     $('#normal-login-form').show();
	 });

	 
        </script>
