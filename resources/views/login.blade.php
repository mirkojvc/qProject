@extends('layouts.app')

@section('content')
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;width:100vw;">
    <form method="POST" action="{{ route('login.submit') }}" class="bw-card bw-p-5" style="max-width: 400px; width: 100%;">
        @csrf
        <h1 class="bw-text-3xl bw-font-bold bw-mb-5">Login</h1>
        <x-error-message field="session"/>
        <!-- Email Field -->
        <div class="bw-form-group">
            <label for="email" class="bw-form-label">Email Address</label>
            <input type="email" name="email" id="email" class="bw-input" value="{{ old('email') }}" required autofocus>
            <x-error-message field="email"/>
        </div>

        <!-- Password Field -->
        <div class="bw-form-group bw-mt-4">
            <label for="password" class="bw-form-label">Password</label>
            <input type="password" name="password" id="password" class="bw-input" required>
            <x-error-message field="password"/>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="bw-form-group bw-flex bw-items-center bw-mt-4">
            <input type="checkbox" name="remember" id="remember" class="bw-checkbox">
            <label for="remember" class="bw-ml-2">
                Remember me
            </label>
        </div>

        <!-- Submit Button -->
        <div class="bw-form-group bw-mt-6">
            <button type="submit" class="bw-btn bw-btn-primary bw-w-full bw-py-2 bw-px-4 bw-border bw-border-gray-300">
                Login
            </button>
        </div>

    </form>
</div>
@endsection
