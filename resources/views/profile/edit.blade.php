<x-app-layout>
    <x-slot name="header">
        Profil
    </x-slot>

    <div class="space-y-6">
        <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-2xl">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-2xl">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-8 bg-white shadow-sm border border-gray-100 rounded-2xl">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
