<div class="container mx-auto px-4">
    <div class="max-w-md mx-auto bg-white p-8 mt-10 rounded shadow">
        <h1 class="text-xl font-bold mb-4">{{ __('Thank You for Registering!') }}</h1>
        <p class="mb-6">{{ __('Your registration was successful. Click the button below to continue to the contact page.') }}</p>

        <a href="{{ route('dashboard') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
            {{ __('Continue') }}
        </a>
    </div>
</div>