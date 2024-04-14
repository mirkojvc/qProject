<nav class="bw-navbar bw-bg-primary" style="height: 50px; display: flex; align-items: center; justify-content: space-between; padding: 0 15px;">
    <div class="bw-container" style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
        <a href="{{route('home') }}" class="bw-navbar-brand">qProject</a>

        <!-- Sign Out Button -->
        <form action="{{ route('logout') }}" method="POST" style="display: flex;">
            @csrf
            <button type="submit" class="bw-btn bw-btn-danger">
                Sign Out
            </button>
        </form>
    </div>
</nav>
