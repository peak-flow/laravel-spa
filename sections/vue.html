<div class="prose prose-lg max-w-none">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Laravel API + Vue.js</h2>
            <p class="text-gray-600 mt-2">🟢 <strong>Medium Complexity SPAs</strong> - Good balance of power vs complexity</p>
        </div>
        <div class="flex space-x-2">
            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">Component-Based</span>
            <span class="bg-orange-100 text-orange-800 text-sm font-medium px-3 py-1 rounded-full">Build Process</span>
            <span class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full">API + Frontend</span>
        </div>
    </div>

    <!-- Pros and Cons -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-green-50 rounded-lg p-6 border border-green-200">
            <h3 class="text-lg font-bold text-green-900 mb-4">✅ Pros</h3>
            <ul class="space-y-2 text-green-800">
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Mature, stable framework</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Great documentation</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Gradual adoption possible</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Good balance of power vs complexity</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Large ecosystem</span>
                </li>
            </ul>
        </div>

        <div class="bg-red-50 rounded-lg p-6 border border-red-200">
            <h3 class="text-lg font-bold text-red-900 mb-4">❌ Cons</h3>
            <ul class="space-y-2 text-red-800">
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Requires build process</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Learning curve</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Need to manage state</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>More complex than Alpine</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Perfect For -->
    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8">
        <div class="flex">
            <div class="ml-3">
                <h3 class="text-lg font-bold text-blue-900 mb-2">💡 Perfect For</h3>
                <p class="text-blue-800">Medium-complexity apps, teams familiar with Vue - Medium to large frontend applications with complex interactions</p>
            </div>
        </div>
    </div>

    <!-- CDN Version -->
    <div class="space-y-8">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🖼️ CDN Version (No Build Process): <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/views/orders/vue.blade.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="html">
                    <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Orders - Vue.js&lt;/title&gt;
    &lt;script src="https://unpkg.com/vue@3/dist/vue.global.js"&gt;&lt;/script&gt;
    &lt;meta name="csrf-token" content="{{ csrf_token() }}"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id="app"&gt;
        &lt;order-manager&gt;&lt;/order-manager&gt;
    &lt;/div&gt;

    &lt;script&gt;
        const { createApp } = Vue;

        const OrderManager = {
            template: `
                &lt;div&gt;
                    &lt;h1&gt;Orders&lt;/h1&gt;

                    &lt;!-- Success Message --&gt;
                    &lt;div v-if="message" style="color: green; margin: 10px 0;"&gt;
                        {{ message }}
                    &lt;/div&gt;

                    &lt;!-- Create Button --&gt;
                    &lt;button v-if="!showCreateForm" @click="showCreate"&gt;New Order&lt;/button&gt;

                    &lt;!-- Create Form --&gt;
                    &lt;div v-if="showCreateForm" style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;"&gt;
                        &lt;h2&gt;Create Order&lt;/h2&gt;
                        &lt;form @submit.prevent="createOrder"&gt;
                            &lt;input 
                                type="text" 
                                v-model="newOrderName" 
                                placeholder="Order name" 
                                required
                            &gt;
                            &lt;button type="submit" :disabled="loading"&gt;
                                {{ loading ? 'Creating...' : 'Create' }}
                            &lt;/button&gt;
                            &lt;button type="button" @click="hideCreate"&gt;Cancel&lt;/button&gt;
                        &lt;/form&gt;
                        &lt;div v-if="error" style="color: red;"&gt;{{ error }}&lt;/div&gt;
                    &lt;/div&gt;

                    &lt;!-- Loading --&gt;
                    &lt;div v-if="loading && orders.length === 0"&gt;Loading orders...&lt;/div&gt;

                    &lt;!-- Orders List --&gt;
                    &lt;ul&gt;
                        &lt;li v-for="order in orders" :key="order.id"&gt;
                            {{ order.name }} ({{ order.status }})
                        &lt;/li&gt;
                    &lt;/ul&gt;
                &lt;/div&gt;
            `,
            data() {
                return {
                    orders: [],
                    showCreateForm: false,
                    newOrderName: '',
                    loading: false,
                    message: '',
                    error: ''
                }
            },
            async mounted() {
                await this.loadOrders();
            },
            methods: {
                async loadOrders() {
                    this.loading = true;
                    try {
                        const response = await fetch('/api/orders');
                        this.orders = await response.json();
                    } catch (e) {
                        this.error = 'Failed to load orders';
                    }
                    this.loading = false;
                },

                showCreate() {
                    this.showCreateForm = true;
                    this.newOrderName = '';
                    this.error = '';
                    this.message = '';
                },

                hideCreate() {
                    this.showCreateForm = false;
                    this.newOrderName = '';
                    this.error = '';
                },

                async createOrder() {
                    if (!this.newOrderName.trim()) return;
                    
                    this.loading = true;
                    this.error = '';
                    
                    try {
                        const response = await fetch('/api/orders', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                name: this.newOrderName
                            })
                        });

                        if (response.ok) {
                            await this.loadOrders();
                            this.hideCreate();
                            this.message = 'Order created successfully!';
                            setTimeout(() => this.message = '', 3000);
                        } else {
                            const errorData = await response.json();
                            this.error = errorData.message || 'Failed to create order';
                        }
                    } catch (e) {
                        this.error = 'Network error occurred';
                    }
                    
                    this.loading = false;
                }
            }
        }

        createApp({
            components: {
                OrderManager
            }
        }).mount('#app');
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Build Process Setup -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">📦 Production Build: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">package.json</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="json">
                    <pre><code class="language-json">{
    "private": true,
    "scripts": {
        "dev": "vite",
        "build": "vite build"
    },
    "devDependencies": {
        "@vitejs/plugin-vue": "^4.0.0",
        "vite": "^4.0.0"
    },
    "dependencies": {
        "vue": "^3.2.0"
    }
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Vue Component -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🔧 Vue Component: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/components/OrderManager.vue</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="html">
                    <pre><code class="language-html">&lt;template&gt;
    &lt;div&gt;
        &lt;h1&gt;Orders&lt;/h1&gt;

        &lt;!-- Success Message --&gt;
        &lt;div v-if="message" class="success-message"&gt;
            {{ message }}
        &lt;/div&gt;

        &lt;!-- Create Button --&gt;
        &lt;button v-if="!showCreateForm" @click="showCreate" class="btn btn-primary"&gt;
            New Order
        &lt;/button&gt;

        &lt;!-- Create Form --&gt;
        &lt;div v-if="showCreateForm" class="create-form"&gt;
            &lt;h2&gt;Create Order&lt;/h2&gt;
            &lt;form @submit.prevent="createOrder"&gt;
                &lt;input 
                    type="text" 
                    v-model="newOrderName" 
                    placeholder="Order name" 
                    required
                    class="form-input"
                &gt;
                &lt;button type="submit" :disabled="loading" class="btn btn-success"&gt;
                    {{ loading ? 'Creating...' : 'Create' }}
                &lt;/button&gt;
                &lt;button type="button" @click="hideCreate" class="btn btn-secondary"&gt;
                    Cancel
                &lt;/button&gt;
            &lt;/form&gt;
            &lt;div v-if="error" class="error-message"&gt;{{ error }}&lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Loading --&gt;
        &lt;div v-if="loading && orders.length === 0" class="loading"&gt;
            Loading orders...
        &lt;/div&gt;

        &lt;!-- Orders List --&gt;
        &lt;ul class="orders-list"&gt;
            &lt;li v-for="order in orders" :key="order.id" class="order-item"&gt;
                {{ order.name }} ({{ order.status }})
            &lt;/li&gt;
        &lt;/ul&gt;
    &lt;/div&gt;
&lt;/template&gt;

&lt;script&gt;
export default {
    name: 'OrderManager',
    data() {
        return {
            orders: [],
            showCreateForm: false,
            newOrderName: '',
            loading: false,
            message: '',
            error: ''
        }
    },
    async mounted() {
        await this.loadOrders();
    },
    methods: {
        async loadOrders() {
            this.loading = true;
            try {
                const response = await fetch('/api/orders');
                this.orders = await response.json();
            } catch (e) {
                this.error = 'Failed to load orders';
            }
            this.loading = false;
        },

        showCreate() {
            this.showCreateForm = true;
            this.newOrderName = '';
            this.error = '';
            this.message = '';
        },

        hideCreate() {
            this.showCreateForm = false;
            this.newOrderName = '';
            this.error = '';
        },

        async createOrder() {
            if (!this.newOrderName.trim()) return;
            
            this.loading = true;
            this.error = '';
            
            try {
                const response = await fetch('/api/orders', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        name: this.newOrderName
                    })
                });

                if (response.ok) {
                    await this.loadOrders();
                    this.hideCreate();
                    this.message = 'Order created successfully!';
                    setTimeout(() => this.message = '', 3000);
                } else {
                    const errorData = await response.json();
                    this.error = errorData.message || 'Failed to create order';
                }
            } catch (e) {
                this.error = 'Network error occurred';
            }
            
            this.loading = false;
        }
    }
}
&lt;/script&gt;

&lt;style scoped&gt;
.success-message {
    color: green;
    margin: 10px 0;
}

.create-form {
    border: 1px solid #ccc;
    padding: 15px;
    margin: 10px 0;
}

.error-message {
    color: red;
}

.btn {
    padding: 8px 16px;
    margin: 5px;
    border: none;
    cursor: pointer;
}

.btn-primary { background: #007bff; color: white; }
.btn-success { background: #28a745; color: white; }
.btn-secondary { background: #6c757d; color: white; }

.form-input {
    padding: 8px;
    margin: 5px;
    border: 1px solid #ccc;
}

.orders-list {
    list-style: none;
    padding: 0;
}

.order-item {
    padding: 8px;
    border-bottom: 1px solid #eee;
}
&lt;/style&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Benefits -->
    <div class="bg-green-50 rounded-lg p-6 mt-8">
        <h3 class="text-lg font-bold text-green-900 mb-4">💡 Key Benefits</h3>
        <ul class="space-y-2 text-green-800">
            <li class="flex items-start">
                <span class="text-green-600 mr-2">•</span>
                <strong>Component-based</strong> - Reusable, maintainable components
            </li>
            <li class="flex items-start">
                <span class="text-green-600 mr-2">•</span>
                <strong>Reactive data binding</strong> - Automatic UI updates
            </li>
            <li class="flex items-start">
                <span class="text-green-600 mr-2">•</span>
                <strong>Rich ecosystem</strong> - Vue Router, Vuex, lots of plugins
            </li>
            <li class="flex items-start">
                <span class="text-green-600 mr-2">•</span>
                <strong>Great tooling</strong> - Vue DevTools, CLI, hot reload
            </li>
            <li class="flex items-start">
                <span class="text-green-600 mr-2">•</span>
                <strong>Template syntax</strong> - Clean, readable templates
            </li>
        </ul>
    </div>
</div>