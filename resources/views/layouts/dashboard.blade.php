<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header>
            @include('includes.navigation')
        </header>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md">
                @include('includes.sidebar')
            </aside>

            <!-- Main Content -->
            <main class="flex-1 bg-gray-50">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
