<div class="horizontal-menu navbar-collapse collapse ">
	<ul class="nav navbar-nav">
		@if (auth()->user()->level_id == 1)
			<li class="dropdown">
				<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">MASTER <b class=" fa fa-angle-down"></b></a>
				<ul class="dropdown-menu">
					<li class=""><a href="#">QUESTION SURVEY</a></li>
					<li class=""><a href="#">PESERTA MANAGEMENT</a></li>
				</ul>
			</li>
		@endif
	</ul>
</div>