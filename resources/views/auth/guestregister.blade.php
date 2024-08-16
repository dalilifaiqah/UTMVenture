<x-guest-layout>
    <form method="POST" action="{{ route('guestregister') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-primary-button class="ms-4">
                {{ __('Continue') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
