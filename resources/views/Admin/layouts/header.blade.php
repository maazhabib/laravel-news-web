<div id="header-admin">
    <div class="container">
        <div class="row align-items-center">
            <!-- LOGO -->
            <div class="col-md-2">
                <a href="post.php"><img class="logo" src="{{ asset('images/web_img/news.jpg') }}"></a>
            </div>

            <div class="col-md-10 text-right">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
