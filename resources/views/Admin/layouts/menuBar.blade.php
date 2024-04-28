@php
    $menuItems = [
        'post' => 'Post',
        'categories' => 'Category',
        'user' => 'Users',
    ];
@endphp

<div id="admin-menubar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="admin-menu my-2">
                    @foreach($menuItems as $routeName => $label)
                        <li>
                            <a class="btn btn-primary btn-sm {{ Str::startsWith(request()->route()->getName(), $routeName . '.') ? 'active' : '' }}" href="{{ route($routeName . '.index') }}"><small>{{ $label }}</small></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
