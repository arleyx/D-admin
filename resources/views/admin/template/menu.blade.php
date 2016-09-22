<ul class="nav nav-sidebar">
    <li class="active"><a href="{{ route('admin.dashboard') }}">{{ trans('menu.dashboard') }}</a></li>
</ul>
<ul class="nav nav-sidebar">
    @foreach (Auth::user()->profile()->getResults()->modules()->getResults() as $module)
        <li><a href="">{{ trans('menu.'.$module->name) }}</a></li>
    @endforeach
</ul>
