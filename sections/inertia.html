<div class="prose prose-lg max-w-none">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Laravel + Inertia.js</h2>
            <p class="text-gray-600 mt-2">🚀 <strong>Best of Both Worlds</strong> - SPA feel with Laravel patterns</p>
        </div>
        <div class="flex space-x-2">
            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">SPA Feel</span>
            <span class="bg-orange-100 text-orange-800 text-sm font-medium px-3 py-1 rounded-full">Build Process</span>
            <span class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full">Laravel MVC</span>
        </div>
    </div>

    <!-- Pros and Cons -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-green-50 rounded-lg p-6 border border-green-200">
            <h3 class="text-lg font-bold text-green-900 mb-4">✅ Pros</h3>
            <ul class="space-y-2 text-green-800">
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Best of both worlds (Laravel MVC + SPA feel)</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>No API layer needed</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Use familiar Laravel patterns</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>SEO friendly</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Works with React, Vue, Svelte</span>
                </li>
            </ul>
        </div>

        <div class="bg-red-50 rounded-lg p-6 border border-red-200">
            <h3 class="text-lg font-bold text-red-900 mb-4">❌ Cons</h3>
            <ul class="space-y-2 text-red-800">
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Another abstraction to learn</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Requires build process</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Some limitations compared to pure SPA</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Perfect For -->
    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8">
        <div class="flex">
            <div class="ml-3">
                <h3 class="text-lg font-bold text-blue-900 mb-2">💡 Perfect For</h3>
                <p class="text-blue-800">Teams wanting SPA experience without leaving Laravel comfort zone - Teams that want SPA experience but prefer Laravel's MVC patterns over API development</p>
            </div>
        </div>
    </div>

    <!-- Code Examples -->
    <div class="space-y-8">
        <!-- Controller -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🎮 Controller: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">app/Http/Controllers/OrderController.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="php">
                    <pre><code class="language-php">&lt;?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    public function index()
    {
        return Inertia::render('Orders/Index', [
            'orders' => Order::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Orders/Create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        
        Order::create([
            'name' => $request->name,
            'status' => 'pending'
        ]);

        return redirect()->route('orders.index')
                        ->with('message', 'Order created successfully!');
    }
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Root Layout -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🖼️ Root Layout: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/Layouts/AppLayout.jsx</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="jsx">
                    <pre><code class="language-jsx">import React from 'react';
import { Head } from '@inertiajs/react';

export default function AppLayout({ title, children }) {
    return (
        &lt;div&gt;
            &lt;Head title={title} /&gt;
            &lt;div style={{ padding: '20px', fontFamily: 'Arial, sans-serif' }}&gt;
                {children}
            &lt;/div&gt;
        &lt;/div&gt;
    );
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Index Page -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">📄 Index Page: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/Pages/Orders/Index.jsx</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="jsx">
                    <pre><code class="language-jsx">import React, { useState, useEffect } from 'react';
import { Head, Link } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Index({ orders, flash }) {
    const [message, setMessage] = useState(flash?.message || '');

    useEffect(() => {
        if (message) {
            const timer = setTimeout(() => setMessage(''), 3000);
            return () => clearTimeout(timer);
        }
    }, [message]);

    return (
        &lt;AppLayout title="Orders"&gt;
            &lt;div&gt;
                &lt;h1&gt;Orders&lt;/h1&gt;

                {message && (
                    &lt;div style={{ 
                        color: 'green', 
                        margin: '10px 0',
                        padding: '10px',
                        border: '1px solid green',
                        borderRadius: '4px',
                        backgroundColor: '#f0fff0'
                    }}&gt;
                        {message}
                    &lt;/div&gt;
                )}

                &lt;Link 
                    href="/orders/create" 
                    style={{
                        display: 'inline-block',
                        padding: '10px 20px',
                        backgroundColor: '#007bff',
                        color: 'white',
                        textDecoration: 'none',
                        borderRadius: '4px',
                        margin: '10px 0'
                    }}
                &gt;
                    New Order
                &lt;/Link&gt;

                &lt;ul style={{ listStyle: 'none', padding: 0 }}&gt;
                    {orders.map(order =&gt; (
                        &lt;li 
                            key={order.id}
                            style={{
                                padding: '10px',
                                borderBottom: '1px solid #eee',
                                backgroundColor: '#f9f9f9',
                                margin: '5px 0',
                                borderRadius: '4px'
                            }}
                        &gt;
                            &lt;strong&gt;{order.name}&lt;/strong&gt; ({order.status})
                        &lt;/li&gt;
                    ))}
                &lt;/ul&gt;

                {orders.length === 0 && (
                    &lt;p style={{ fontStyle: 'italic', color: '#666' }}&gt;
                        No orders found. &lt;Link href="/orders/create"&gt;Create one!&lt;/Link&gt;
                    &lt;/p&gt;
                )}
            &lt;/div&gt;
        &lt;/AppLayout&gt;
    );
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Create Page -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">📄 Create Page: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/Pages/Orders/Create.jsx</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="jsx">
                    <pre><code class="language-jsx">import React from 'react';
import { Head, useForm, Link } from '@inertiajs/react';
import AppLayout from '../../Layouts/AppLayout';

export default function Create() {
    const { data, setData, post, processing, errors } = useForm({
        name: ''
    });

    const submit = (e) => {
        e.preventDefault();
        post('/orders');
    };

    return (
        &lt;AppLayout title="Create Order"&gt;
            &lt;div&gt;
                &lt;h1&gt;Create Order&lt;/h1&gt;

                &lt;form onSubmit={submit} style={{ maxWidth: '400px' }}&gt;
                    &lt;div style={{ marginBottom: '15px' }}&gt;
                        &lt;label style={{ display: 'block', marginBottom: '5px', fontWeight: 'bold' }}&gt;
                            Order Name
                        &lt;/label&gt;
                        &lt;input
                            type="text"
                            value={data.name}
                            onChange={(e) =&gt; setData('name', e.target.value)}
                            style={{
                                width: '100%',
                                padding: '10px',
                                border: '1px solid #ccc',
                                borderRadius: '4px',
                                fontSize: '16px'
                            }}
                            placeholder="Enter order name"
                        /&gt;
                        {errors.name && (
                            &lt;div style={{ color: 'red', marginTop: '5px', fontSize: '14px' }}&gt;
                                {errors.name}
                            &lt;/div&gt;
                        )}
                    &lt;/div&gt;

                    &lt;div style={{ marginBottom: '15px' }}&gt;
                        &lt;button
                            type="submit"
                            disabled={processing}
                            style={{
                                padding: '10px 20px',
                                backgroundColor: processing ? '#ccc' : '#28a745',
                                color: 'white',
                                border: 'none',
                                borderRadius: '4px',
                                fontSize: '16px',
                                cursor: processing ? 'not-allowed' : 'pointer',
                                marginRight: '10px'
                            }}
                        &gt;
                            {processing ? 'Creating...' : 'Create Order'}
                        &lt;/button&gt;

                        &lt;Link 
                            href="/orders"
                            style={{
                                padding: '10px 20px',
                                backgroundColor: '#6c757d',
                                color: 'white',
                                textDecoration: 'none',
                                borderRadius: '4px',
                                fontSize: '16px'
                            }}
                        &gt;
                            Cancel
                        &lt;/Link&gt;
                    &lt;/div&gt;
                &lt;/form&gt;
            &lt;/div&gt;
        &lt;/AppLayout&gt;
    );
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Configuration -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🔧 App Entry: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/app.jsx</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="jsx">
                    <pre><code class="language-jsx">import './bootstrap';
import { createInertiaApp } from '@inertiajs/react';
import { createRoot } from 'react-dom/client';

createInertiaApp({
    title: title => title ? `${title} - My App` : 'My App',
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true });
        return pages[`./Pages/${name}.jsx`];
    },
    setup({ el, App, props }) {
        const root = createRoot(el);
        root.render(&lt;App {...props} /&gt;);
    },
});</code></pre>
                </div>
            </div>
        </div>

        <!-- Vue Alternative -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🟢 Vue Alternative: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/Pages/Orders/Index.vue</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="html">
                    <pre><code class="language-html">&lt;template&gt;
    &lt;AppLayout title="Orders"&gt;
        &lt;div&gt;
            &lt;h1&gt;Orders&lt;/h1&gt;

            &lt;div v-if="$page.props.flash.message" class="success-message"&gt;
                {{ $page.props.flash.message }}
            &lt;/div&gt;

            &lt;Link href="/orders/create" class="btn btn-primary"&gt;
                New Order
            &lt;/Link&gt;

            &lt;ul class="orders-list"&gt;
                &lt;li v-for="order in orders" :key="order.id" class="order-item"&gt;
                    &lt;strong&gt;{{ order.name }}&lt;/strong&gt; ({{ order.status }})
                &lt;/li&gt;
            &lt;/ul&gt;

            &lt;p v-if="orders.length === 0" class="no-orders"&gt;
                No orders found. &lt;Link href="/orders/create"&gt;Create one!&lt;/Link&gt;
            &lt;/p&gt;
        &lt;/div&gt;
    &lt;/AppLayout&gt;
&lt;/template&gt;

&lt;script&gt;
import { Link } from '@inertiajs/vue3';
import AppLayout from '../../Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout,
        Link
    },
    props: {
        orders: Array
    }
}
&lt;/script&gt;

&lt;style scoped&gt;
.success-message {
    color: green;
    margin: 10px 0;
    padding: 10px;
    border: 1px solid green;
    border-radius: 4px;
    background-color: #f0fff0;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 4px;
    margin: 10px 0;
}

.btn-primary {
    background-color: #007bff;
    color: white;
}

.orders-list {
    list-style: none;
    padding: 0;
}

.order-item {
    padding: 10px;
    border-bottom: 1px solid #eee;
    background-color: #f9f9f9;
    margin: 5px 0;
    border-radius: 4px;
}

.no-orders {
    font-style: italic;
    color: #666;
}
&lt;/style&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Benefits -->
    <div class="bg-purple-50 rounded-lg p-6 mt-8">
        <h3 class="text-lg font-bold text-purple-900 mb-4">💡 Key Benefits</h3>
        <ul class="space-y-2 text-purple-800">
            <li class="flex items-start">
                <span class="text-purple-600 mr-2">•</span>
                <strong>Best of both worlds</strong> - Server-side routing with SPA feel
            </li>
            <li class="flex items-start">
                <span class="text-purple-600 mr-2">•</span>
                <strong>No API needed</strong> - Controllers return props, not JSON
            </li>
            <li class="flex items-start">
                <span class="text-purple-600 mr-2">•</span>
                <strong>SEO friendly</strong> - Server-side rendering
            </li>
            <li class="flex items-start">
                <span class="text-purple-600 mr-2">•</span>
                <strong>Framework agnostic</strong> - Works with React, Vue, Svelte
            </li>
            <li class="flex items-start">
                <span class="text-purple-600 mr-2">•</span>
                <strong>Laravel patterns</strong> - Use familiar Laravel features (validation, middleware, etc.)
            </li>
        </ul>
    </div>

    <!-- Installation -->
    <div class="bg-gray-50 rounded-lg p-6 mt-8">
        <h3 class="text-lg font-bold text-gray-900 mb-4">🔧 Installation</h3>
        <div class="code-block" data-language="bash">
            <pre><code class="language-bash">composer require inertiajs/inertia-laravel
npm install @inertiajs/react react react-dom
php artisan inertia:middleware</code></pre>
        </div>
    </div>
</div>