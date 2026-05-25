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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="پلتفرم امن معاملات طلای آبشده. نمودار زنده، خرید و فروش بدون اجرت و تسویه آنی.">
    <title x-text="t('page_title')">فرجی گلد | پلتفرم معاملات</title>

    {{-- ==========================================================
         PERFORMANCE OPTIMIZATION
         ========================================================== --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- English Fonts (Google Fonts) --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&family=Roboto:wght@400;500;700;900&family=Poppins:wght@400;500;600;700;900&family=Montserrat:wght@400;500;600;700;900&family=Fira+Sans:wght@400;500;600;700;900&family=JetBrains+Mono:wght@400;700&family=Playfair+Display:ital,wght@0,600;1,600&display=swap"
          rel="stylesheet">

    {{-- 10 Reliable Persian/Arabic Fonts (100% Google Fonts for stability) --}}
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700;900&family=Lalezar&family=Markazi+Text:wght@400;500;600;700&family=Readex+Pro:wght@400;500;600;700&family=Cairo:wght@400;600;700&family=Tajawal:wght@400;500;700;900&family=Amiri:wght@400;700&family=Harmattan:wght@400;500;700&family=Lateef:wght@400;700&family=El+Messiri:wght@400;500;700&family=Parastoo:wght@400;500;700&display=swap"
          rel="stylesheet">

    {{-- ApexCharts for Live Data Visualization --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none !important;
        }

        /* Font Utilities EN */
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

        /* Font Utilities FA (10 Google Fonts) */
        html[dir="rtl"].font-fa-vazir {
            font-family: 'Vazirmatn', sans-serif;
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

        html[dir="rtl"].font-fa-parastoo {
            font-family: 'Parastoo', sans-serif;
            font-size: 1.2em;
        }

        html[dir="rtl"].font-fa-cairo {
            font-family: 'Cairo', sans-serif;
        }

        html[dir="rtl"].font-fa-tajawal {
            font-family: 'Tajawal', sans-serif;
        }

        html[dir="rtl"].font-fa-amiri {
            font-family: 'Amiri', serif;
            font-size: 1.1em;
        }

        html[dir="rtl"].font-fa-harmattan {
            font-family: 'Harmattan', sans-serif;
            font-size: 1.1em;
        }

        html[dir="rtl"].font-fa-lateef {
            font-family: 'Lateef', serif;
            font-size: 1.2em;
        }

        html[dir="rtl"].font-fa-messiri {
            font-family: 'El Messiri', sans-serif;
        }

        /* Fix for Persian Numbers in Monospace Classes */
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

        /* Hide scrollbars for toolbars */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* ApexCharts Overrides for Themes */
        .apexcharts-tooltip {
            background: #fff !important;
            color: #000 !important;
            border: 1px solid #e2e8f0 !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
            font-family: inherit !important;
        }

        .dark .apexcharts-tooltip {
            background: #0f172a !important;
            color: #fff !important;
            border: 1px solid #334155 !important;
        }

        /* ==========================================================================
           DYNAMIC THEME COMPONENTS (V1 - V5)
           ========================================================================== */

        /* V1: LINEAR / SAAS */
        .theme-v1 {
            background: #f8fafc;
            color: #0f172a;
        }

        .dark.theme-v1 {
            background: #020617;
            color: #f8fafc;
        }

        .theme-v1 .t-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 1.5rem;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            padding: 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        @media (min-width: 768px) {
            .theme-v1 .t-card {
                padding: 2rem;
            }
        }

        .dark.theme-v1 .t-card {
            background: #0f172a;
            border-color: #1e293b;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.5);
        }

        .theme-v1 .t-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid #cbd5e1;
            background: #f1f5f9;
            outline: none;
            transition: all 0.2s;
        }

        .dark.theme-v1 .t-input {
            border-color: #334155;
            background: #1e293b;
            color: white;
        }

        .theme-v1 .t-input:focus {
            border-color: #facc15;
            box-shadow: 0 0 0 3px rgba(250, 204, 21, 0.2);
            background: white;
        }

        .theme-v1 .t-btn {
            background: #0f172a;
            color: white;
            border-radius: 9999px;
            font-weight: 600;
            text-align: center;
            transition: all 0.2s;
        }

        .dark.theme-v1 .t-btn {
            background: white;
            color: #0f172a;
        }

        .theme-v1 .t-btn:hover {
            background: #facc15;
            color: #0f172a;
        }

        .theme-v1 .t-table th, .theme-v1 .t-table td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .dark.theme-v1 .t-table th, .dark.theme-v1 .t-table td {
            border-color: #1e293b;
        }

        .theme-v1 .t-accordion {
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            margin-bottom: 1rem;
            padding: 1.5rem;
        }

        .dark.theme-v1 .t-accordion {
            border-color: #1e293b;
            background: #0f172a;
        }

        /* V2: EDITORIAL */
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
            padding: 1.5rem;
            border: 1px solid #d6d3d1;
            border-radius: 0;
        }

        @media (min-width: 768px) {
            .theme-v2 .t-card {
                padding: 2.5rem;
            }
        }

        .dark.theme-v2 .t-card {
            border-color: #44403c;
        }

        .theme-v2 .t-input {
            width: 100%;
            padding: 0.75rem 0;
            border: none;
            border-bottom: 1px solid #a8a29e;
            background: transparent;
            font-size: 1.1rem;
            outline: none;
            transition: border 0.3s;
        }

        .dark.theme-v2 .t-input {
            border-color: #57534e;
            color: white;
        }

        .theme-v2 .t-input:focus {
            border-color: #ca8a04;
        }

        .theme-v2 .t-btn {
            background: transparent;
            border: 1px solid currentColor;
            color: inherit;
            padding: 1rem 2.5rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            text-align: center;
            transition: all 0.3s;
        }

        .theme-v2 .t-btn:hover {
            background: currentColor;
            color: #faf9f6;
        }

        .dark.theme-v2 .t-btn:hover {
            color: #1c1917;
        }

        .theme-v2 .t-table th, .theme-v2 .t-table td {
            padding: 1.2rem 0;
            border-bottom: 1px solid #d6d3d1;
        }

        .dark.theme-v2 .t-table th, .dark.theme-v2 .t-table td {
            border-color: #44403c;
        }

        .theme-v2 .t-accordion {
            border-bottom: 1px solid #d6d3d1;
            padding: 1.5rem 0;
        }

        /* V3: NEO-BRUTALIST */
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
            padding: 1.5rem;
            border-radius: 0;
            transition: transform 0.1s;
        }

        @media (min-width: 768px) {
            .theme-v3 .t-card {
                padding: 2.5rem;
            }
        }

        .dark.theme-v3 .t-card {
            background: #000;
            border-color: #facc15;
            box-shadow: 6px 6px 0px 0px #facc15;
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
            border-color: #facc15;
            background: #000;
            color: white;
        }

        .theme-v3 .t-input:focus {
            background: #fef3c7;
        }

        .dark.theme-v3 .t-input:focus {
            background: #451a03;
        }

        .theme-v3 .t-btn {
            background: #facc15;
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
            color: #facc15;
            border-color: #facc15;
            box-shadow: 4px 4px 0px 0px #facc15;
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
            border-color: #facc15;
            background: #000;
        }

        .theme-v3 .t-accordion {
            border: 4px solid #000;
            padding: 1.5rem;
            margin-bottom: 1rem;
            background: #fff;
            box-shadow: 4px 4px 0px 0px #000;
        }

        .dark.theme-v3 .t-accordion {
            border-color: #facc15;
            background: #000;
            box-shadow: 4px 4px 0px 0px #facc15;
        }

        /* V4: SPATIAL GLASS */
        .theme-v4 {
            background: #f1f5f9;
            color: #0f172a;
        }

        .dark.theme-v4 {
            background: #09090b;
            color: #fff;
        }

        .theme-v4 .t-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 1.5rem;
            padding: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.05);
        }

        @media (min-width: 768px) {
            .theme-v4 .t-card {
                padding: 2rem;
            }
        }

        .dark.theme-v4 .t-card {
            background: rgba(255, 255, 255, 0.03);
            border-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), inset 0 1px 0 rgba(255, 255, 255, 0.1);
        }

        .theme-v4 .t-input {
            width: 100%;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
            outline: none;
            transition: all 0.3s;
        }

        .dark.theme-v4 .t-input {
            background: rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .theme-v4 .t-input:focus {
            border-color: #facc15;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 15px rgba(250, 204, 21, 0.1);
        }

        .dark.theme-v4 .t-input:focus {
            background: rgba(255, 255, 255, 0.05);
        }

        .theme-v4 .t-btn {
            background: rgba(250, 204, 21, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(250, 204, 21, 0.3);
            border-radius: 1rem;
            color: #000;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s;
        }

        .theme-v4 .t-btn:hover {
            background: rgba(250, 204, 21, 1);
            transform: scale(1.02);
        }

        .theme-v4 .t-table th, .theme-v4 .t-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .dark.theme-v4 .t-table th, .dark.theme-v4 .t-table td {
            border-color: rgba(255, 255, 255, 0.1);
        }

        .theme-v4 .t-accordion {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .dark.theme-v4 .t-accordion {
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.1);
        }

        /* V5: TERMINAL / UTILITARIAN */
        .theme-v5 {
            background: #f8f9fa;
            color: #000;
        }

        .dark.theme-v5 {
            background: #000;
            color: #fff;
        }

        .theme-v5 .t-card {
            background: #fff;
            border: 1px solid #d4d4d8;
            padding: 1.5rem;
            border-radius: 0;
        }

        .dark.theme-v5 .t-card {
            background: #050505;
            border-color: #333;
        }

        .theme-v5 .t-input {
            width: 100%;
            padding: 0.75rem;
            background: #fff;
            border: 1px dashed #a1a1aa;
            color: #000;
            font-family: inherit;
            outline: none;
        }

        .dark.theme-v5 .t-input {
            background: #000;
            border-color: #555;
            color: #facc15;
        }

        .theme-v5 .t-input:focus {
            border-style: solid;
            border-color: #facc15;
        }

        .theme-v5 .t-btn {
            background: #e4e4e7;
            border: 1px solid #d4d4d8;
            color: #000;
            font-family: inherit;
            text-transform: uppercase;
            text-align: center;
            transition: all 0.2s;
        }

        .dark.theme-v5 .t-btn {
            background: #111;
            border-color: #333;
            color: #facc15;
        }

        .theme-v5 .t-btn:hover {
            background: #facc15;
            border-color: #facc15;
            color: #000;
        }

        .theme-v5 .t-table th, .theme-v5 .t-table td {
            padding: 0.75rem;
            border-bottom: 1px dashed #d4d4d8;
            font-family: inherit;
        }

        .dark.theme-v5 .t-table th, .dark.theme-v5 .t-table td {
            border-color: #333;
        }

        .theme-v5 .t-accordion {
            border: 1px solid #d4d4d8;
            padding: 1rem;
            margin-bottom: 0.5rem;
            font-family: inherit;
            background: #fff;
        }

        .dark.theme-v5 .t-accordion {
            border-color: #333;
            background: transparent;
        }

        /* ==========================================================================
           RESPONSIVE CARD-BASED TABLES FOR MOBILE (Transforms tables < 768px)
           ========================================================================== */
        @media (max-width: 768px) {
            .t-table, .t-table tbody, .t-table tr, .t-table td {
                display: block;
                width: 100%;
            }

            .t-table thead {
                display: none;
            }

            /* Hide standard headers on mobile */
            .t-table tr {
                margin-bottom: 1rem;
                border: 1px solid rgba(128, 128, 128, 0.2);
                border-radius: 0.5rem;
                overflow: hidden;
            }

            .theme-v3 .t-table tr {
                border: 2px solid #000;
            }

            .dark.theme-v3 .t-table tr {
                border: 2px solid #facc15;
            }

            .theme-v5 .t-table tr {
                border: 1px dashed #555;
            }

            .t-table td {
                display: flex !important;
                justify-content: space-between;
                align-items: center;
                padding: 0.75rem 1rem !important;
                border-bottom: 1px solid rgba(128, 128, 128, 0.1) !important;
                text-align: left;
            }

            html[dir="rtl"] .t-table td {
                text-align: right;
            }

            .t-table td:last-child {
                border-bottom: none !important;
            }

            .t-table td::before {
                content: attr(data-label);
                font-weight: bold;
                opacity: 0.6;
                font-size: 0.85em;
                text-transform: uppercase;
            }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col relative overflow-x-hidden selection:bg-amber-500 selection:text-black">

{{-- V4 Ambient Background --}}
<div x-show="version === 4" class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden">
    <div class="absolute top-[10%] left-[20%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-amber-500/20 dark:bg-amber-500/20 rounded-full blur-[100px] mix-blend-multiply dark:mix-blend-screen animate-pulse"></div>
    <div class="absolute bottom-[10%] right-[20%] w-[400px] md:w-[600px] h-[400px] md:h-[600px] bg-blue-400/20 dark:bg-blue-500/10 rounded-full blur-[120px] mix-blend-multiply dark:mix-blend-screen"
         style="animation: pulse 4s infinite reverse;"></div>
</div>

{{-- TOAST NOTIFICATIONS --}}
<div class="fixed top-6 right-6 z-[120] flex flex-col gap-3 pointer-events-none">
    <template x-for="toast in toasts" :key="toast.id">
        <div class="pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-lg shadow-xl animate-toast bg-zinc-900 text-white border border-zinc-700"
             :class="{'bg-green-600 border-green-500': toast.type === 'success', 'bg-red-600 border-red-500': toast.type === 'error'}">
            <svg x-show="toast.type === 'success'" class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                 stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-sm font-bold" x-text="toast.message"></span>
        </div>
    </template>
</div>

{{-- HEADER --}}
<header class="w-full px-4 md:px-6 py-4 flex justify-between items-center z-50 sticky top-0 transition-all"
        :class="{'border-b border-zinc-200 dark:border-zinc-800 bg-white/90 dark:bg-zinc-950/90 backdrop-blur-md': version === 5 || version === 2 || version === 1, 'border-b-4 border-black dark:border-amber-500 bg-[#f4f4f0] dark:bg-zinc-900': version === 3, 'bg-white/50 dark:bg-zinc-950/50 backdrop-blur-xl border-b border-zinc-200 dark:border-white/10': version === 4}">
    <div class="flex items-center gap-3 cursor-pointer" @click="view = 'home'">
        <div class="w-10 h-10 flex items-center justify-center bg-amber-500 text-black font-black text-xl flex-shrink-0"
             :class="{'rounded-full': version === 1 || version === 4}">FG
        </div>
        <span class="font-bold tracking-tight text-xl md:text-2xl hidden sm:block" :class="{'uppercase': version === 3}"
              x-text="t('brand')"></span>
    </div>
    <nav class="flex gap-4 md:gap-8 items-center font-semibold text-sm">
        <button @click="view = 'home'" class="hidden md:flex items-center gap-2 hover:text-amber-500 transition-colors"
                :class="{'text-amber-500': view === 'home'}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
            </svg>
            <span x-text="t('nav_home')"></span>
        </button>
        <button @click="view = 'trade'" class="flex items-center gap-2 hover:text-amber-500 transition-colors"
                :class="{'text-amber-500': view === 'trade'}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
            </svg>
            <span x-text="t('nav_trade')"></span>
        </button>
        <button @click="view = 'auth'" class="t-btn px-4 md:px-6 py-2 text-sm flex items-center gap-2">
            <svg class="w-4 h-4 hidden sm:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
            </svg>
            <span x-text="t('nav_auth')"></span>
        </button>
    </nav>
</header>

{{-- MAIN CONTENT AREA --}}
<main class="flex-grow flex flex-col relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-10">

    {{-- ==================================================== --}}
    {{-- VIEW: HOME --}}
    {{-- ==================================================== --}}
    <div x-show="view === 'home'" x-transition.opacity.duration.300ms class="flex-col gap-12 md:gap-16"
         :class="view === 'home' ? 'flex' : 'hidden'">

        {{-- Dynamic Hero Sections --}}
        <div class="w-full">
            {{-- V1/V4 --}}
            <div x-show="version === 1 || version === 4" class="text-center max-w-4xl mx-auto pt-4 md:pt-10">
                <div class="inline-flex items-center gap-2 px-3 py-1 mb-6 md:mb-8 rounded-full border border-amber-500/30 bg-amber-500/10 text-amber-600 dark:text-amber-400 text-xs font-bold uppercase tracking-widest">
                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                    <span x-text="t('alert_market_open')"></span>
                </div>
                <h1 class="text-4xl sm:text-5xl md:text-7xl lg:text-8xl font-black tracking-tighter leading-tight mb-4 md:mb-6">
                    <span x-text="t('hero_1')"></span> <br class="hidden sm:block">
                    <span class="text-amber-500" x-text="t('hero_2')"></span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl opacity-70 mb-8 md:mb-10 leading-relaxed px-2"
                   x-text="t('hero_sub')"></p>
                <button @click="view = 'trade'"
                        class="t-btn px-8 md:px-10 py-3 md:py-4 text-base md:text-lg flex items-center gap-2 mx-auto">
                    <span x-text="t('btn_start')"></span>
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
                    </svg>
                </button>
            </div>

            {{-- V2 --}}
            <div x-show="version === 2" class="max-w-5xl">
                <span class="text-amber-600 font-bold tracking-widest uppercase text-sm mb-4 block"
                      x-text="t('alert_market_open')"></span>
                <h1 class="text-5xl sm:text-6xl md:text-8xl font-serif-custom leading-tight mb-6 md:mb-8">
                    <span x-text="t('hero_1')"></span><br>
                    <i class="text-amber-600" x-text="t('hero_2')"></i>
                </h1>
                <p class="text-lg md:text-xl opacity-60 mb-8 md:mb-10 border-l-2 border-amber-500 rtl:border-r-2 rtl:border-l-0 px-4 md:px-6 py-2"
                   x-text="t('hero_sub')"></p>
                <button @click="view = 'trade'" class="t-btn px-8 md:px-10 py-3 md:py-4 text-base md:text-lg"
                        x-text="t('btn_start')"></button>
            </div>

            {{-- V3 --}}
            <div x-show="version === 3" class="t-card max-w-5xl mx-auto transform -rotate-1 text-center mt-6 md:mt-10">
                <div class="bg-amber-500 text-black font-black px-4 py-2 inline-block mb-4 md:mb-6 border-4 border-black text-xs md:text-sm"
                     x-text="t('alert_market_open')"></div>
                <h1 class="text-5xl sm:text-6xl md:text-9xl font-black uppercase tracking-tighter leading-none mb-6 md:mb-8">
                    <span x-text="t('hero_1')"></span> <span
                            class="text-amber-500 bg-black px-4 block md:inline mt-2 md:mt-0"
                            x-text="t('hero_2')"></span>
                </h1>
                <button @click="view = 'trade'" class="t-btn px-8 md:px-12 py-4 md:py-6 text-xl md:text-2xl w-full"
                        x-text="t('btn_start')"></button>
            </div>

            {{-- V5 --}}
            <div x-show="version === 5" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="t-card flex flex-col justify-center min-h-[300px] md:min-h-[400px]">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl uppercase mb-4" x-text="t('hero_1')"></h1>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl text-amber-500 mb-8">> <span
                                x-text="t('hero_2')"></span><span class="animate-pulse">_</span></h1>
                    <button @click="view = 'trade'" class="t-btn px-8 py-3 md:py-4 w-fit"
                            x-text="t('btn_start')"></button>
                </div>
                <div class="t-card flex flex-col justify-between text-xs md:text-sm opacity-80">
                    <div class="space-y-2 font-mono">
                        <div>> SYSTEM_CORE_READY</div>
                        <div>> CONNECTING_XAUUSD_POOL... OK</div>
                        <div class="text-green-500">> <span x-text="t('alert_market_open')"></span></div>
                    </div>
                    <div class="text-amber-500 text-4xl sm:text-5xl md:text-6xl my-8 md:my-10 text-center font-mono"
                         :class="tickClass" x-text="pe(formatPrice(price))"></div>
                </div>
            </div>
        </div>

        {{-- Market Feed Stats --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <div class="t-card flex flex-col justify-between">
                <div class="text-sm font-bold opacity-60 uppercase mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span x-text="t('asset_melted')"></span>
                </div>
                <div class="text-3xl md:text-4xl font-black mb-2 flex items-center gap-2 font-mono" :class="tickClass"
                     dir="ltr">
                    <span x-text="pe(formatPrice(price))"></span>
                </div>
                <div class="text-sm flex gap-2 font-bold" :class="trend === 'up' ? 'text-green-500' : 'text-red-500'"
                     dir="ltr">
                    <span x-text="trend === 'up' ? '▲' : '▼'"></span> <span x-text="pe('0.45%')"></span>
                </div>
            </div>
            <div class="t-card flex flex-col justify-between">
                <div class="text-sm font-bold opacity-60 uppercase mb-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 01-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0112 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5"/>
                    </svg>
                    <span x-text="t('asset_xau')"></span>
                </div>
                <div class="text-3xl md:text-4xl font-black mb-2 flex items-center gap-2 font-mono"
                     :class="tickClassXau" dir="ltr">
                    $<span x-text="pe((priceXau).toFixed(2))"></span>
                </div>
                <div class="text-sm flex gap-2 font-bold" :class="trendXau === 'up' ? 'text-green-500' : 'text-red-500'"
                     dir="ltr">
                    <span x-text="trendXau === 'up' ? '▲' : '▼'"></span> <span x-text="pe('0.12%')"></span>
                </div>
            </div>
            <div class="t-card flex flex-col justify-center bg-amber-50 dark:bg-amber-900/10 sm:col-span-2 md:col-span-1">
                <h3 class="text-lg md:text-xl font-bold mb-3 text-amber-600 dark:text-amber-500 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.82 1.508-2.316a7.5 7.5 0 10-7.516 0c.85.496 1.508 1.333 1.508 2.316V18"/>
                    </svg>
                    <span x-text="t('edu_title')"></span>
                </h3>
                <p class="text-xs md:text-sm opacity-80 leading-relaxed font-semibold" x-text="t('edu_desc')"></p>
            </div>
        </div>

        {{-- LIVE APEXCHARTS COMPONENT --}}
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2" :class="{'font-serif-custom': version === 2}">
                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
                </svg>
                <span x-text="t('chart_title')"></span>
            </h2>
            <div class="t-card !px-0 !pb-0 overflow-hidden relative flex flex-col justify-end" dir="ltr">
                <div class="absolute top-4 left-4 font-mono text-sm opacity-60 font-bold z-10 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                    XAU/USD (LIVE TICK)
                </div>
                {{-- ApexChart Container --}}
                <div id="gold-chart" class="w-full mt-4"></div>
            </div>
        </div>

        {{-- Blog / Articles --}}
        <div class="w-full border-t border-zinc-200 dark:border-zinc-800 pt-16">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2" :class="{'font-serif-custom': version === 2}">
                <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                </svg>
                <span x-text="t('blog_title')"></span>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <template x-for="(blog, i) in blogs" :key="i">
                    <div class="t-card flex flex-col group cursor-pointer hover:border-amber-500 transition-colors">
                        <div class="h-32 mb-4 rounded-xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center transition-colors group-hover:bg-amber-100 dark:group-hover:bg-amber-900/30"
                             :class="{'rounded-none border-2 border-black': version===3}">
                            <svg class="w-10 h-10 text-zinc-400 group-hover:text-amber-500 transition-colors"
                                 fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-mono opacity-50 mb-2" dir="ltr" x-text="pe(blog.date)"></span>
                        <h3 class="font-bold text-base md:text-lg leading-snug mb-3 group-hover:text-amber-500 transition-colors"
                            x-text="blog.title[lang]"></h3>
                        <span class="mt-auto text-sm font-bold opacity-70 flex items-center gap-1 group-hover:text-amber-500">
                            <span x-text="t('btn_read')"></span>
                            <svg class="w-4 h-4 rtl:rotate-180" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round"
                                                           d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </span>
                    </div>
                </template>
            </div>
        </div>

        {{-- Steps Component --}}
        <div class="w-full border-t border-zinc-200 dark:border-zinc-800 pt-16">
            <h2 class="text-2xl font-bold mb-10 text-center" :class="{'font-serif-custom': version === 2}"
                x-text="t('steps_title')"></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 relative">
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-zinc-200 dark:bg-zinc-800 -translate-y-1/2 z-0"
                     :class="{'border-b-4 border-black bg-transparent': version===3}"></div>
                <template x-for="(step, i) in steps" :key="i">
                    <div class="t-card relative z-10 flex flex-col items-center text-center !px-4">
                        <div class="w-10 h-10 rounded-full bg-amber-500 text-black font-black flex items-center justify-center mb-4 text-xl font-mono"
                             :class="{'rounded-none border-2 border-black': version===3 || version===5}"
                             x-text="pe(i+1)"></div>
                        <h3 class="font-bold mb-2 text-base md:text-lg" x-text="step.title[lang]"></h3>
                        <p class="text-xs opacity-70 leading-relaxed" x-text="step.desc[lang]"></p>
                    </div>
                </template>
            </div>
        </div>

        {{-- Bubble Calculator --}}
        <div class="w-full">
            <div class="t-card w-full max-w-4xl mx-auto flex flex-col md:flex-row gap-8 items-center bg-zinc-50 dark:bg-zinc-900/50">
                <div class="flex-1 w-full">
                    <h2 class="text-xl md:text-2xl font-bold mb-4 flex items-center gap-2"
                        :class="{'font-serif-custom': version===2}">
                        <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25v-.008zm0 2.25h.008v.008H8.25v-.008zM12 8.25h.008v.008H12v-.008zm0 2.25h.008v.008H12v-.008zm0 2.25h.008v.008H12v-.008zm0 2.25h.008v.008H12v-.008zm0 2.25h.008v.008H12v-.008zM15.75 8.25h.008v.008H15.75v-.008zm0 2.25h.008v.008H15.75v-.008zm0 2.25h.008v.008H15.75v-.008zm0 2.25h.008v.008H15.75v-.008zM4.5 2.25h15A2.25 2.25 0 0121.75 4.5v15a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25v-15a2.25 2.25 0 012.25-2.25z"/>
                        </svg>
                        <span x-text="t('calc_title')"></span>
                    </h2>
                    <p class="text-xs md:text-sm opacity-70 mb-6 leading-relaxed" x-text="t('calc_desc')"></p>
                    <label class="block text-xs font-bold mb-2 opacity-70" x-text="t('calc_input1')"></label>
                    <input type="number" x-model="calcMazaneh" class="t-input font-mono text-xl" dir="ltr">
                </div>
                <div class="w-full md:flex-1 bg-amber-500 text-black p-6 md:p-8 rounded-2xl flex flex-col justify-center items-center text-center"
                     :class="{'rounded-none border-4 border-black': version===3, 'rounded-none': version===5}">
                    <div class="text-sm font-bold mb-2 opacity-80" x-text="t('calc_result')"></div>
                    <div class="text-4xl md:text-5xl font-black font-mono mb-2" dir="ltr"
                         x-text="pe(formatPrice(calcMazaneh / 4.3318))"></div>
                    <div class="text-xs font-bold opacity-80" x-text="t('calc_unit')"></div>
                </div>
            </div>
        </div>

        {{-- Table (Recent Trades) --}}
        <div class="w-full">
            <h2 class="text-2xl font-bold mb-6" :class="{'font-serif-custom': version === 2}"
                x-text="t('table_title')"></h2>
            <div class="t-card overflow-hidden !p-0 sm:!p-6 w-full border-0 sm:border border-zinc-200 dark:border-zinc-800"
                 :class="{'sm:border-4 sm:border-black dark:sm:border-amber-500': version === 3}">
                <table class="t-table w-full text-sm whitespace-nowrap">
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
                        <tr>
                            <td class="font-mono opacity-70" dir="ltr" :data-label="t('th_time')"
                                x-text="pe(trade.time)"></td>
                            <td :data-label="t('th_type')"><span
                                        class="px-2 py-1 text-[10px] sm:text-xs font-bold rounded"
                                        :class="trade.type === 'buy' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400'"
                                        x-text="trade.type === 'buy' ? t('btn_buy') : t('btn_sell')"></span></td>
                            <td class="font-mono" dir="ltr" :data-label="t('th_weight')"><span
                                        x-text="pe(trade.weight)"></span>g
                            </td>
                            <td class="font-mono font-bold" dir="ltr" :data-label="t('th_price')"
                                x-text="pe(formatPrice(trade.price))"></td>
                            <td class="text-green-500 font-bold" :data-label="t('th_status')"
                                x-text="t('status_done')"></td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Accordion (FAQ) --}}
        <div class="w-full max-w-4xl mx-auto pt-8">
            <h2 class="text-2xl font-bold mb-6 text-center" :class="{'font-serif-custom': version === 2}"
                x-text="t('faq_title')"></h2>
            <template x-for="(faq, i) in faqs" :key="i">
                <div class="t-accordion cursor-pointer group"
                     @click="activeFaq === i ? activeFaq = null : activeFaq = i">
                    <div class="flex justify-between items-center font-bold text-base md:text-lg group-hover:text-amber-500 transition-colors">
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
            <div class="flex gap-6 mb-8 border-b border-zinc-300 dark:border-zinc-700 pb-2"
                 :class="{'border-b-4 border-black dark:border-amber-500': version === 3}">
                <button @click="authTab = 'login'" class="pb-2 font-bold text-base md:text-lg transition-all"
                        :class="authTab === 'login' ? 'text-amber-500 border-b-2 border-amber-500' : 'opacity-40'"
                        x-text="t('tab_login')"></button>
                <button @click="authTab = 'register'" class="pb-2 font-bold text-base md:text-lg transition-all"
                        :class="authTab === 'register' ? 'text-amber-500 border-b-2 border-amber-500' : 'opacity-40'"
                        x-text="t('tab_register')"></button>
            </div>

            <form @submit.prevent="pushToast(authTab === 'login' ? t('toast_login') : t('toast_reg'), 'success')">
                <div class="space-y-5">
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

                    <button type="submit" class="t-btn w-full py-3 md:py-4 mt-6 text-base md:text-lg"
                            x-text="authTab === 'login' ? t('tab_login') : t('tab_register')"></button>
                </div>
            </form>
        </div>
    </div>

    {{-- ==================================================== --}}
    {{-- VIEW: TRADE DASHBOARD --}}
    {{-- ==================================================== --}}
    <div x-show="view === 'trade'" x-cloak x-transition.opacity.duration.300ms class="flex-grow flex flex-col"
         :class="view === 'trade' ? 'flex' : 'hidden'">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 h-full items-start">

            {{-- Left Col: Ticker & OrderBook --}}
            <div class="lg:col-span-2 flex flex-col gap-6 w-full overflow-hidden">
                <div class="t-card flex flex-col min-h-[300px] md:min-h-[400px]">
                    <div class="flex justify-between items-center mb-6 md:mb-8 border-b border-zinc-200 dark:border-zinc-800 pb-4"
                         :class="{'border-black border-b-4': version === 3}">
                        <h2 class="font-bold text-lg md:text-xl" :class="{'font-serif-custom': version === 2}"
                            x-text="t('trade_market')"></h2>
                        <span class="text-[10px] md:text-xs px-2 py-1 bg-green-500/20 text-green-600 dark:text-green-400 font-mono font-bold flex items-center gap-1.5"
                              :class="{'rounded-none border border-green-500': version === 3 || version === 5, 'rounded-full': version === 1 || version === 4}">
                                <span class="w-1.5 md:w-2 h-1.5 md:h-2 rounded-full bg-green-500 animate-pulse"></span> LIVE
                            </span>
                    </div>

                    <div class="flex-grow flex flex-col justify-center items-center py-6 md:py-10">
                        <div class="text-xs md:text-sm opacity-60 mb-2 md:mb-4 uppercase tracking-widest font-mono"
                             x-text="t('asset_melted')"></div>
                        <div class="text-4xl sm:text-6xl md:text-8xl font-black font-mono tracking-tighter flex items-center gap-2 md:gap-4 transition-colors duration-200"
                             :class="tickClass" dir="ltr">
                            <span x-text="pe(formatPrice(price))"></span>
                        </div>
                        <div class="mt-4 md:mt-6 flex flex-wrap justify-center gap-4 md:gap-6 font-mono text-xs md:text-sm border border-zinc-200 dark:border-zinc-800 px-4 md:px-6 py-2"
                             :class="{'rounded-full': version === 1, 'rounded-none': version !== 1}">
                            <div class="opacity-70">H: <span class="text-green-500"
                                                             x-text="pe(formatPrice(price + 150000))"></span></div>
                            <div class="opacity-70">L: <span class="text-red-500"
                                                             x-text="pe(formatPrice(price - 120000))"></span></div>
                        </div>
                    </div>
                </div>

                {{-- Order Book --}}
                <div class="t-card !p-0 sm:!p-6 overflow-hidden w-full border-0 sm:border border-zinc-200 dark:border-zinc-800"
                     :class="{'sm:border-4 sm:border-black dark:sm:border-amber-500': version === 3}">
                    <h3 class="text-base md:text-lg font-bold mb-4 px-4 sm:px-0 pt-4 sm:pt-0"
                        x-text="t('table_title')"></h3>
                    <table class="t-table w-full text-xs md:text-sm whitespace-nowrap">
                        <thead>
                        <tr>
                            <th x-text="t('th_time')"></th>
                            <th x-text="t('th_type')"></th>
                            <th x-text="t('th_weight')"></th>
                            <th x-text="t('th_price')"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <template x-for="(trade, i) in recentTrades" :key="i">
                            <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                                <td class="font-mono opacity-70" dir="ltr" :data-label="t('th_time')"
                                    x-text="pe(trade.time)"></td>
                                <td :data-label="t('th_type')"><span
                                            class="px-1.5 py-0.5 md:px-2 md:py-1 text-[9px] md:text-xs font-bold rounded"
                                            :class="trade.type === 'buy' ? 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400'"
                                            x-text="trade.type === 'buy' ? t('btn_buy') : t('btn_sell')"></span></td>
                                <td class="font-mono" dir="ltr" :data-label="t('th_weight')"><span
                                            x-text="pe(trade.weight)"></span>g
                                </td>
                                <td class="font-mono font-bold" dir="ltr" :data-label="t('th_price')"
                                    x-text="pe(formatPrice(trade.price))"></td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Right Col: Order Form --}}
            <div class="t-card flex flex-col h-full lg:sticky lg:top-24 mt-6 lg:mt-0">
                <h2 class="font-bold text-lg md:text-xl mb-4 md:mb-6 border-b border-zinc-200 dark:border-zinc-800 pb-4"
                    :class="{'font-serif-custom': version === 2, 'border-black border-b-4': version === 3}"
                    x-text="t('trade_order')"></h2>

                <div class="flex gap-2 mb-6 md:mb-8">
                    <button @click="orderType = 'buy'"
                            class="flex-1 py-2 md:py-3 font-bold text-xs md:text-sm transition-colors border"
                            :class="orderType === 'buy' ? 'bg-green-500 text-white border-green-500' : 'border-zinc-300 dark:border-zinc-700 opacity-50 text-inherit'"
                            x-text="t('btn_buy')"></button>
                    <button @click="orderType = 'sell'"
                            class="flex-1 py-2 md:py-3 font-bold text-xs md:text-sm transition-colors border"
                            :class="orderType === 'sell' ? 'bg-red-500 text-white border-red-500' : 'border-zinc-300 dark:border-zinc-700 opacity-50 text-inherit'"
                            x-text="t('btn_sell')"></button>
                </div>

                <form @submit.prevent="pushToast(t('toast_order_success') + ' (' + weight + 'g)', 'success')"
                      class="space-y-6 flex-grow flex flex-col">
                    <div>
                        <label class="block text-xs font-bold mb-2 opacity-70 uppercase tracking-widest"
                               x-text="t('form_weight')"></label>
                        <div class="relative">
                            <input type="number" x-model="weight"
                                   class="t-input font-mono text-xl md:text-2xl text-center" dir="ltr" min="1" step="1"
                                   required>
                            <span class="absolute right-4 rtl:right-auto rtl:left-4 top-1/2 -translate-y-1/2 opacity-50 font-mono text-xs md:text-sm">gr</span>
                        </div>
                    </div>

                    <div class="pt-6 mt-auto border-t border-zinc-200 dark:border-zinc-800"
                         :class="{'border-black border-t-2': version === 3}">
                        <div class="flex justify-between items-center mb-4 md:mb-6">
                            <span class="opacity-70 text-xs md:text-sm font-mono uppercase"
                                  x-text="t('trade_total')"></span>
                            <span class="font-bold text-xl md:text-2xl font-mono" dir="ltr"
                                  x-text="pe(formatPrice(price * (weight / 4.3318)))"></span>
                        </div>
                        <button type="submit" class="t-btn w-full py-3 md:py-4 text-base md:text-lg border-none"
                                :class="{'!bg-green-500 !text-white !shadow-[4px_4px_0_0_#000]': orderType === 'buy' && version===3, '!bg-red-500 !text-white !shadow-[4px_4px_0_0_#000]': orderType === 'sell' && version===3, '!bg-green-600 !text-white hover:!bg-green-500': orderType === 'buy' && version!==3, '!bg-red-600 !text-white hover:!bg-red-500': orderType === 'sell' && version!==3}"
                                x-text="orderType === 'buy' ? t('btn_execute_buy') : t('btn_execute_sell')"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

{{-- FOOTER --}}
<footer class="mt-auto w-full pt-10 md:pt-12 pb-32 md:pb-40 border-t"
        :class="{'border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950': version === 1 || version === 4 || version === 5, 'border-t-4 border-black dark:border-amber-500 bg-[#f4f4f0] dark:bg-zinc-900': version === 3, 'border-zinc-300 dark:border-zinc-700 bg-transparent': version === 2}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8 md:mb-12 border-b border-zinc-200 dark:border-zinc-800 pb-8 md:pb-12"
             :class="{'border-zinc-400 dark:border-zinc-700': version===2, 'border-black dark:border-amber-500': version===3}">
            <div class="md:col-span-2">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-amber-500 flex items-center justify-center text-black font-bold text-sm"
                         :class="{'rounded-full': version === 1 || version === 4}">FG
                    </div>
                    <span class="font-bold tracking-tight text-xl" x-text="t('brand')"></span>
                </div>
                <p class="text-xs md:text-sm opacity-60 leading-relaxed max-w-sm" x-text="t('footer_about')"></p>
            </div>
            <div class="grid grid-cols-2 gap-8 md:gap-0 md:col-span-2">
                <div>
                    <h4 class="font-bold mb-4 opacity-80 uppercase tracking-widest text-xs">Platform</h4>
                    <div class="flex flex-col gap-2 text-xs md:text-sm opacity-60 font-mono">
                        <a href="#" class="hover:text-amber-500 transition-colors">API Docs</a>
                        <a href="#" class="hover:text-amber-500 transition-colors">KYC Validation</a>
                        <a href="#" class="hover:text-amber-500 transition-colors">Legal Terms</a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-4 opacity-80 uppercase tracking-widest text-xs">Contact</h4>
                    <div class="flex flex-col gap-2 text-xs md:text-sm opacity-60 font-mono" dir="ltr">
                            <span class="flex items-center gap-2 justify-end rtl:justify-start">
                                support@farajigold.com
                            </span>
                        <span class="flex items-center gap-2 justify-end rtl:justify-start">
                                <span x-text="pe('+98 21 8888 8888')"></span>
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs opacity-50 text-center md:text-left">
            <span class="font-bold tracking-tight">Faraji Gold B2B Platform &copy; <span class="font-mono"
                                                                                         x-text="pe('2026')"></span></span>
            <span class="font-mono text-[10px] md:text-xs tracking-widest uppercase">System Status: Optimal | MS: <span
                        x-text="pe('12')"></span>ms</span>
        </div>
    </div>
</footer>

{{-- ==================================================== --}}
{{-- FLOATING ENGINE PANEL (Responsive) --}}
{{-- ==================================================== --}}
<div class="fixed bottom-4 left-1/2 -translate-x-1/2 z-[100] flex flex-col gap-2 items-center w-[95%] max-w-3xl"
     dir="ltr">

    {{-- Font Pickers --}}
    <div class="bg-zinc-900 text-white rounded-full shadow-2xl border border-zinc-700 p-1 flex items-center gap-1 w-full overflow-x-auto hide-scrollbar">
        <span class="text-[8px] sm:text-[9px] font-bold text-zinc-400 uppercase tracking-widest pl-2 sm:pl-3 pr-1 sm:pr-2 flex-shrink-0"
              x-text="lang === 'fa' ? 'FA FONTS' : 'EN FONTS'"></span>

        <template x-if="lang === 'fa'">
            <div class="flex gap-1 pr-2">
                <template
                        x-for="f in [{id:'vazir', l:'Vazir'},{id:'parastoo', l:'Parastoo'},{id:'lalezar', l:'Lalezar'},{id:'tajawal', l:'Tajawal'},{id:'amiri', l:'Amiri'},{id:'cairo', l:'Cairo'},{id:'markazi', l:'Markazi'},{id:'readex', l:'Readex'}]"
                        :key="f.id">
                    <button @click="fontFa = f.id"
                            class="px-2 sm:px-3 py-1 sm:py-1.5 text-[9px] sm:text-[10px] font-bold rounded-full whitespace-nowrap transition-colors flex-shrink-0"
                            :class="fontFa === f.id ? 'bg-amber-500 text-black' : 'text-zinc-400 hover:bg-zinc-800 hover:text-white'"
                            x-text="f.l"></button>
                </template>
            </div>
        </template>

        <template x-if="lang === 'en'">
            <div class="flex gap-1 pr-2">
                <template
                        x-for="f in [{id:'inter', l:'Inter'},{id:'roboto', l:'Roboto'},{id:'poppins', l:'Poppins'},{id:'montserrat', l:'Montserrat'},{id:'firasans', l:'Fira Sans'}]"
                        :key="f.id">
                    <button @click="fontEn = f.id"
                            class="px-2 sm:px-3 py-1 sm:py-1.5 text-[9px] sm:text-[10px] font-bold rounded-full whitespace-nowrap transition-colors flex-shrink-0"
                            :class="fontEn === f.id ? 'bg-amber-500 text-black' : 'text-zinc-400 hover:bg-zinc-800 hover:text-white'"
                            x-text="f.l"></button>
                </template>
            </div>
        </template>
    </div>

    {{-- Theme Toggles --}}
    <div class="bg-zinc-900 text-white rounded-full shadow-2xl border border-zinc-700 p-1 sm:p-1.5 flex items-center gap-1 sm:gap-2 max-w-full overflow-x-auto hide-scrollbar">
        <span class="text-[8px] sm:text-[9px] font-bold text-zinc-400 uppercase tracking-widest pl-2 sm:pl-3 pr-1 hidden sm:block flex-shrink-0">UI Theme</span>
        <div class="flex gap-1 flex-shrink-0 pl-1 sm:pl-0">
            <template x-for="v in [1,2,3,4,5]" :key="v">
                <button @click="version = v"
                        class="w-6 h-6 sm:w-8 sm:h-8 flex items-center justify-center text-xs sm:text-sm font-bold transition-all rounded-full"
                        :class="version === v ? 'bg-white text-black scale-110' : 'text-zinc-400 hover:bg-zinc-800'"
                        x-text="pe(v)"></button>
            </template>
        </div>
        <div class="w-px h-4 sm:h-6 bg-zinc-700 mx-1 flex-shrink-0"></div>
        <button @click="darkMode = !darkMode"
                class="p-1.5 sm:p-2 text-zinc-400 hover:text-white rounded-full hover:bg-zinc-800 flex-shrink-0">
            <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"/>
            </svg>
        </button>
        <button @click="toggleLang"
                class="p-1.5 sm:p-2 text-[10px] sm:text-xs font-bold text-amber-500 hover:text-amber-400 uppercase pr-3 sm:pr-4 rounded-full hover:bg-zinc-800 flex-shrink-0"
                x-text="lang === 'fa' ? 'EN' : 'FA'"></button>
    </div>
</div>

{{-- ==================================================== --}}
{{-- LOGIC & APEXCHARTS --}}
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
            toasts: [],

            // Market Data
            price: 18750000,
            trend: 'neutral',
            tickClass: '',

            // XAUUSD Data
            priceXau: 5015.00,
            trendXau: 'neutral',
            tickClassXau: '',

            // Chart Engine
            chart: null,
            chartData: [],

            activeFaq: null,

            recentTrades: [
                {time: '14:25:31', type: 'buy', weight: 150, price: 18755000},
                {time: '14:24:10', type: 'sell', weight: 50, price: 18745000},
                {time: '14:21:05', type: 'buy', weight: 300, price: 18750000},
                {time: '14:18:44', type: 'buy', weight: 100, price: 18740000}
            ],

            blogs: [
                {
                    date: '2026-05-24',
                    title: {
                        fa: 'تحلیل روند جهانی انس طلا در سه‌ماهه سوم ۲۰۲۶',
                        en: 'XAU/USD Global Trend Analysis Q3 2026'
                    }
                },
                {
                    date: '2026-05-20',
                    title: {
                        fa: 'تغییرات جدید قوانین ری‌گیری و استاندارد طلای آبشده',
                        en: 'New Assay Rules & Standards for Melted Gold'
                    }
                },
                {
                    date: '2026-05-15',
                    title: {
                        fa: 'چگونه حباب طلا را در معاملات محاسبه کنیم؟',
                        en: 'How to Calculate Gold Bubbles in Trading?'
                    }
                }
            ],

            init() {
                this.$watch('darkMode', val => {
                    localStorage.setItem('darkMode', val);
                    if (this.chart) this.chart.updateOptions({theme: {mode: val ? 'dark' : 'light'}});
                });
                this.$watch('lang', val => localStorage.setItem('lang', val));

                this.initChart();
                this.startTicker();
            },

            // ApexCharts Initialization
            initChart() {
                // Populate initial mock data
                let now = new Date().getTime();
                for (let i = 0; i < 30; i++) {
                    this.chartData.push([now - (30 - i) * 2000, 5015 + (Math.random() * 10 - 5)]);
                }

                let options = {
                    series: [{name: 'XAU/USD', data: this.chartData}],
                    chart: {
                        type: 'area',
                        height: 250,
                        animations: {enabled: true, easing: 'linear', dynamicAnimation: {speed: 1000}},
                        toolbar: {show: false},
                        zoom: {enabled: false},
                        background: 'transparent'
                    },
                    dataLabels: {enabled: false},
                    stroke: {curve: 'smooth', width: 2, colors: ['#f59e0b']},
                    fill: {
                        type: 'gradient',
                        gradient: {shadeIntensity: 1, opacityFrom: 0.4, opacityTo: 0.05, stops: [0, 90, 100]},
                        colors: ['#f59e0b']
                    },
                    xaxis: {
                        type: 'datetime',
                        range: 60000,
                        labels: {show: false},
                        axisBorder: {show: false},
                        axisTicks: {show: false}
                    },
                    yaxis: {
                        labels: {
                            style: {colors: '#71717a', fontFamily: 'inherit'}, formatter: (value) => {
                                return "$" + value.toFixed(1)
                            }
                        }
                    },
                    grid: {borderColor: 'rgba(161, 161, 170, 0.1)', strokeDashArray: 4},
                    theme: {mode: this.darkMode ? 'dark' : 'light'}
                };

                this.chart = new ApexCharts(document.querySelector("#gold-chart"), options);
                this.chart.render();
            },

            pushToast(message, type = 'success') {
                const id = Date.now();
                this.toasts.push({id, message, type});
                setTimeout(() => {
                    this.toasts = this.toasts.filter(t => t.id !== id);
                }, 3000);
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
                            time: String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0') + ':' + String(now.getSeconds()).padStart(2, '0'),
                            type: Math.random() > 0.5 ? 'buy' : 'sell',
                            weight: Math.floor(Math.random() * 200) + 50,
                            price: this.price
                        });
                        if (this.recentTrades.length > 4) this.recentTrades.pop();
                    }
                }, 1500);

                // XAUUSD Ticker & Chart Update
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

                    // Push to Chart
                    const now = new Date().getTime();
                    this.chartData.push([now, this.priceXau]);
                    if (this.chartData.length > 40) this.chartData.shift();
                    if (this.chart) this.chart.updateSeries([{data: this.chartData}]);

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
                    'nav_auth': {fa: 'ورود / ثبت‌نام', en: 'Login / Register'},
                    'alert_market_open': {
                        fa: 'بازار نقدی تهران باز است. معاملات بدون محدودیت.',
                        en: 'Tehran spot market is OPEN. Unrestricted trading.'
                    },
                    'hero_1': {fa: 'معاملات هوشمند', en: 'Smart Trades.'},
                    'hero_2': {fa: 'طلای آبشده', en: 'Melted Gold.'},
                    'hero_sub': {
                        fa: 'بستر یکپارچه و امن خرید و فروش طلای آبشده بین‌بنگاهی. معاف از اجرت ساخت با تسویه آنی.',
                        en: 'Secure B2B platform for trading melted gold. Zero fabrication fees with instant settlement.'
                    },
                    'btn_start': {fa: 'شروع معامله', en: 'Start Trading'},
                    'asset_melted': {fa: 'مظنه بازار (تومان)', en: 'Market Mazaneh (IRR)'},
                    'asset_xau': {fa: 'انس جهانی (XAU/USD)', en: 'Global Spot (XAU/USD)'},
                    'edu_title': {fa: 'چرا طلای آبشده؟', en: 'Why Melted Gold?'},
                    'edu_desc': {
                        fa: 'بدون اجرت ساخت و مالیات، بالاترین حاشیه سود و نقدشوندگی را برای سرمایه‌گذاران و بنکداران فراهم می‌کند.',
                        en: 'Offers the highest profit margins and liquidity due to the absence of fabrication fees and VAT.'
                    },
                    'chart_title': {fa: 'نمودار زنده انس جهانی (XAU/USD)', en: 'Live Global Spot Chart (XAU/USD)'},
                    'blog_title': {fa: 'تحلیل و مقالات بازار', en: 'Market News & Analysis'},
                    'btn_read': {fa: 'مطالعه', en: 'Read'},
                    'footer_about': {
                        fa: 'زیرساخت نرم‌افزاری اختصاصی برای تسهیل معاملات عمده طلای آبشده بین همکاران و صنف.',
                        en: 'Dedicated software infrastructure for wholesale melted gold transactions.'
                    },
                    'steps_title': {fa: 'مراحل ثبت سفارش تا تسویه', en: 'How it Works'},
                    'calc_title': {fa: 'ماشین حساب مظنه', en: 'Mazaneh Calculator'},
                    'calc_desc': {
                        fa: 'مظنه بازار را وارد کنید تا قیمت دقیق یک گرم طلای ۱۸ عیار محاسبه شود.',
                        en: 'Enter the Mazaneh to calculate the exact price of one gram of 18K gold.'
                    },
                    'calc_input1': {fa: 'مظنه (تومان)', en: 'Mazaneh (IRR)'},
                    'calc_result': {fa: 'قیمت هر گرم ۱۸ عیار:', en: 'Price per 18K Gram:'},
                    'calc_unit': {fa: 'تومان', en: 'IRR'},
                    'table_title': {fa: 'آخرین معاملات', en: 'Recent Trades'},
                    'th_time': {fa: 'زمان', en: 'Time'},
                    'th_type': {fa: 'نوع', en: 'Type'},
                    'th_weight': {fa: 'وزن', en: 'Weight'},
                    'th_price': {fa: 'قیمت مچینگ', en: 'Matched Price'},
                    'th_status': {fa: 'وضعیت', en: 'Status'},
                    'status_done': {fa: 'انجام شد', en: 'Executed'},
                    'btn_buy': {fa: 'خرید', en: 'Buy'},
                    'btn_sell': {fa: 'فروش', en: 'Sell'},
                    'faq_title': {fa: 'سوالات متداول', en: 'FAQ'},
                    'tab_login': {fa: 'ورود', en: 'Sign In'},
                    'tab_register': {fa: 'ثبت‌نام', en: 'Register'},
                    'form_name': {fa: 'نام کامل', en: 'Full Name'},
                    'form_phone': {fa: 'شماره موبایل', en: 'Phone Number'},
                    'form_pass': {fa: 'رمز عبور', en: 'Password'},
                    'trade_market': {fa: 'تابلو بازار', en: 'Market Depth'},
                    'trade_order': {fa: 'ثبت سفارش', en: 'Order Ticket'},
                    'form_weight': {fa: 'وزن (گرم)', en: 'Weight (g)'},
                    'trade_total': {fa: 'ارزش تقریبی:', en: 'Estimated Value:'},
                    'btn_execute_buy': {fa: 'تایید خرید', en: 'Confirm Buy'},
                    'btn_execute_sell': {fa: 'تایید فروش', en: 'Confirm Sell'},
                    'toast_login': {fa: 'وارد شدید.', en: 'Logged in.'},
                    'toast_reg': {fa: 'ثبت‌نام انجام شد.', en: 'Registered.'},
                    'toast_order_success': {fa: 'سفارش ثبت شد', en: 'Order submitted'}
                };
                return dict[key]?.[this.lang] || key;
            },

            steps: [
                {title: {fa: 'احراز هویت', en: 'KYC'}, desc: {fa: 'آپلود مدارک', en: 'Upload docs'}},
                {title: {fa: 'شارژ', en: 'Deposit'}, desc: {fa: 'واریز وجه', en: 'Fiat deposit'}},
                {title: {fa: 'سفارش', en: 'Order'}, desc: {fa: 'انتخاب وزن', en: 'Select weight'}},
                {title: {fa: 'تسویه', en: 'Clear'}, desc: {fa: 'تایید ری‌گیری', en: 'Assay confirm'}}
            ],

            faqs: [
                {
                    q: {fa: 'کد ری‌گیری چیست؟', en: 'What is an assay code?'},
                    a: {
                        fa: 'شماره‌ای است که توسط آزمایشگاه روی طلا حک می‌شود تا عیار دقیق (۷۵۰) تایید شود.',
                        en: 'A unique ID engraved by labs confirming exact purity.'
                    }
                },
                {
                    q: {fa: 'فرمول تبدیل مظنه چیست؟', en: 'Mazaneh formula?'},
                    a: {
                        fa: 'مظنه قیمت یک مثقال (۴.۶۰۸ گرم) طلای ۱۷ عیار (۷۰۵) است. تقسیم آن بر ۴.۳۳۱۸ قیمت یک گرم ۱۸ عیار را می‌دهد.',
                        en: 'Divide Mazaneh by 4.3318 to get the 18K gram price.'
                    }
                }
            ]
        }));
    });
</script>
</body>
</html>