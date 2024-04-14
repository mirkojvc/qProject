<aside class="tw-sidebar tw-bg-light">
    <ul class="tw-nav tw-flex-column">
        <li class="tw-nav-item">
            <a href="{{ url('/home') }}" class="tw-nav-link {{ request()->is('home') ? 'tw-active' : '' }}">
                Home
            </a>
        </li>
        <li class="tw-nav-item">
            <a href="{{ url('/authors') }}" class="tw-nav-link {{ request()->is('authors') ? 'tw-active' : '' }}">
                Authors
            </a>
        </li>

        <li class="tw-nav-item">
            <a href="{{ route('books.create') }}" class="tw-nav-link {{ request()->is('books.create') ? 'tw-active' : '' }}">
                Books
            </a>
        </li>

    </ul>
</aside>
