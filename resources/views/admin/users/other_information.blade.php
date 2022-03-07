<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<center>
	<a href="{{ aurl('usercommercials/create?user_id='.$users->id) }}" class="btn btn-primary" target="_blank"><i class="fa fa-receipt"></i> {{ trans('admin.add_usercommercials') }}</a>
	<a href="{{ aurl('userlicenses/create?user_id='.$users->id) }}" class="btn btn-success" target="_blank"><i class="fa fa-address-card"></i> {{ trans('admin.add_userlicenses') }}</a>
	<a href="{{ aurl('userexperiences/create?user_id='.$users->id) }}" class="btn btn-info" target="_blank"><i class="fa fa-file-alt"></i> {{ trans('admin.add_userexperiences') }}</a>
	<a href="{{ aurl('userqualifications/create?user_id='.$users->id) }}" class="btn btn-dark" target="_blank"><i class="fa fa-certificate"></i> {{ trans('admin.add_userqualifications') }}</a>
	</center>
</div>