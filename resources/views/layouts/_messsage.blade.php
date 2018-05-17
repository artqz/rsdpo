@if(Session::has('flash_message'))
    <div class="alert alert-{{ session('flash_message_status') }} alert-dismissible" role="alert" style="margin: 5px; width: 20%; left: auto; position: absolute; right: 10px; top: 10px; z-index: 2000">
        {{ session('flash_message') }}
    </div>
@endif
