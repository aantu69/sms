@if(session()->has('inst_id'))
<div class="alert alert-dismissable alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<strong>{{ session()->get('inst_id') }}</strong>
</div>
@endif