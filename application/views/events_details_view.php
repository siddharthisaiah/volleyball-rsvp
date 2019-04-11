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
                        <p>Are you going? <b>RSVP: Yes | No</b></p>
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
					<button class="btn btn-group btn-primary">Comment</button>
					<button class="btn btn-group btn-danger">Cancel</button>
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
 
</script>
