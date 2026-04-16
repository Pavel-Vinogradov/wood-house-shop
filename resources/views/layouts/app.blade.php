<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wood House Shop - Wooden Houses and Saunas')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="description" content="@yield('description', 'Quality wooden houses and saunas for your perfect home')">
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center space-x-2">
                        <svg class="w-8 h-8 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                        </svg>
                        <span class="text-xl font-bold text-gray-900">Wood House Shop</span>
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-amber-600 transition-colors">Главная</a>
                    <a href="/catalog" class="text-gray-700 hover:text-amber-600 transition-colors">Каталог</a>
                    <a href="/blog" class="text-gray-700 hover:text-amber-600 transition-colors">Блог</a>
                    <a href="/contact" class="text-gray-700 hover:text-amber-600 transition-colors">Контакты</a>
                </nav>

                <!-- Cart Button -->
                <div class="flex items-center space-x-4">
                    <a href="/cart" class="relative p-2 text-gray-700 hover:text-amber-600 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="absolute -top-1 -right-1 bg-amber-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $cartCount ?? 0 }}</span>
                    </a>
                    
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2" onclick="toggleMobileMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden pb-4">
                <a href="/" class="block py-2 text-gray-700 hover:text-amber-600 transition-colors">Главная</a>
                <a href="/catalog" class="block py-2 text-gray-700 hover:text-amber-600 transition-colors">Каталог</a>
                <a href="/blog" class="block py-2 text-gray-700 hover:text-amber-600 transition-colors">Блог</a>
                <a href="/contact" class="block py-2 text-gray-700 hover:text-amber-600 transition-colors">Контакты</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="w-8 h-8 text-amber-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"/>
                        </svg>
                        <span class="text-xl font-bold">Wood House Shop</span>
                    </div>
                    <p class="text-gray-400">Quality wooden houses and saunas for your perfect home.</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-amber-500 transition-colors">Home</a></li>
                        <li><a href="/catalog" class="text-gray-400 hover:text-amber-500 transition-colors">Catalog</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-amber-500 transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Categories</h3>
                    <ul class="space-y-2">
                        <li><a href="/catalog?category=houses" class="text-gray-400 hover:text-amber-500 transition-colors">Wooden Houses</a></li>
                        <li><a href="/catalog?category=saunas" class="text-gray-400 hover:text-amber-500 transition-colors">Saunas</a></li>
                        <li><a href="/catalog?category=accessories" class="text-gray-400 hover:text-amber-500 transition-colors">Accessories</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <span>+7 (999) 123-45-67</span>
                        </li>
                        <li class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <span>info@woodhouseshop.ru</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025, «Название компании»</p>
                <div class="flex justify-center space-x-6 mt-4">
                    <a href="#" class="hover:text-amber-500 transition-colors">Политика конфиденциальности</a>
                    <a href="#" class="hover:text-amber-500 transition-colors">Реквизиты</a>
                </div>
                <p class="mt-4 text-sm">Разработано в Ветка ІТ</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
