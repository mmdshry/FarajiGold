<!DOCTYPE html>
<html lang="fa" dir="rtl" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>پنل فروشندگان - فرجی گلد</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body
    class="bg-surface-50 dark:bg-surface-950 text-surface-900 dark:text-surface-100 font-sans antialiased transition-colors duration-300">
<div class="min-h-screen">
    {{-- Navbar --}}
    <nav
        class="sticky top-0 z-50 bg-white/80 dark:bg-surface-900/80 backdrop-blur-xl border-b border-surface-200/60 dark:border-surface-700/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-2 group">
                        <span
                            class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gradient-to-br from-gold-400 to-gold-600 shadow-lg shadow-gold-500/25">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"><path
                                    d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        </span>
                    <span
                        class="text-lg font-bold bg-gradient-to-l from-gold-600 to-gold-400 bg-clip-text text-transparent">فرجی گلد</span>
                </a>

                <div class="flex items-center gap-3">
                    {{-- Dark Mode Toggle --}}
                    <button @click="darkMode = !darkMode"
                            class="p-2 rounded-lg text-surface-500 hover:text-gold-600 dark:hover:text-gold-400 hover:bg-surface-100 dark:hover:bg-surface-800 transition-all">
                        <svg x-show="!darkMode" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
                        </svg>
                        <svg x-show="darkMode" x-cloak class="w-5 h-5" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/>
                        </svg>
                    </button>

                    {{-- User Name --}}
                    @auth
                        <span class="text-sm text-surface-600 dark:text-surface-400">{{ auth()->user()->name }}</span>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
@livewireScripts
</body>
</html>
