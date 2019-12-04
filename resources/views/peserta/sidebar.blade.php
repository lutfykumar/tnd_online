<div class="horizontal-menu navbar-collapse collapse ">
	<ul class="nav navbar-nav">
		@if (auth()->user()->level_id == 2)
			<li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ route('h.schedule') }}">JADWAL TRAINING</a></li>
			<li class="{{ request()->is('history') ? 'active' : '' }}"><a href="{{ route('h.history') }}">TRAINING HISTORY</a></li>
		@endif
	</ul>
</div>