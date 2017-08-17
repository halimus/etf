@if($errors->any()) 
<ul class="errors alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

@if(Session::has('notif'))
<div class="errors alert alert-{{ Session::get('notif_type') }} alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <p>{{ Session::get('notif') }}</p>
</div>
@endif

