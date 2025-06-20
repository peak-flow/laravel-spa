<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Frontend Options - Team Guide</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Highlight.js for syntax highlighting -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/github-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <style>
        /* Custom styles for better readability */
        .prose {
            max-width: none;
        }

        .comparison-table td {
            vertical-align: top;
        }

        .star-rating {
            color: #fbbf24;
        }

        pre {
            border-radius: 8px;
            padding: 1rem;
            overflow-x: auto;
            margin: 1rem 0;
        }
        
        code {
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', monospace;
        }
    </style>
</head>
<body class="bg-gray-50">
<div x-data="frontendGuide()" class="min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Laravel Frontend Options</h1>
                    <p class="text-gray-600 mt-1">Team Discussion Guide</p>
                </div>
                <div class="flex space-x-4">
                    <button @click="showComparison = !showComparison"
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <span x-text="showComparison ? 'Hide Comparison' : 'Show Comparison'"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white border-b sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-8 overflow-x-auto py-4">
                <template x-for="option in options" :key="option.id">
                    <button @click="activeOption = option.id"
                            :class="activeOption === option.id ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700'"
                            class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm transition-colors"
                            x-text="option.name">
                    </button>
                </template>
            </div>
        </div>
    </nav>

    <!-- Comparison Table (collapsible) -->
    <div x-show="showComparison" x-transition class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <?php include 'sections/comparison.php'; ?>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Overview Section -->
        <div x-show="activeOption === 'overview'" x-transition>
            <?php include 'sections/overview.php'; ?>
        </div>

        <!-- Laravel Blade -->
        <div x-show="activeOption === 'blade'" x-transition>
            <?php include 'sections/blade.php'; ?>
        </div>

        <!-- Laravel Livewire -->
        <div x-show="activeOption === 'livewire'" x-transition>
            <?php include 'sections/livewire.php'; ?>
        </div>

        <!-- Laravel + Alpine.js -->
        <div x-show="activeOption === 'alpine'" x-transition>
            <?php include 'sections/alpine.php'; ?>
        </div>

        <!-- Laravel + HTMX -->
        <div x-show="activeOption === 'htmx'" x-transition>
            <?php include 'sections/htmx.php'; ?>
        </div>

        <!-- Laravel + Vue.js -->
        <div x-show="activeOption === 'vue'" x-transition>
            <?php include 'sections/vue.php'; ?>
        </div>

        <!-- Laravel + React -->
        <div x-show="activeOption === 'react'" x-transition>
            <?php include 'sections/react.php'; ?>
        </div>

        <!-- Laravel + Inertia.js -->
        <div x-show="activeOption === 'inertia'" x-transition>
            <?php include 'sections/inertia.php'; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <p class="text-center text-gray-500 text-sm">
                Laravel Frontend Options Guide - Generated for Team Discussion
            </p>
        </div>
    </footer>
</div>

<script>
    function frontendGuide() {
        return {
            activeOption: 'overview',
            showComparison: true,
            options: [
                {id: 'overview', name: 'Overview'},
                {id: 'blade', name: 'Blade MVC'},
                {id: 'livewire', name: 'Livewire'},
                {id: 'alpine', name: 'API + Alpine'},
                {id: 'htmx', name: 'API + HTMX'},
                {id: 'vue', name: 'API + Vue'},
                {id: 'react', name: 'API + React'},
                {id: 'inertia', name: 'Inertia.js'}
            ]
        }
    }

    // Re-run highlight.js when content changes
    document.addEventListener('alpine:init', () => {
        Alpine.effect(() => {
            // Small delay to ensure DOM is updated
            setTimeout(() => {
                hljs.highlightAll();
            }, 50);
        });
    });
    
    // Initial highlight
    document.addEventListener('DOMContentLoaded', function() {
        hljs.highlightAll();
    });
</script>
</body>
</html>
