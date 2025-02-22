<x-filament-panels::page.simple>
    {{-- Tambahkan logo atau judul di atas form --}}
    <div class="flex justify-center mb-4">
        <img src="{{ asset('images/logo.jpg') }}" 
            alt="Logo" 
            class="h-12 w-12 rounded-lg shadow-md object-cover"
        >
    </div>

    {{-- Tambahkan Judul Halaman --}}
    <h2 class="text-center text-2xl font-bold mb-4 text-gray-800 dark:text-white">
        {{ __('Login ke Akun Anda') }}
    </h2>

    {{-- Cek apakah registrasi diaktifkan --}}
    @if (filament()->hasRegistration())
        <x-slot name="subheading">
            {{ __('Belum punya akun?') }}

            {{-- Link ke halaman register --}}
            {{ $this->registerAction }}
        </x-slot>
    @endif

    {{-- Hook Sebelum Form --}}
    {{ \Filament\Support\Facades\FilamentView::renderHook('filament.auth.login.before') }}

    {{-- Form Login --}}
    <x-filament-panels::form id="form" wire:submit="authenticate">
        {{ $this->form }}

        {{-- Tambahkan tombol login --}}
        <x-filament-panels::form.actions 
            :actions="$this->getCachedFormActions()" 
            :full-width="$this->hasFullWidthFormActions()" 
        />
    </x-filament-panels::form>

    {{-- Hook Setelah Form --}}
    {{ \Filament\Support\Facades\FilamentView::renderHook('filament.auth.login.after') }}
</x-filament-panels::page.simple>