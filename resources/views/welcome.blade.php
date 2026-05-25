<!DOCTYPE html>
<html
    x-data="appData()"
    :lang="lang"
    :dir="lang === 'fa' ? 'rtl' : 'ltr'"
    :class="['theme-v' + version, darkMode ? 'dark' : '', lang === 'fa' ? 'font-fa-' + fontFa : 'font-en-' + fontEn]"
    class="scroll-smooth antialiased transition-colors duration-300"
>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
          content="پلتفرم امن معاملات طلای آبشده. خرید و فروش بدون اجرت، با کد ری‌گیری معتبر و انس جهانی.">
    <title x-text="t('page_title')">فرجی گلد | پلتفرم معاملات طلای آبشده</title>

    {{-- FONT ENGINE --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&family=Roboto:wght@400;500;700;900&family=Poppins:wght@400;500;600;700;900&family=Montserrat:wght@400;500;600;700;900&family=Fira+Sans:wght@400;500;600;700;900&family=JetBrains+Mono:wght@400;700&family=Playfair+Display:ital,wght@0,600;1,600&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700;900&family=Lalezar&family=Markazi+Text:wght@400;500;600;700&family=Readex+Pro:wght@400;500;600;700&family=Cairo:wght@400;700&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/shabnam-font@5.0.1/dist/font-face.css" rel="stylesheet" type="text/css"/>
    <link href="https://unpkg.com/samim-font@3.1.0/dist/font-face.css" rel="stylesheet" type="text/css"/>
    <link href="https://unpkg.com/sahel-font@3.4.0/dist/font-face.css" rel="stylesheet" type="text/css"/>
    <link href="https://unpkg.com/tanha-font@1.0.1/dist/font-face.css" rel="stylesheet" type="text/css"/>
    <link href="https://unpkg.com/parastoo-font@1.0.1/dist/font-face.css" rel="stylesheet" type="text/css"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Font Utilities */
        html[dir="ltr"].font-en-inter {
            font-family: 'Inter', sans-serif;
        }

        html[dir="ltr"].font-en-roboto {
            font-family: 'Roboto', sans-serif;
        }

        html[dir="ltr"].font-en-poppins {
            font-family: 'Poppins', sans-serif;
        }

        html[dir="ltr"].font-en-montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        html[dir="ltr"].font-en-firasans {
            font-family: 'Fira Sans', sans-serif;
        }

        html[dir="rtl"].font-fa-vazir {
            font-family: 'Vazirmatn', sans-serif;
        }

        html[dir="rtl"].font-fa-shabnam {
            font-family: 'Shabnam', sans-serif;
        }

        html[dir="rtl"].font-fa-samim {
            font-family: 'Samim', sans-serif;
        }

        html[dir="rtl"].font-fa-sahel {
            font-family: 'Sahel', sans-serif;
        }

        html[dir="rtl"].font-fa-tanha {
            font-family: 'Tanha', sans-serif;
        }

        html[dir="rtl"].font-fa-parastoo {
            font-family: 'Parastoo', sans-serif;
        }

        html[dir="rtl"].font-fa-lalezar {
            font-family: 'Lalezar', cursive;
            letter-spacing: 0.5px;
        }

        html[dir="rtl"].font-fa-markazi {
            font-family: 'Markazi Text', serif;
            font-size: 1.15em;
        }

        html[dir="rtl"].font-fa-readex {
            font-family: 'Readex Pro', sans-serif;
        }

        html[dir="rtl"].font-fa-cairo {
            font-family: 'Cairo', sans-serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        html[dir="rtl"] .font-mono {
            font-family: inherit !important;
            letter-spacing: normal;
        }

        .font-serif-custom {
            font-family: 'Playfair Display', serif;
        }

        html[dir="rtl"] .font-serif-custom {
            font-family: inherit;
            font-weight: 300;
            letter-spacing: -1px;
        }

        /* Ticker Animations */
        @keyframes flashUp {
            0% {
                background-color: rgba(34, 197, 94, 0.2);
            }
            100% {
                background-color: transparent;
            }
        }

        @keyframes flashDown {
            0% {
                background-color: rgba(239, 68, 68, 0.2);
            }
            100% {
                background-color: transparent;
            }
        }

        .tick-up {
            animation: flashUp 0.8s ease-out;
            color: #16a34a !important;
        }

        .tick-down {
            animation: flashDown 0.8s ease-out;
            color: #dc2626 !important;
        }

        .dark .tick-up {
            color: #4ade80 !important;
        }

        .dark .tick-down {
            color: #f87171 !important;
        }

        /* THEMES (Updated to match custom colors) */
        .theme-v1 {
            background: var(--color-surface-50);
            color: var(--color-surface-900);
        }

        .dark.theme-v1 {
            background: var(--color-surface-950);
            color: var(--color-surface-50);
        }

        .theme-v1 .t-card {
            background: white;
            border: 1px solid var(--color-surface-200);
            border-radius: 1.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .dark.theme-v1 .t-card {
            background: var(--color-surface-900);
            border-color: var(--color-surface-800);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        }

        .theme-v1 .t-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid var(--color-surface-300);
            background: var(--color-surface-100);
            outline: none;
            transition: all 0.2s;
        }

        .dark.theme-v1 .t-input {
            border-color: var(--color-surface-700);
            background: var(--color-surface-800);
            color: white;
        }

        .theme-v1 .t-input:focus {
            border-color: var(--color-gold-500);
            box-shadow: 0 0 0 3px rgba(234, 179, 8, 0.2);
            background: white;
        }

        .theme-v1 .t-btn {
            background: var(--color-surface-900);
            color: white;
            border-radius: 9999px;
            font-weight: 600;
            text-align: center;
        }

        .dark.theme-v1 .t-btn {
            background: white;
            color: var(--color-surface-900);
        }

        .theme-v1 .t-btn:hover {
            background: var(--color-gold-500);
            color: #000;
        }

        .theme-v1 .t-table th, .theme-v1 .t-table td {
            padding: 1rem;
            border-bottom: 1px solid var(--color-surface-200);
        }

        .dark.theme-v1 .t-table th, .dark.theme-v1 .t-table td {
            border-color: var(--color-surface-800);
        }

        .theme-v1 .t-accordion {
            border: 1px solid var(--color-surface-200);
            border-radius: 1rem;
            margin-bottom: 1rem;
            padding: 1.5rem;
        }

        .dark.theme-v1 .t-accordion {
            border-color: var(--color-surface-800);
        }

        .theme-v2 {
            background: #faf9f6;
            color: #1c1917;
        }

        .dark.theme-v2 {
            background: #1c1917;
            color: #faf9f6;
        }

        .theme-v2 .t-card {
            background: transparent;
            padding: 2rem;
            border: 1px solid var(--color-surface-300);
            border-radius: 0;
        }

        .dark.theme-v2 .t-card {
            border-color: var(--color-surface-700);
        }

        .theme-v2 .t-input {
            width: 100%;
            padding: 0.75rem 0;
            border: none;
            border-bottom: 1px solid var(--color-surface-400);
            background: transparent;
            font-size: 1.1rem;
            outline: none;
        }

        .dark.theme-v2 .t-input {
            border-color: var(--color-surface-600);
            color: white;
        }

        .theme-v2 .t-input:focus {
            border-color: var(--color-gold-500);
        }

        .theme-v2 .t-btn {
            background: transparent;
            border: 1px solid currentColor;
            color: inherit;
            padding: 1rem 2rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            text-align: center;
        }

        .theme-v2 .t-btn:hover {
            background: currentColor;
            color: #faf9f6;
        }

        .theme-v2 .t-table th, .theme-v2 .t-table td {
            padding: 1rem 0;
            border-bottom: 1px solid var(--color-surface-300);
        }

        .dark.theme-v2 .t-table th, .dark.theme-v2 .t-table td {
            border-color: var(--color-surface-700);
        }

        .theme-v2 .t-accordion {
            border-bottom: 1px solid var(--color-surface-300);
            padding: 1.5rem 0;
        }

        .theme-v3 {
            background: #f4f4f0;
            color: #000;
        }

        .dark.theme-v3 {
            background: #18181b;
            color: #fff;
        }

        .theme-v3 .t-card {
            background: white;
            border: 4px solid #000;
            box-shadow: 6px 6px 0px 0px #000;
            padding: 2.5rem;
            border-radius: 0;
        }

        .dark.theme-v3 .t-card {
            background: #000;
            border-color: var(--color-gold-500);
            box-shadow: 6px 6px 0px 0px var(--color-gold-500);
        }

        .theme-v3 .t-input {
            width: 100%;
            padding: 1rem;
            border: 4px solid #000;
            background: #fff;
            font-weight: bold;
            outline: none;
        }

        .dark.theme-v3 .t-input {
            border-color: var(--color-gold-500);
            background: #000;
            color: white;
        }

        .theme-v3 .t-input:focus {
            background: var(--color-gold-100);
        }

        .theme-v3 .t-btn {
            background: var(--color-gold-500);
            color: #000;
            border: 4px solid #000;
            box-shadow: 4px 4px 0px 0px #000;
            font-weight: 900;
            text-transform: uppercase;
            text-align: center;
            transition: all 0.1s;
        }

        .dark.theme-v3 .t-btn {
            background: black;
            color: var(--color-gold-500);
            border-color: var(--color-gold-500);
            box-shadow: 4px 4px 0px 0px var(--color-gold-500);
        }

        .theme-v3 .t-btn:active {
            transform: translate(4px, 4px);
            box-shadow: 0px 0px 0px 0px transparent;
        }

        .theme-v3 .t-table th, .theme-v3 .t-table td {
            padding: 1rem;
            border: 2px solid #000;
            background: #fff;
        }

        .dark.theme-v3 .t-table th, .dark.theme-v3 .t-table td {
            border-color: var(--color-gold-500);
            background: #000;
        }

        .theme-v3 .t-accordion {
            border: 4px solid #000;
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: #fff;
        }

        .dark.theme-v3 .t-accordion {
            border-color: var(--color-gold-500);
            background: #000;
        }

        .theme-v4 {
            background: #09090b;
            color: #fff;
        }

        .theme-v4 .t-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .theme-v4 .t-input {
            width: 100%;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            color: white;
            outline: none;
        }

        .theme-v4 .t-input:focus {
            border-color: var(--color-gold-500);
            background: rgba(255, 255, 255, 0.05);
        }

        .theme-v4 .t-btn {
            background: rgba(234, 179, 8, 0.8);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            color: white;
            font-weight: bold;
            text-align: center;
            transition: background 0.2s;
        }

        .theme-v4 .t-btn:hover {
            background: rgba(234, 179, 8, 1);
        }

        .theme-v4 .t-table th, .theme-v4 .t-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .theme-v4 .t-accordion {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .theme-v5 {
            background: #000;
            color: #fff;
        }

        .theme-v5 .t-card {
            background: #050505;
            border: 1px solid #333;
            padding: 1.5rem;
            border-radius: 0;
        }

        .theme-v5 .t-input {
            width: 100%;
            padding: 0.75rem;
            background: #000;
            border: 1px dashed #555;
            color: #fff;
            font-family: inherit;
            outline: none;
        }

        .theme-v5 .t-input:focus {
            border-style: solid;
            border-color: var(--color-gold-500);
        }

        .theme-v5 .t-btn {
            background: #111;
            border: 1px solid #333;
            color: var(--color-gold-500);
            font-family: inherit;
            text-transform: uppercase;
            text-align: center;
            transition: all 0.2s;
        }

        .theme-v5 .t-btn:hover {
            background: var(--color-gold-500);
            color: #000;
            border-color: var(--color-gold-500);
        }

        .theme-v5 .t-table th, .theme-v5 .t-table td {
            padding: 0.75rem;
            border-bottom: 1px dashed #333;
            font-family: inherit;
        }

        .theme-v5 .t-accordion {
            border: 1px solid #333;
            padding: 1rem;
            margin-bottom: 0.5rem;
            font-family: inherit;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col relative overflow-x-hidden">

{{-- COMPONENT: Alert Banner --}}
<div x-show="showAlert" x-transition
     class="w-full bg-gold-500 text-surface-900 px-4 py-2 text-sm font-bold flex justify-between items-center z-50 relative">
    <div class="flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span x-text="t('alert_market_open')"></span>
    </div>
    <button @click="showAlert = false" class="hover:bg-gold-600 p-1 rounded-full transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>

{{-- V4 Ambient Background --}}
<div x-show="version === 4" class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden">
    <div
        class="absolute top-[10%] left-[20%] w-[500px] h-[500px] bg-gold-500/20 rounded-full blur-[120px] mix-blend-screen animate-pulse"></div>
    <div
        class="absolute bottom-[10%] right-[20%] w-[600px] h-[600px] bg-surface-500/10 rounded-full blur-[150px] mix-blend-screen"
        style="animation: pulse 4s infinite reverse;"></div>
</div>

{{-- HEADER --}}
<header class="w-full px-6 py-4 flex justify-between items-center z-40 sticky top-0"
        :class="{'border-b border-surface-200 dark:border-surface-800 bg-white/90 dark:bg-surface-950/90 backdrop-blur': version === 5 || version === 2 || version === 1, 'border-b-4 border-black dark:border-gold-500 bg-[#f4f4f0] dark:bg-surface-900': version === 3, 'bg-transparent backdrop-blur-md border-b border-white/10': version === 4}">
    <div class="flex items-center gap-4 cursor-pointer" @click="view = 'home'">
        <div class="w-10 h-10 flex items-center justify-center bg-gold-500 text-black font-black text-xl"
             :class="{'rounded-full': version === 1 || version === 4}">FG
        </div>
        <span class="font-bold tracking-tight text-2xl" :class="{'uppercase': version === 3}"
              x-text="t('brand')"></span>
    </div>
    <nav class="hidden md:flex gap-8 items-center font-semibold text-sm">
        <button @click="view = 'home'" class="hover:text-gold-500 transition-colors"
                :class="{'text-gold-500': view === 'home'}" x-text="t('nav_home')"></button>
        <button @click="view = 'trade'" class="hover:text-gold-500 transition-colors"
                :class="{'text-gold-500': view === 'trade'}" x-text="t('nav_trade')"></button>

        {{-- COMPONENT: Dropdown Menu --}}
        <div x-data="{ openDropdown: false }" class="relative">
            <button @click="openDropdown = !openDropdown" @click.away="openDropdown = false"
                    class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                <span x-text="t('nav_auth')"></span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="openDropdown" x-transition
                 class="absolute top-full mt-2 w-48 bg-white dark:bg-surface-800 border border-surface-200 dark:border-surface-700 rounded-xl shadow-lg py-2 rtl:left-0 ltr:right-0 z-50">
                <a href="#" @click.prevent="view = 'auth'; openDropdown = false"
                   class="block px-4 py-2 hover:bg-surface-100 dark:hover:bg-surface-700 transition-colors"
                   x-text="t('tab_login')"></a>
                <a href="#" @click.prevent="view = 'auth'; authTab = 'register'; openDropdown = false"
                   class="block px-4 py-2 hover:bg-surface-100 dark:hover:bg-surface-700 transition-colors"
                   x-text="t('tab_register')"></a>
            </div>
        </div>
    </nav>
</header>

{{-- MAIN CONTENT AREA --}}
<main class="flex-grow flex flex-col relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- ==================================================== --}}
    {{-- VIEW: HOME --}}
    {{-- ==================================================== --}}
    <div x-show="view === 'home'" x-transition.opacity.duration.300ms class="flex-col gap-16"
         :class="view === 'home' ? 'flex' : 'hidden'">

        {{-- Hero Section --}}
        <div class="w-full">
            <div x-show="version === 1 || version === 4" class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter leading-tight mb-6">
                    <span x-text="t('hero_1')"></span> <br>
                    <span class="text-gold-500" x-text="t('hero_2')"></span>
                </h1>
                <p class="text-lg md:text-xl opacity-70 mb-10 leading-relaxed" x-text="t('hero_sub')"></p>
                <button @click="view = 'trade'" class="t-btn px-10 py-4 text-lg" x-text="t('btn_start')"></button>
            </div>

            <div x-show="version === 2" class="max-w-5xl">
                <h1 class="text-6xl md:text-8xl font-serif-custom leading-tight mb-8">
                    <span x-text="t('hero_1')"></span><br>
                    <i class="text-gold-600" x-text="t('hero_2')"></i>
                </h1>
                <p class="text-xl opacity-60 mb-10 border-l-2 border-gold-500 rtl:border-r-2 rtl:border-l-0 px-6 py-2"
                   x-text="t('hero_sub')"></p>
                <button @click="view = 'trade'" class="t-btn px-10 py-4 text-lg" x-text="t('btn_start')"></button>
            </div>

            <div x-show="version === 3" class="t-card max-w-5xl mx-auto transform -rotate-1 text-center">
                <h1 class="text-6xl md:text-9xl font-black uppercase tracking-tighter leading-none mb-8">
                    <span x-text="t('hero_1')"></span> <span
                        class="text-gold-500 bg-black px-4 block md:inline mt-4 md:mt-0" x-text="t('hero_2')"></span>
                </h1>
                <button @click="view = 'trade'" class="t-btn px-12 py-6 text-2xl w-full"
                        x-text="t('btn_start')"></button>
            </div>

            <div x-show="version === 5" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="t-card flex flex-col justify-center min-h-[400px]">
                    <h1 class="text-4xl md:text-5xl uppercase mb-4" x-text="t('hero_1')"></h1>
                    <h1 class="text-4xl md:text-5xl text-gold-500 mb-8">> <span x-text="t('hero_2')"></span>_</h1>
                    <button @click="view = 'trade'" class="t-btn px-8 py-4 w-fit" x-text="t('btn_start')"></button>
                </div>
                <div class="t-card flex flex-col justify-between text-sm opacity-80">
                    <div class="space-y-2">
                        <div>> SYSTEM_CORE_READY</div>
                        <div>> CONNECTING_XAUUSD_POOL... OK</div>
                    </div>
                    <div class="text-gold-500 text-5xl md:text-6xl my-10 text-center" :class="tickClass"
                         x-text="pe(formatPrice(price))"></div>
                </div>
            </div>
        </div>

        {{-- Info Cards (Market Feed Extended) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Melted Gold --}}
            <div class="t-card flex flex-col justify-between relative overflow-hidden group">
                <div class="text-sm font-bold opacity-60 uppercase mb-4" x-text="t('asset_melted')"></div>

                {{-- COMPONENT: Skeleton Loader (Shows briefly on load) --}}
                <div x-show="isLoading" class="animate-pulse flex space-x-4 rtl:space-x-reverse">
                    <div class="h-10 bg-surface-300 dark:bg-surface-700 rounded w-3/4"></div>
                </div>

                <div x-show="!isLoading" class="text-4xl font-black mb-2 flex items-center gap-2 font-mono"
                     :class="tickClass" dir="ltr">
                    <span x-text="pe(formatPrice(price))"></span>
                </div>
                <div x-show="!isLoading" class="text-sm flex gap-2 font-bold"
                     :class="trend === 'up' ? 'text-green-500' : 'text-red-500'" dir="ltr">
                    <span x-text="trend === 'up' ? '▲' : '▼'"></span> <span x-text="pe('0.45%')"></span>
                </div>
            </div>
            {{-- XAUUSD --}}
            <div class="t-card flex flex-col justify-between">
                <div class="text-sm font-bold opacity-60 uppercase mb-4 flex justify-between">
                    <span x-text="t('asset_xau')"></span>
                    {{-- COMPONENT: Badge --}}
                    <span
                        class="bg-blue-100 text-blue-800 text-[10px] font-bold px-2 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">GLOBAL</span>
                </div>
                <div class="text-4xl font-black mb-2 flex items-center gap-2 font-mono" :class="tickClassXau" dir="ltr">
                    $<span x-text="pe((priceXau).toFixed(2))"></span>
                </div>
                <div class="text-sm flex gap-2 font-bold" :class="trendXau === 'up' ? 'text-green-500' : 'text-red-500'"
                     dir="ltr">
                    <span x-text="trendXau === 'up' ? '▲' : '▼'"></span> <span x-text="pe('0.12%')"></span>
                </div>
            </div>
            {{-- Parity / Bubble --}}
            <div class="t-card flex flex-col justify-center bg-gold-50 dark:bg-gold-900/10">
                <h3 class="text-xl font-bold mb-3 text-gold-600 dark:text-gold-500" x-text="t('edu_title')"></h3>
                <p class="text-sm opacity-80 leading-relaxed font-semibold" x-text="t('edu_desc')"></p>
            </div>
        </div>

        {{-- 4 Steps (How it works) --}}
        <div class="w-full border-t border-surface-200 dark:border-surface-800 pt-16">
            <h2 class="text-2xl font-bold mb-10 text-center" :class="{'font-serif-custom': version === 2}"
                x-text="t('steps_title')"></h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
                <div
                    class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-surface-200 dark:bg-surface-800 -translate-y-1/2 z-0"
                    :class="{'border-b-4 border-black': version===3}"></div>
                <template x-for="(step, i) in steps" :key="i">
                    <div class="t-card relative z-10 flex flex-col items-center text-center">
                        <div
                            class="w-10 h-10 rounded-full bg-gold-500 text-black font-black flex items-center justify-center mb-4 text-xl"
                            :class="{'rounded-none border-2 border-black': version===3 || version===5}"
                            x-text="pe(i+1)"></div>
                        <h3 class="font-bold mb-2 text-lg" x-text="step.title[lang]"></h3>
                        <p class="text-xs opacity-70 leading-relaxed" x-text="step.desc[lang]"></p>
                    </div>
                </template>
            </div>
        </div>

        {{-- Bubble Calculator --}}
        <div class="w-full">
            <div
                class="t-card w-full max-w-4xl mx-auto flex flex-col md:flex-row gap-8 items-center bg-surface-50 dark:bg-surface-900/50">
                <div class="flex-1">
                    <h2 class="text-2xl font-bold mb-4 flex items-center gap-2">
                        <span x-text="t('calc_title')"></span>
                        {{-- COMPONENT: Tooltip (Alpine based) --}}
                        <div x-data="{ tooltip: false }" class="relative flex items-center">
                            <button @mouseenter="tooltip = true" @mouseleave="tooltip = false"
                                    class="text-surface-400 hover:text-gold-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </button>
                            <div x-show="tooltip" x-transition
                                 class="absolute bottom-full mb-2 w-48 p-2 bg-surface-800 text-white text-xs rounded shadow-lg z-10"
                                 x-text="t('calc_desc')"></div>
                        </div>
                    </h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold mb-2 opacity-70" x-text="t('calc_input1')"></label>
                            <input type="number" x-model="calcMazaneh" class="t-input font-mono" dir="ltr">
                        </div>
                    </div>
                </div>
                <div
                    class="flex-1 bg-gold-500 text-black p-8 rounded-2xl flex flex-col justify-center items-center text-center"
                    :class="{'rounded-none border-4 border-black': version===3, 'rounded-none': version===5}">
                    <div class="text-sm font-bold mb-2 opacity-80" x-text="t('calc_result')"></div>
                    <div class="text-5xl font-black font-mono mb-2" dir="ltr"
                         x-text="pe(formatPrice(calcMazaneh / 4.3318))"></div>
                    <div class="text-xs font-bold opacity-80" x-text="t('calc_unit')"></div>
                </div>
            </div>
        </div>

        {{-- Data Table (Recent Trades) --}}
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-6" :class="{'font-serif-custom': version === 2}"
                x-text="t('table_title')"></h2>
            <div class="t-card overflow-x-auto !p-0 sm:!p-6 w-full">
                <table class="t-table w-full text-sm">
                    <thead>
                    <tr>
                        <th x-text="t('th_time')"></th>
                        <th x-text="t('th_type')"></th>
                        <th x-text="t('th_weight')"></th>
                        <th x-text="t('th_price')"></th>
                        <th x-text="t('th_status')"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <template x-for="(trade, i) in recentTrades" :key="i">
                        <tr class="hover:bg-surface-50 dark:hover:bg-surface-800/50 transition-colors">
                            <td class="font-mono opacity-70" dir="ltr" x-text="pe(trade.time)"></td>
                            <td>
                                {{-- COMPONENT: Status Badge --}}
                                <span class="px-2.5 py-1 text-xs font-bold rounded-full border"
                                      :class="trade.type === 'buy' ? 'bg-green-50 text-green-700 border-green-200 dark:bg-green-900/30 dark:text-green-400 dark:border-green-800' : 'bg-red-50 text-red-700 border-red-200 dark:bg-red-900/30 dark:text-red-400 dark:border-red-800'"
                                      x-text="trade.type === 'buy' ? t('btn_buy') : t('btn_sell')"></span>
                            </td>
                            <td class="font-mono" dir="ltr"><span x-text="pe(trade.weight)"></span>g</td>
                            <td class="font-mono font-bold" dir="ltr" x-text="pe(formatPrice(trade.price))"></td>
                            <td class="text-green-500 font-bold flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span x-text="t('status_done')"></span>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Accordion (FAQ) --}}
        <div class="w-full max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center" :class="{'font-serif-custom': version === 2}"
                x-text="t('faq_title')"></h2>
            <template x-for="(faq, i) in faqs" :key="i">
                <div class="t-accordion cursor-pointer group"
                     @click="activeFaq === i ? activeFaq = null : activeFaq = i">
                    <div
                        class="flex justify-between items-center font-bold text-lg group-hover:text-gold-500 transition-colors">
                        <span x-text="faq.q[lang]"></span>
                        <span x-text="activeFaq === i ? '−' : '+'" class="text-xl font-mono"></span>
                    </div>
                    <div x-show="activeFaq === i" x-collapse>
                        <p class="mt-4 opacity-70 leading-relaxed text-sm" x-text="faq.a[lang]"></p>
                    </div>
                </div>
            </template>
        </div>

    </div>

    {{-- ==================================================== --}}
    {{-- VIEW: AUTH --}}
    {{-- ==================================================== --}}
    <div x-show="view === 'auth'" x-cloak x-transition.opacity.duration.300ms
         class="flex-grow flex items-center justify-center py-10" :class="view === 'auth' ? 'flex' : 'hidden'">
        <div class="t-card w-full max-w-lg">
            <div class="flex gap-6 mb-8 border-b border-surface-300 dark:border-surface-700 pb-2"
                 :class="{'border-b-4 border-black dark:border-gold-500': version === 3}">
                <button @click="authTab = 'login'" class="pb-2 font-bold text-lg transition-all"
                        :class="authTab === 'login' ? 'text-gold-500 border-b-2 border-gold-500' : 'opacity-40'"
                        x-text="t('tab_login')"></button>
                <button @click="authTab = 'register'" class="pb-2 font-bold text-lg transition-all"
                        :class="authTab === 'register' ? 'text-gold-500 border-b-2 border-gold-500' : 'opacity-40'"
                        x-text="t('tab_register')"></button>
            </div>

            <form @submit.prevent class="space-y-5">
                <div x-show="authTab === 'register'">
                    <label class="block text-xs font-bold mb-2 opacity-70 uppercase tracking-widest"
                           x-text="t('form_name')"></label>
                    <input type="text" class="t-input" placeholder="...">
                </div>
                <div>
                    <label class="block text-xs font-bold mb-2 opacity-70 uppercase tracking-widest"
                           x-text="t('form_phone')"></label>
                    <input type="text" class="t-input font-mono" placeholder="0912 345 6789" dir="ltr">
                </div>
                <div>
                    <label class="block text-xs font-bold mb-2 opacity-70 uppercase tracking-widest"
                           x-text="t('form_pass')"></label>
                    <input type="password" class="t-input font-mono" placeholder="••••••••" dir="ltr">
                </div>

                <button class="t-btn w-full py-4 mt-6 text-lg"
                        x-text="authTab === 'login' ? t('tab_login') : t('tab_register')"></button>
            </form>
        </div>
    </div>

    {{-- ==================================================== --}}
    {{-- VIEW: TRADE DASHBOARD --}}
    {{-- ==================================================== --}}
    <div x-show="view === 'trade'" x-cloak x-transition.opacity.duration.300ms class="flex-grow flex flex-col"
         :class="view === 'trade' ? 'flex' : 'hidden'">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 h-full items-start">

            <div class="t-card lg:col-span-2 flex flex-col h-full min-h-[500px]">
                <div
                    class="flex justify-between items-center mb-8 border-b border-surface-200 dark:border-surface-800 pb-4"
                    :class="{'border-black border-b-4': version === 3}">
                    <h2 class="font-bold text-xl" :class="{'font-serif-custom': version === 2}"
                        x-text="t('trade_market')"></h2>
                    <div class="flex gap-4 items-center">
                        <button @click="isModalOpen = true" class="text-xs font-bold text-gold-500 hover:underline">
                            Deposit Funds
                        </button>
                        <span
                            class="text-xs px-2 py-1 bg-green-500/20 text-green-600 dark:text-green-400 font-mono font-bold flex items-center gap-2"
                            :class="{'rounded-none border border-green-500': version === 3 || version === 5, 'rounded': version === 1 || version === 4}">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> LIVE
                        </span>
                    </div>
                </div>

                <div class="flex-grow flex flex-col justify-center items-center py-10">
                    <div class="text-sm opacity-60 mb-4 uppercase tracking-widest font-mono"
                         x-text="t('asset_melted')"></div>
                    <div
                        class="text-6xl md:text-8xl font-black font-mono tracking-tighter flex items-center gap-4 transition-colors duration-200"
                        :class="tickClass" dir="ltr">
                        <span x-text="pe(formatPrice(price))"></span>
                    </div>
                    <div
                        class="mt-6 flex gap-6 font-mono text-sm border border-surface-200 dark:border-surface-800 px-6 py-2"
                        :class="{'rounded-full': version === 1, 'rounded-none': version !== 1}">
                        <div class="opacity-70">H: <span class="text-green-500"
                                                         x-text="pe(formatPrice(price + 150000))"></span></div>
                        <div class="opacity-70">L: <span class="text-red-500"
                                                         x-text="pe(formatPrice(price - 120000))"></span></div>
                    </div>
                </div>
            </div>

            <div class="t-card flex flex-col h-full">
                <h2 class="font-bold text-xl mb-6 border-b border-surface-200 dark:border-surface-800 pb-4"
                    :class="{'font-serif-custom': version === 2, 'border-black border-b-4': version === 3}"
                    x-text="t('trade_order')"></h2>

                {{-- COMPONENT: Toggle Switch (Buy/Sell) --}}
                <div class="flex p-1 bg-surface-100 dark:bg-surface-800 rounded-lg mb-8 relative">
                    <div
                        class="absolute top-1 bottom-1 w-[calc(50%-4px)] rounded-md transition-transform duration-300 ease-in-out"
                        :class="orderType === 'buy' ? 'bg-green-500 translate-x-0 rtl:-translate-x-0' : 'bg-red-500 translate-x-full rtl:-translate-x-full'"></div>
                    <button @click="orderType = 'buy'" class="flex-1 py-2 font-bold text-sm z-10 transition-colors"
                            :class="orderType === 'buy' ? 'text-white' : 'text-surface-500'"
                            x-text="t('btn_buy')"></button>
                    <button @click="orderType = 'sell'" class="flex-1 py-2 font-bold text-sm z-10 transition-colors"
                            :class="orderType === 'sell' ? 'text-white' : 'text-surface-500'"
                            x-text="t('btn_sell')"></button>
                </div>

                <form @submit.prevent class="space-y-6 flex-grow flex flex-col">
                    <div>
                        <label class="block text-xs font-bold mb-2 opacity-70 uppercase tracking-widest"
                               x-text="t('form_weight')"></label>
                        <div class="relative">
                            <input type="number" x-model="weight" class="t-input font-mono text-2xl text-center"
                                   dir="ltr">
                            <span
                                class="absolute right-4 rtl:right-auto rtl:left-4 top-1/2 -translate-y-1/2 opacity-50 font-mono text-sm">gr</span>
                        </div>
                    </div>

                    <div class="pt-6 mt-auto border-t border-surface-200 dark:border-surface-800"
                         :class="{'border-black border-t-2': version === 3}">
                        <div class="flex justify-between text-sm mb-6 font-mono">
                            <span class="opacity-70" x-text="t('trade_total')"></span>
                            <span class="font-bold text-lg" x-text="pe(formatPrice(price * (weight / 4.33)))"></span>
                        </div>
                        <button class="t-btn w-full py-4 text-lg border-none"
                                :class="{'!bg-green-500 !text-white !shadow-[4px_4px_0_0_#000]': orderType === 'buy' && version===3, '!bg-red-500 !text-white !shadow-[4px_4px_0_0_#000]': orderType === 'sell' && version===3, '!bg-green-600 !text-white': orderType === 'buy' && version!==3, '!bg-red-600 !text-white': orderType === 'sell' && version!==3}"
                                x-text="orderType === 'buy' ? t('btn_execute_buy') : t('btn_execute_sell')"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

{{-- FOOTER --}}
<footer class="mt-auto border-t w-full pt-12 pb-32"
        :class="{'border-surface-200 dark:border-surface-800 bg-white dark:bg-surface-950': version === 1 || version === 4 || version === 5, 'border-t-4 border-black dark:border-gold-500 bg-[#f4f4f0] dark:bg-surface-900': version === 3, 'border-surface-300 dark:border-surface-700 bg-transparent': version === 2}">
    <div
        class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6 text-sm opacity-60">
        <div class="flex items-center gap-2">
            <div class="w-6 h-6 bg-gold-500 flex items-center justify-center text-black font-bold text-[10px]">FG</div>
            <span class="font-bold tracking-tight">Faraji Gold B2B Platform &copy; <span
                    x-text="pe('2026')"></span></span>
        </div>
        <div class="flex gap-6 font-mono text-xs uppercase tracking-widest">
            <a href="#" class="hover:text-gold-500" x-text="t('nav_home')"></a>
            <a href="#" class="hover:text-gold-500">API Docs</a>
            <a href="#" class="hover:text-gold-500">KYC</a>
        </div>
    </div>
</footer>

{{-- COMPONENT: Modal (Deposit Funds) --}}
<div x-show="isModalOpen" x-cloak class="fixed inset-0 z-[110] flex items-center justify-center overflow-y-auto"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="isModalOpen" x-transition.opacity
         class="fixed inset-0 bg-surface-900/75 backdrop-blur-sm transition-opacity" @click="isModalOpen = false"></div>
    <div x-show="isModalOpen" x-transition.scale.origin.bottom
         class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-surface-900 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-surface-200 dark:border-surface-700">
        <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div
                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-gold-100 dark:bg-gold-900/30 sm:mx-0 sm:h-10 sm:w-10">
                    <svg class="h-6 w-6 text-gold-600 dark:text-gold-500" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left rtl:sm:mr-4 rtl:sm:text-right w-full">
                    <h3 class="text-base font-semibold leading-6 text-surface-900 dark:text-white" id="modal-title">
                        Deposit Funds</h3>
                    <div class="mt-2">
                        <p class="text-sm text-surface-500 dark:text-surface-400">Please transfer funds to the following
                            IBAN to charge your wallet.</p>
                        <div
                            class="mt-4 p-3 bg-surface-100 dark:bg-surface-800 rounded-lg font-mono text-center text-lg tracking-widest border border-surface-200 dark:border-surface-700">
                            IR12 3456 7890 1234 5678 90
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="bg-surface-50 dark:bg-surface-800/50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-surface-200 dark:border-surface-700">
            <button type="button"
                    class="inline-flex w-full justify-center rounded-md bg-gold-500 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-gold-400 sm:ml-3 sm:w-auto rtl:sm:mr-3"
                    @click="isModalOpen = false">I have transferred
            </button>
            <button type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white dark:bg-surface-800 px-3 py-2 text-sm font-semibold text-surface-900 dark:text-white shadow-sm ring-1 ring-inset ring-surface-300 dark:ring-surface-600 hover:bg-surface-50 dark:hover:bg-surface-700 sm:mt-0 sm:w-auto"
                    @click="isModalOpen = false">Cancel
            </button>
        </div>
    </div>
</div>

{{-- ==================================================== --}}
{{-- FLOATING ENGINE PANEL --}}
{{-- ==================================================== --}}
<div class="fixed bottom-4 left-1/2 -translate-x-1/2 z-[100] flex flex-col gap-2 items-center w-[95%] max-w-3xl"
     dir="ltr">

    {{-- Font Pickers --}}
    <div
        class="bg-surface-900 text-white rounded-full shadow-2xl border border-surface-700 p-1 flex items-center gap-1 w-full overflow-x-auto hide-scrollbar">
        <span class="text-[9px] font-bold text-surface-400 uppercase tracking-widest pl-3 pr-2 flex-shrink-0"
              x-text="lang === 'fa' ? 'FA FONTS' : 'EN FONTS'"></span>

        <template x-if="lang === 'fa'">
            <div class="flex gap-1">
                <template
                    x-for="f in [{id:'vazir', l:'Vazirmatn'},{id:'shabnam', l:'Shabnam'},{id:'samim', l:'Samim'},{id:'sahel', l:'Sahel'},{id:'lalezar', l:'Lalezar'},{id:'tanha', l:'Tanha'},{id:'parastoo', l:'Parastoo'},{id:'cairo', l:'Cairo'},{id:'markazi', l:'Markazi'},{id:'readex', l:'Readex'}]"
                    :key="f.id">
                    <button @click="fontFa = f.id"
                            class="px-3 py-1.5 text-[10px] font-bold rounded-full whitespace-nowrap transition-colors flex-shrink-0"
                            :class="fontFa === f.id ? 'bg-gold-500 text-black' : 'text-surface-400 hover:bg-surface-800 hover:text-white'"
                            x-text="f.l"></button>
                </template>
            </div>
        </template>

        <template x-if="lang === 'en'">
            <div class="flex gap-1">
                <template
                    x-for="f in [{id:'inter', l:'Inter'},{id:'roboto', l:'Roboto'},{id:'poppins', l:'Poppins'},{id:'montserrat', l:'Montserrat'},{id:'firasans', l:'Fira Sans'}]"
                    :key="f.id">
                    <button @click="fontEn = f.id"
                            class="px-3 py-1.5 text-[10px] font-bold rounded-full whitespace-nowrap transition-colors flex-shrink-0"
                            :class="fontEn === f.id ? 'bg-gold-500 text-black' : 'text-surface-400 hover:bg-surface-800 hover:text-white'"
                            x-text="f.l"></button>
                </template>
            </div>
        </template>
    </div>

    {{-- Theme Toggles --}}
    <div
        class="bg-surface-900 text-white rounded-full shadow-2xl border border-surface-700 p-1.5 flex items-center gap-2">
        <span
            class="text-[9px] font-bold text-surface-400 uppercase tracking-widest pl-3 pr-1 hidden sm:block">UI Theme</span>
        <template x-for="v in [1,2,3,4,5]" :key="v">
            <button @click="version = v"
                    class="w-8 h-8 flex items-center justify-center text-sm font-bold transition-all rounded-full"
                    :class="version === v ? 'bg-white text-black scale-110' : 'text-surface-400 hover:bg-surface-800'"
                    x-text="pe(v)"></button>
        </template>
        <div class="w-px h-6 bg-surface-700 mx-1"></div>
        <button @click="darkMode = !darkMode"
                class="p-2 text-surface-400 hover:text-white rounded-full hover:bg-surface-800">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path
                    d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
            </svg>
        </button>
        <button @click="toggleLang"
                class="p-2 text-xs font-bold text-gold-500 hover:text-gold-400 uppercase pr-4 rounded-full hover:bg-surface-800"
                x-text="lang === 'fa' ? 'EN' : 'FA'"></button>
    </div>
</div>
<style>.hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }</style>

{{-- ==================================================== --}}
{{-- LOGIC --}}
{{-- ==================================================== --}}
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('appData', () => ({
            version: 1,
            fontFa: 'vazir',
            fontEn: 'inter',
            darkMode: localStorage.getItem('darkMode') === 'true',
            lang: localStorage.getItem('lang') || 'fa',
            view: 'home',
            authTab: 'login',
            orderType: 'buy',
            weight: 50,
            calcMazaneh: 18750000,

            // UI States
            showAlert: true,
            isModalOpen: false,
            isLoading: true,

            // Market Data
            price: 18750000,
            trend: 'neutral',
            tickClass: '',

            // XAUUSD Data
            priceXau: 5015.00,
            trendXau: 'neutral',
            tickClassXau: '',

            activeFaq: null,

            recentTrades: [
                {time: '14:25:31', type: 'buy', weight: 150, price: 18755000},
                {time: '14:24:10', type: 'sell', weight: 50, price: 18745000},
                {time: '14:21:05', type: 'buy', weight: 300, price: 18750000},
                {time: '14:18:44', type: 'buy', weight: 100, price: 18740000}
            ],

            init() {
                this.$watch('darkMode', val => localStorage.setItem('darkMode', val));
                this.$watch('lang', val => localStorage.setItem('lang', val));

                // Simulate loading state
                setTimeout(() => {
                    this.isLoading = false;
                }, 800);

                this.startTicker();
            },

            startTicker() {
                // Melted Gold Ticker
                setInterval(() => {
                    if (Math.random() > 0.6) return;
                    const change = Math.floor(Math.random() * 40000) - 20000;
                    this.price += change;
                    if (change > 0) {
                        this.trend = 'up';
                        this.tickClass = 'tick-up';
                    } else {
                        this.trend = 'down';
                        this.tickClass = 'tick-down';
                    }
                    setTimeout(() => {
                        this.tickClass = '';
                        this.trend = 'neutral';
                    }, 800);

                    if (Math.random() > 0.8) {
                        const now = new Date();
                        this.recentTrades.unshift({
                            time: now.getHours() + ':' + String(now.getMinutes()).padStart(2, '0') + ':' + String(now.getSeconds()).padStart(2, '0'),
                            type: Math.random() > 0.5 ? 'buy' : 'sell',
                            weight: Math.floor(Math.random() * 200) + 50,
                            price: this.price
                        });
                        if (this.recentTrades.length > 4) this.recentTrades.pop();
                    }
                }, 1500);

                // XAUUSD Ticker (Global Market)
                setInterval(() => {
                    if (Math.random() > 0.7) return;
                    const change = (Math.random() * 4) - 2;
                    this.priceXau += change;
                    if (change > 0) {
                        this.trendXau = 'up';
                        this.tickClassXau = 'tick-up';
                    } else {
                        this.trendXau = 'down';
                        this.tickClassXau = 'tick-down';
                    }
                    setTimeout(() => {
                        this.tickClassXau = '';
                        this.trendXau = 'neutral';
                    }, 800);
                }, 2000);
            },

            formatPrice(num) {
                return Math.floor(num).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            },

            pe(val) {
                if (this.lang !== 'fa' || val === undefined || val === null) return val;
                const persianDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                return val.toString().replace(/\d/g, x => persianDigits[x]);
            },

            toggleLang() {
                this.lang = this.lang === 'fa' ? 'en' : 'fa';
            },

            t(key) {
                const dict = {
                    'page_title': {fa: 'فرجی گلد | معاملات طلای آبشده', en: 'Faraji Gold | Melted Gold Trading'},
                    'brand': {fa: 'فرجی گلد', en: 'FARAJI GOLD'},
                    'nav_home': {fa: 'خانه', en: 'Home'},
                    'nav_trade': {fa: 'داشبورد', en: 'Dashboard'},
                    'nav_auth': {fa: 'ورود', en: 'Login'},
                    'alert_market_open': {
                        fa: 'بازار نقدی تهران باز است. معاملات بدون محدودیت انجام می‌شود.',
                        en: 'Tehran spot market is OPEN. Unrestricted trading is active.'
                    },
                    'hero_1': {fa: 'معاملات هوشمند', en: 'Smart Trades.'},
                    'hero_2': {fa: 'طلای آبشده', en: 'Melted Gold.'},
                    'hero_sub': {
                        fa: 'بستر یکپارچه و امن خرید و فروش طلای آبشده بین‌بنگاهی. معاف از اجرت ساخت با تسویه آنی.',
                        en: 'Secure B2B platform for trading melted gold. Zero fabrication fees with instant settlement.'
                    },
                    'btn_start': {fa: 'شروع معامله', en: 'Start Trading'},
                    'asset_melted': {fa: 'مظنه (تومان)', en: 'Mazaneh (IRR)'},
                    'asset_xau': {fa: 'انس جهانی (XAU/USD)', en: 'Global Spot (XAU/USD)'},
                    'edu_title': {fa: 'چرا طلای آبشده؟', en: 'Why Melted Gold?'},
                    'edu_desc': {
                        fa: 'طلای آبشده به دلیل نداشتن اجرت ساخت و مالیات، بالاترین حاشیه سود و نقدشوندگی را برای سرمایه‌گذاران و بنکداران فراهم می‌کند.',
                        en: 'Melted gold offers the highest profit margins and liquidity due to the absence of fabrication fees and VAT.'
                    },
                    'steps_title': {fa: 'مراحل ثبت سفارش تا تسویه', en: 'How it Works'},
                    'calc_title': {fa: 'ماشین حساب تبدیل مظنه', en: 'Mazaneh Calculator'},
                    'calc_desc': {
                        fa: 'مظنه بازار (قیمت یک مثقال طلای ۱۷ عیار) را وارد کنید تا قیمت دقیق یک گرم طلای ۱۸ عیار (۷۵۰) محاسبه شود.',
                        en: 'Enter the Mazaneh (17K Mesqal) to calculate the exact price of one gram of 18K (750) gold.'
                    },
                    'calc_input1': {fa: 'مظنه بازار (تومان)', en: 'Market Mazaneh (IRR)'},
                    'calc_result': {fa: 'قیمت هر گرم ۱۸ عیار:', en: 'Price per 18K Gram:'},
                    'calc_unit': {fa: 'تومان', en: 'IRR'},
                    'table_title': {fa: 'آخرین معاملات بازار', en: 'Recent Market Trades'},
                    'th_time': {fa: 'زمان', en: 'Time'},
                    'th_type': {fa: 'نوع', en: 'Type'},
                    'th_weight': {fa: 'وزن', en: 'Weight'},
                    'th_price': {fa: 'قیمت مچینگ', en: 'Matched Price'},
                    'th_status': {fa: 'وضعیت', en: 'Status'},
                    'status_done': {fa: 'انجام شد', en: 'Executed'},
                    'faq_title': {fa: 'سوالات متداول', en: 'Frequently Asked Questions'},
                    'tab_login': {fa: 'ورود به حساب', en: 'Sign In'},
                    'tab_register': {fa: 'ثبت‌نام', en: 'Register'},
                    'form_name': {fa: 'نام کامل', en: 'Full Name'},
                    'form_phone': {fa: 'شماره موبایل', en: 'Phone Number'},
                    'form_pass': {fa: 'رمز عبور', en: 'Password'},
                    'trade_market': {fa: 'تابلو بازار', en: 'Market Feed'},
                    'trade_order': {fa: 'ثبت سفارش', en: 'Order Ticket'},
                    'form_weight': {fa: 'وزن (گرم)', en: 'Weight (g)'},
                    'trade_total': {fa: 'ارزش سفارش:', en: 'Order Value:'},
                    'btn_buy': {fa: 'خرید (BUY)', en: 'Buy'},
                    'btn_sell': {fa: 'فروش (SELL)', en: 'Sell'},
                    'btn_execute_buy': {fa: 'تایید خرید', en: 'Confirm Buy'},
                    'btn_execute_sell': {fa: 'تایید فروش', en: 'Confirm Sell'}
                };
                return dict[key]?.[this.lang] || key;
            },

            steps: [
                {
                    title: {fa: 'احراز هویت', en: 'KYC & Auth'},
                    desc: {fa: 'تکمیل فرم و آپلود مدارک شرکتی', en: 'Complete form and upload docs'}
                },
                {
                    title: {fa: 'شارژ کیف پول', en: 'Deposit Funds'},
                    desc: {fa: 'واریز وجه نقد یا تحویل طلای فیزیکی', en: 'Fiat deposit or physical gold transfer'}
                },
                {
                    title: {fa: 'ثبت سفارش', en: 'Place Order'},
                    desc: {fa: 'انتخاب وزن و قیمت مورد نظر در پنل', en: 'Select weight and target price'}
                },
                {
                    title: {fa: 'تسویه و ری‌گیری', en: 'Settlement'},
                    desc: {fa: 'تایید کد آزمایشگاه و تسویه آنی', en: 'Assay confirmation and instant clearing'}
                }
            ],

            faqs: [
                {
                    q: {fa: 'انگ یا کد ره‌گیری چیست؟', en: 'What is an assay code?'},
                    a: {
                        fa: 'انگ یک شماره چند رقمی است که توسط آزمایشگاه‌های معتبر روی قطعه طلای آبشده حک می‌شود. با وارد کردن این کد در سامانه اتحادیه، می‌توانید از عیار دقیق (معمولاً ۷۵۰) و اصالت قطعه مطمئن شوید.',
                        en: 'An assay code is a unique ID engraved by certified labs confirming the exact purity (usually 750) and authenticity.'
                    }
                },
                {
                    q: {fa: 'فرمول تبدیل مظنه به گرم ۱۸ عیار چیست؟', en: 'What is the Mazaneh formula?'},
                    a: {
                        fa: 'مظنه قیمت یک مثقال (۴.۶۰۸ گرم) طلای ۱۷ عیار (۷۰۵) است. برای تبدیل آن به یک گرم ۱۸ عیار (۷۵۰)، مظنه را بر عدد ثابت ۴.۳۳۱۸ تقسیم می‌کنند.',
                        en: 'Mazaneh is the price of one Mesqal (4.608g) of 17K gold. Divide it by 4.3318 to get the price of one 18K gram.'
                    }
                }
            ]
        }));
    });
</script>
</body>
</html>
