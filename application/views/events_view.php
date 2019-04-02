<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Events</h2>
        <ol class="breadcrumb">
            <li>
                <a href="home">Home</a>
            </li>

            <li class="active">
                <strong>Events</strong>
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
                    <h5>Upcoming Volleyball meetups</h5>



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
		    <div class="pull-right">
                        <a href="events/create">
			    <button type="button" class="btn btn-rounded btn-circle btn-primary">
				<i class="fa fa-plus"></i>
			    </button>
			</a>
		    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Event</th>
                                </tr>
                            </thead>
                            <tbody>

				<?php foreach ($events as $event) { ?>
                                    <tr>
					<input name="event-id" type="hidden" value="<?php echo $event['id']; ?>"/>
					<td>
					    <?php echo $event['event_date']; ?>
					</td>
					<td>
					    <?php echo $event['time']; ?>
					</td>
					<td>
					    <?php echo $event['name']; ?>
					</td>

					<?php if($this->session->userdata('user_role') == 'admin') { ?>
					    <td>
						<a href="events/update/<?php echo $event['id']; ?>" class="update-event btn btn-group btn-rounded btn-circle">
						    <i class="fa fa-pencil"></i>
						</a>
					    </td>
					    <td>
						<a class="delete-event btn btn-group btn-rounded btn-circle">
						    <i class="fa fa-trash"></i>
						</a>
					    </td>
					<?php } ?>

                                    </tr>
				<?php } ?>
                            </tbody>
                        </table>
		    </div>


                </div>

            </div>
        </div>
    </div>
</div>


<script>
 $('.delete-event').click(function() {
     var eventId = $(this).closest('tr').find("input[name='event-id']").val();

     var confirmDelete = confirm("Are you sure you want to delete this event?");

     if(confirmDelete) {

	 $.ajax({
	     url: base_url + 'events/delete',
	     type: "POST",
	     data: {
		 event_id: eventId
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
     }
 });
</script>
