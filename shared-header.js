// Shared header component for all tutorial pages
function createSharedHeader(currentPage = '') {
    const navigationItems = [
        {
            name: 'Laravel Frontend Guide',
            href: 'index.html',
            id: 'frontend-guide',
            description: 'Compare Laravel frontend options'
        },
        {
            name: 'Component Tutorial',
            href: 'component-tutorial.html',
            id: 'components',
            description: 'Learn components in React, Vue, Alpine, HTMX, Livewire'
        },
        {
            name: 'Bootstrap to Tailwind',
            href: 'bootstrap-to-tailwind-tutorial.html',
            id: 'bootstrap-tailwind',
            description: 'Migrate from Bootstrap to Tailwind CSS'
        },
        {
            name: 'JavaScript Includes',
            href: 'javascript-includes-tutorial.html',
            id: 'js-includes',
            description: 'Dynamic content loading techniques'
        }
    ];

    return `
        <!-- Shared Navigation Header -->
        <nav class="bg-white shadow-lg border-b-2 border-blue-500">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <!-- Logo/Brand -->
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-white font-bold text-lg">LT</span>
                                </div>
                                <div>
                                    <h1 class="text-xl font-bold text-gray-900">Laravel Tutorials</h1>
                                    <p class="text-xs text-gray-600">Frontend Development Guides</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            ${navigationItems.map(item => `
                                <a href="${item.href}" 
                                   class="group relative px-3 py-2 rounded-md text-sm font-medium transition-all duration-200 ${
                                       currentPage === item.id 
                                           ? 'bg-blue-100 text-blue-700 shadow-sm' 
                                           : 'text-gray-600 hover:text-blue-600 hover:bg-gray-50'
                                   }"
                                   title="${item.description}">
                                    ${item.name}
                                    ${currentPage === item.id ? `
                                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 rounded-full"></span>
                                    ` : ''}
                                </a>
                            `).join('')}
                        </div>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button x-data @click="$dispatch('toggle-mobile-menu')" 
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-blue-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                                aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Navigation Menu -->
                <div x-data="{ mobileMenuOpen: false }" 
                     @toggle-mobile-menu.window="mobileMenuOpen = !mobileMenuOpen"
                     x-show="mobileMenuOpen" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="md:hidden">
                    <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 border-t border-gray-200">
                        ${navigationItems.map(item => `
                            <a href="${item.href}" 
                               class="block px-3 py-2 rounded-md text-base font-medium transition-colors ${
                                   currentPage === item.id 
                                       ? 'bg-blue-100 text-blue-700' 
                                       : 'text-gray-600 hover:text-blue-600 hover:bg-gray-50'
                               }">
                                <div class="flex flex-col">
                                    <span>${item.name}</span>
                                    <span class="text-xs text-gray-500 mt-1">${item.description}</span>
                                </div>
                            </a>
                        `).join('')}
                    </div>
                </div>
            </div>
        </nav>

        <!-- Breadcrumb -->
        <div class="bg-gray-50 border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
                <div class="flex items-center space-x-2 text-sm">
                    <a href="index.html" class="text-blue-600 hover:text-blue-800">Home</a>
                    ${currentPage && currentPage !== 'frontend-guide' ? `
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="text-gray-700">${navigationItems.find(item => item.id === currentPage)?.name || 'Current Page'}</span>
                    ` : ''}
                </div>
            </div>
        </div>
    `;
}

// Function to inject the header into pages
function injectSharedHeader(currentPage = '') {
    document.addEventListener('DOMContentLoaded', function() {
        const headerContainer = document.getElementById('shared-header');
        if (headerContainer) {
            headerContainer.innerHTML = createSharedHeader(currentPage);
        }
    });
}

// Export for use in pages
window.createSharedHeader = createSharedHeader;
window.injectSharedHeader = injectSharedHeader;