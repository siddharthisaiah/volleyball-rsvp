<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Events</h2>
        <ol class="breadcrumb">
            <li>
                <a href="home">Home</a>
            </li>

	    <li>
                <a href="events">Events</a>
            </li>

            <li class="active">
                <strong>Details</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>


<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Event Name</h5>



                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>



                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Fuck you!</a>
                            </li>
                            <li><a href="#">Nosy Parker</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <div class="ibox-content">

		    <div class="row">
			<div class="col-lg-6">
			    <h3>Date : <?php echo $event_details['event_date']; ?></h3>
			    <h3>Time : <?php echo $event_details['time']; ?></h3>
			    <p><?php echo $event_details['description']; ?></p>
			</div>

			<div class="col-lg-6">
			    <h3>Date : 23/04/2019</h3>
			    <h3>Time : 16:20</h3>
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac ultrices diam. Maecenas a lorem a massa tristique suscipit. Curabitur elementum, urna eget elementum scelerisque, mauris velit consectetur mi, ut maximus risus dolor quis erat. Maecenas facilisis sapien sapien, eget elementum velit consectetur vel. Nunc fermentum felis nec interdum iaculis. In euismod ipsum ut malesuada gravida. Proin nec enim erat. Donec mattis non enim eget condimentum. Donec feugiat massa consectetur, placerat libero vitae, aliquam tellus.</p>
			</div>
		    </div>
		    
                    <hr/>
		    
                    <div>
                        <p>
			    <b>RSVP: </b>
			    <?php if($user_is_going_for_event) { ?>
				You are going for this event
			    <?php } else { ?>
				Your are NOT going for this event
			    <?php } ?>

				<button id="rsvp-yes" class="btn btn-xs btn-primary" title="Im going">
				    <i class="fa fa-check"></i>
				</button>


				<button id="rsvp-no" class="btn btn-xs btn-danger" title="cancel">
				    <i class="fa fa-times"></i>
				</button>

			</p>
		    </div>

                    <hr/>


		    <!-- Attendees and Waitlist -->
                    <div class="row">
			<div class="col-lg-6">
                            <a href="#" class=collapsible">Attendees</a>
                            <div class="content">
                                <ol>
				    <?php foreach($confirmed_users as $cu) { ?>
                                        <li><?php echo $cu['f_name'] . ' ' . $cu['l_name']; ?></li>
				    <?php } ?>
                                </ol>
			    </div>
			</div>
			<div class="col-lg-6">
			    <a class="collapsible" href="">
				Waitlist
			    </a>
			    <div class="content">
				<ol>
				    <?php foreach($waitlisted_users as $wu) { ?>
                                        <li><?php echo $wu['f_name'] . ' ' . $wu['l_name']; ?></li>
				    <?php } ?>
				</ol>
			    </div>
			</div>
		    </div>


<hr/>
                    <div class="row">
                        <div class="col-md-12">
			    <h3>Discussion Board</h3>
                            <div class="chat-discussion">
				<?php foreach($comments as $comment) { ?>
                                <div class="chat-message left">
				    <img class="message-avatar" alt="profile_pic" src="<?php echo $comment['profile_pic_url']; ?>"/>
                                    <div class="message">
                                        <a class="message-author" href="#">
					    <?php echo $comment['f_name'] . " " . $comment['l_name']; ?>
					</a>
                                        <span class="message-date">
					    <?php echo $comment['created_on']; ?>
					</span>
                                        <span class="message-content">
					    <?php echo $comment['comment']; ?>
					</span>
				    </div>
				</div>

				<?php } ?>

			    </div>
			</div>
		    </div>

		    

		    <!-- chat and comments -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="chat-message-form">
                                <div class="form-group">
                                    <textarea id="comment-text" name="comment-text" class="form-control message-input" placeholder="Write a comment here."></textarea>
                                    <br/>
                                    <div class="text-center">
					<button id="save-comment" class="btn btn-group btn-primary">Comment</button>
					<button id="cancel-comment" class="btn btn-group btn-danger">Cancel</button>
				    </div>
                                </div>
                            </div>
                        </div>
		    </div>
		    
		    

                </div>

            </div>
        </div>
    </div>
</div>


<script>

 $('#save-comment').click(function() {
     var comment = $('#comment-text').val().trim();
     var event_id = <?php echo $event_details['id']; ?>;
     
     if (comment == '' || comment == null || comment == undefined) {
	 alert("Cannot save a blank comment");
	 return false;
     }

     $.ajax({
	 url: base_url + "events/save_comment",
	 type: "POST",
	 data: {
	     comment: comment,
	     event_id: event_id
	 },
	 success: function(response) {
	     response = JSON.parse(response);
	     if(response.status == "success") {
		 location.reload();
	     } else {
		 alert("could not save comment, Please try again later");
	     }
	 },
	 error: function(response) {
	     response = JSON.parse(response);
	     alert("could not save comment, Please try again later");
	 }

     });
 });


 // clear the textarea 
 $('#cancel-comment').click(function() {
     $('#comment-text').val('');
 });


 $('#rsvp-yes').click(function() {
     var userIsGoing = <?php echo ($user_is_going_for_event ? 1 : 0); ?>;
     var eventId = <?php echo $event_id; ?>;
     
     if(userIsGoing) {
	 alert("You are going for this event!");
	 return true;
     }

     $.ajax({
	 url: base_url + "events/rsvp_to_event",
	 type: "POST",
	 data: {
	     event_id : eventId
	 },
	 success: function(response) {
	     response = JSON.parse(response);
	     
	     if(response.status == "success") {
		 console.log("You are now going for this event");
		 location.reload();
	     } else {
		 alert("something went wrong, please try again later");
	     }
	 },

	 error: function(response) {
	     alert("Could not RSVP, Please try again later");
	 }
     });

 });

 $('#rsvp-no').click(function() {
     var userIsGoing = <?php echo ($user_is_going_for_event ? 1 : 0); ?>;
     var eventId = <?php echo $event_id; ?>;
     
     if(!userIsGoing) {
	 alert("You are not going for this event!");
	 return true;
     }

     $.ajax({
	 url: base_url + "events/cancel_rsvp_to_event",
	 type: "POST",
	 data: {
	     event_id : eventId
	 },
	 success: function(response) {
	     response = JSON.parse(response);
	     
	     if(response.status == "success") {
		 console.log("You are now not going for this event");
		 location.reload();
	     } else {
		 alert("something went wrong, please try again later");
	     }
	 },

	 error: function(response) {
	     alert("Could not cancel, Please try again later");
	 }
     });
 });
</script>
