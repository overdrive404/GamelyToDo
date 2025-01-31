
<ul class="navbar-nav w-100">
    <li class="nav-item w-100">
        <form class="d-flex" role="search">
            <input wire:model.live.debounce.50="search" class="form-control me-2" type="search" placeholder="Поиск по дневнику" aria-label="Search">
        </form>

        @if (sizeof($posts) > 0)
            <div class="dropdown-menu d-block py-0 show">
                @foreach ($posts as $post)
                    <div class="px-3 py-1 border-bottom">
                        <div class="d-flex flex-column">
                            <span>{{ $post->title }}</span>
                            <small>{{ $post->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </li>
</ul>
