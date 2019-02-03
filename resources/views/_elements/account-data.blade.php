@if($user)
<div class="card" style="width: 18rem;">
    <img src="{{ $user->avatar }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $user->username }}</h5>
        <p class="card-group"><b>@lang('Utworzono'):</b>&nbsp;{{ $user->created_at }}</p>
        <p class="card-group"><b>@lang('Zebrane punkty'):</b>&nbsp;{{ $user->points }}</p>
    </div>
</div>
@else
    <h3>@lang('Nie jesteś zalogowany')</h3>
@endif
