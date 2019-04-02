<link href="static/css/plugins/clockpicker/clockpicker.css" rel="stylesheet"/>


<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Update Event</h2>
        <ol class="breadcrumb">
            <li>
                <a href="home">Home</a>
            </li>
	    <li>
                <a href="events">Events</a>
            </li>

            <li class="active">
                <strong>Update</strong>
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
                    <h5>Update volleyball Meetup</h5>



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

                    <!-- create form goes here -->

                    <form id="update-form" method="POST">

			<input name="event_id" type="hidden" id="event_id" value="<?php echo $event_details['id']; ?>"/>
			
                        <div class="form-group">
                            <label for="event_name">Name</label>
                            <input name="event_name" type="text" class="form-control" placeholder="Volleyball Meetup" value="<?php echo $event_details['name']; ?>" />
			</div>

                        <div class="form-group">
                            <label for="event_description">Description</label>
                            <input name="event_description" type="text" class="form-control" placeholder="The usual weekly volleyball :) " value="<?php echo $event_details['description']; ?>" />
			</div>

                        <div class="form-group" id="select-date">
                            <label for="event_date">Date</label>
                            <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
				</span>
				<input name="event_date" type="text" class="form-control" placeholder="mm/dd/yyyy" value="<?php echo date("m-d-Y", strtotime($event_details['event_date'])); ?>" />
			    </div>
			</div>

                        <div class="form-group">
                            <label for="event_time">Time</label>
                            <div class="input-group clockpicker">
                                <span class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
				</span>
				<input name="event_time" type="text" class="form-control" placeholer="09:30" value="<?php echo date("H:i", strtotime($event_details['time'])); ?>" />
			    </div>
			</div>

                        <div class="form-group">
                            <label for="event_limit">Member limit</label>
                            <input name="event_limit" type="number" min="1" class="form-control" value="<?php echo $event_details['limit']; ?>" />
			</div>

                        <br/>
			
                        <div class="text-center">
                            <button id="update-event" class="btn btn-success">Update</button>
                            <button id="cancel-event" class="btn btn-warning">Cancel</button>
			</div>


                    </form>

		    <!-- end create form please -->


			</div>

		</div>
            </div>



	</div>





    </div>


    <script>
     $(document).ready(function() {
	 $('#select-date .input-group.date').datepicker({
	     todayBtn: "linked",
	     autoclose: true
	 });


	 $('.clockpicker').clockpicker();


	 $('#update-event').click(function(e) {
	     e.preventDefault(); // do not reload the page
	     var eventId = $('input[name=event_id]').val();
	     var eventName = $('input[name=event_name]').val();
	     var eventDescription = $('input[name=event_description]').val();
	     var eventDate = $('input[name=event_date]').val();
	     var eventTime = $('input[name=event_time]').val();
	     var eventLimit = $('input[name=event_limit]').val();

	     
	     // do some validation here


	     $.ajax({
		 url: base_url + "/events/update_form",
		 type: "POST",
		 data: {
		     event_id : eventId,
		     event_name : eventName,
		     event_description: eventDescription,
		     event_date: eventDate,
		     event_time: eventTime,
		     event_limit: eventLimit
		 },

		 success: function(response) {
		     response = JSON.parse(response);
		     alert(response.message);
		     location.reload();
		     
		 },

		 error: function(response) {
		     response = JSON.parse(response);
		     alert(response.message);
		 }
	     });

	 });

	 $('#cancel-event').click(function(e) {
	     e.preventDefault(); // do not reload the page
	     $('#update-form').trigger("reset");
	 });

     });
    </script>
