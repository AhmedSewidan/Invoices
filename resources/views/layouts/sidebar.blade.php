<!-- Sidebar-right-->
<div class="sidebar sidebar-{{ __('messages.left-right') }} sidebar-animate">
	<div class="panel panel-primary card mb-0 box-shadow">
		<div class="tab-menu-heading border-0 p-3">
			<div class="card-title mb-0">{{__('messages.notifications')}}</div>
			<div class="card-options mr-auto">
				<a href="#" class="sidebar-remove"><i class="fe fe-x"></i></a>
			</div>
		</div>
		<div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
			<div class="tabs-menu ">
				<!-- Tabs -->
				<ul class="nav panel-tabs">
					<li class=""><a href="#side1" class="active" data-toggle="tab"><i class="ion ion-md-chatboxes tx-18 ml-2"></i> {{__('messages.chat')}}</a></li>
					<li><a href="#side2" data-toggle="tab"><i class="ion ion-md-notifications tx-18  ml-2"></i> {{__('messages.notifications')}}</a></li>
				</ul>
			</div>
			<div class="tab-content">

				<div class="tab-pane active" id="side1" > 
				</div>


				<div class="tab-pane" id="side2">
					<div class="list-group list-group-flush ">
						<div class="list-group-item d-flex  align-items-center"> <!-- ofline -->
							<div class="ml-3">
								<span class="avatar avatar-lg brround cover-image" data-image-src="{{URL::asset('assets/img/faces/12.jpg')}}"><span class="avatar-status bg-success"></span></span>
							</div>
							<div>
								<strong>Madeleine</strong> Hey! there I' am available....
								<div class="small text-muted">
									3 hours ago
								</div>
							</div>
						</div>
						<div class="list-group-item d-flex  align-items-center"> <!-- online -->
							<div class="ml-3">
								<span class="avatar avatar-lg brround cover-image" data-image-src="{{URL::asset('assets/img/faces/1.jpg')}}"></span>
							</div>
							<div>
								<strong>Anthony</strong> New product Launching...
								<div class="small text-muted">
									5 hour ago
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/Sidebar-right-->
