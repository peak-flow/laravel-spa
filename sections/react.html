<div class="prose prose-lg max-w-none">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Laravel API + React</h2>
            <p class="text-gray-600 mt-2">⚛️ <strong>Complex SPAs & Large Teams</strong> - Industry standard with huge ecosystem</p>
        </div>
        <div class="flex space-x-2">
            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">Component-Based</span>
            <span class="bg-orange-100 text-orange-800 text-sm font-medium px-3 py-1 rounded-full">Build Process</span>
            <span class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full">TypeScript Ready</span>
        </div>
    </div>

    <!-- Pros and Cons -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-green-50 rounded-lg p-6 border border-green-200">
            <h3 class="text-lg font-bold text-green-900 mb-4">✅ Pros</h3>
            <ul class="space-y-2 text-green-800">
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Huge ecosystem</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Industry standard</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Excellent tooling</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Great for complex UIs</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>TypeScript support</span>
                </li>
            </ul>
        </div>

        <div class="bg-red-50 rounded-lg p-6 border border-red-200">
            <h3 class="text-lg font-bold text-red-900 mb-4">❌ Cons</h3>
            <ul class="space-y-2 text-red-800">
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Steeper learning curve</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Requires build process</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Can be overkill for simple apps</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>More boilerplate code</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Perfect For -->
    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8">
        <div class="flex">
            <div class="ml-3">
                <h3 class="text-lg font-bold text-blue-900 mb-2">💡 Perfect For</h3>
                <p class="text-blue-800">Large, complex applications with rich interactions and teams with React experience - Complex applications, teams with React experience</p>
            </div>
        </div>
    </div>

    <!-- Code Examples -->
    <div class="space-y-8">
        <!-- CDN Version -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🖼️ CDN Version (No Build Process): <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/views/orders/react.blade.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="html">
                    <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Orders - React&lt;/title&gt;
    &lt;meta name="csrf-token" content="{{ csrf_token() }}"&gt;
    &lt;script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"&gt;&lt;/script&gt;
    &lt;script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"&gt;&lt;/script&gt;
    &lt;script src="https://unpkg.com/@babel/standalone/babel.min.js"&gt;&lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div id="root"&gt;&lt;/div&gt;

    &lt;script type="text/babel"&gt;
        const { useState, useEffect } = React;

        // Custom hook for API calls
        const useOrders = () =&gt; {
            const [orders, setOrders] = useState([]);
            const [loading, setLoading] = useState(false);
            const [error, setError] = useState('');

            const loadOrders = async () =&gt; {
                setLoading(true);
                setError('');
                try {
                    const response = await fetch('/api/orders');
                    if (!response.ok) throw new Error('Failed to load orders');
                    const data = await response.json();
                    setOrders(data);
                } catch (e) {
                    setError(e.message);
                } finally {
                    setLoading(false);
                }
            };

            const createOrder = async (name) =&gt; {
                setLoading(true);
                setError('');
                try {
                    const response = await fetch('/api/orders', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({ name })
                    });

                    if (!response.ok) {
                        const errorData = await response.json();
                        throw new Error(errorData.message || 'Failed to create order');
                    }

                    await loadOrders(); // Reload orders
                    return true;
                } catch (e) {
                    setError(e.message);
                    return false;
                } finally {
                    setLoading(false);
                }
            };

            return { orders, loading, error, loadOrders, createOrder };
        };

        // Order Form Component
        const OrderForm = ({ onSubmit, onCancel, loading }) =&gt; {
            const [name, setName] = useState('');
            const [localError, setLocalError] = useState('');

            const handleSubmit = async (e) =&gt; {
                e.preventDefault();
                if (!name.trim()) {
                    setLocalError('Order name is required');
                    return;
                }

                setLocalError('');
                const success = await onSubmit(name);
                if (success) {
                    setName('');
                }
            };

            return (
                &lt;div style={{ border: '1px solid #ccc', padding: '15px', margin: '10px 0' }}&gt;
                    &lt;h2&gt;Create Order&lt;/h2&gt;
                    &lt;form onSubmit={handleSubmit}&gt;
                        &lt;input
                            type="text"
                            value={name}
                            onChange={(e) =&gt; setName(e.target.value)}
                            placeholder="Order name"
                            disabled={loading}
                            style={{ padding: '8px', margin: '5px' }}
                        /&gt;
                        &lt;button 
                            type="submit" 
                            disabled={loading || !name.trim()}
                            style={{ padding: '8px 16px', margin: '5px' }}
                        &gt;
                            {loading ? 'Creating...' : 'Create'}
                        &lt;/button&gt;
                        &lt;button 
                            type="button" 
                            onClick={onCancel}
                            disabled={loading}
                            style={{ padding: '8px 16px', margin: '5px' }}
                        &gt;
                            Cancel
                        &lt;/button&gt;
                    &lt;/form&gt;
                    {localError && (
                        &lt;div style={{ color: 'red', margin: '5px 0' }}&gt;
                            {localError}
                        &lt;/div&gt;
                    )}
                &lt;/div&gt;
            );
        };

        // Order List Component
        const OrderList = ({ orders, loading }) =&gt; {
            if (loading && orders.length === 0) {
                return &lt;div&gt;Loading orders...&lt;/div&gt;;
            }

            return (
                &lt;ul style={{ listStyle: 'none', padding: 0 }}&gt;
                    {orders.map(order =&gt; (
                        &lt;li 
                            key={order.id}
                            style={{ 
                                padding: '8px',
                                borderBottom: '1px solid #eee'
                            }}
                        &gt;
                            {order.name} ({order.status})
                        &lt;/li&gt;
                    ))}
                &lt;/ul&gt;
            );
        };

        // Main App Component
        const OrderManager = () =&gt; {
            const [showCreateForm, setShowCreateForm] = useState(false);
            const [message, setMessage] = useState('');
            const { orders, loading, error, loadOrders, createOrder } = useOrders();

            useEffect(() =&gt; {
                loadOrders();
            }, []);

            const handleCreateOrder = async (name) =&gt; {
                const success = await createOrder(name);
                if (success) {
                    setShowCreateForm(false);
                    setMessage('Order created successfully!');
                    setTimeout(() =&gt; setMessage(''), 3000);
                }
                return success;
            };

            return (
                &lt;div&gt;
                    &lt;h1&gt;Orders&lt;/h1&gt;

                    {/* Success Message */}
                    {message && (
                        &lt;div style={{ color: 'green', margin: '10px 0' }}&gt;
                            {message}
                        &lt;/div&gt;
                    )}

                    {/* Error Message */}
                    {error && (
                        &lt;div style={{ color: 'red', margin: '10px 0' }}&gt;
                            {error}
                        &lt;/div&gt;
                    )}

                    {/* Create Button */}
                    {!showCreateForm && (
                        &lt;button 
                            onClick={() =&gt; setShowCreateForm(true)}
                            disabled={loading}
                            style={{ padding: '8px 16px', margin: '10px 0' }}
                        &gt;
                            New Order
                        &lt;/button&gt;
                    )}

                    {/* Create Form */}
                    {showCreateForm && (
                        &lt;OrderForm
                            onSubmit={handleCreateOrder}
                            onCancel={() =&gt; setShowCreateForm(false)}
                            loading={loading}
                        /&gt;
                    )}

                    {/* Orders List */}
                    &lt;OrderList orders={orders} loading={loading} /&gt;
                &lt;/div&gt;
            );
        };

        // Render the app
        ReactDOM.render(&lt;OrderManager /&gt;, document.getElementById('root'));
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Production Build -->
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
        "@vitejs/plugin-react": "^4.0.3",
        "vite": "^4.0.0"
    },
    "dependencies": {
        "react": "^18.2.0",
        "react-dom": "^18.2.0"
    }
}</code></pre>
                </div>
            </div>
        </div>

        <!-- React Component -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🔧 React Component: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/components/OrderManager.jsx</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="jsx">
                    <pre><code class="language-jsx">import React, { useState, useEffect } from 'react';
import OrderForm from './OrderForm';
import OrderList from './OrderList';
import { useOrders } from '../hooks/useOrders';

const OrderManager = () => {
    const [showCreateForm, setShowCreateForm] = useState(false);
    const [message, setMessage] = useState('');
    const { orders, loading, error, loadOrders, createOrder } = useOrders();

    useEffect(() => {
        loadOrders();
    }, []);

    const handleCreateOrder = async (name) => {
        const success = await createOrder(name);
        if (success) {
            setShowCreateForm(false);
            setMessage('Order created successfully!');
            setTimeout(() => setMessage(''), 3000);
        }
        return success;
    };

    return (
        &lt;div className="order-manager"&gt;
            &lt;h1&gt;Orders&lt;/h1&gt;

            {message && (
                &lt;div className="success-message"&gt;{message}&lt;/div&gt;
            )}

            {error && (
                &lt;div className="error-message"&gt;{error}&lt;/div&gt;
            )}

            {!showCreateForm && (
                &lt;button 
                    onClick={() =&gt; setShowCreateForm(true)}
                    disabled={loading}
                    className="btn btn-primary"
                &gt;
                    New Order
                &lt;/button&gt;
            )}

            {showCreateForm && (
                &lt;OrderForm
                    onSubmit={handleCreateOrder}
                    onCancel={() =&gt; setShowCreateForm(false)}
                    loading={loading}
                /&gt;
            )}

            &lt;OrderList orders={orders} loading={loading} /&gt;
        &lt;/div&gt;
    );
};

export default OrderManager;</code></pre>
                </div>
            </div>
        </div>

        <!-- Custom Hook -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🪝 Custom Hook: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/js/hooks/useOrders.js</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="javascript">
                    <pre><code class="language-javascript">import { useState } from 'react';

export const useOrders = () => {
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState('');

    const loadOrders = async () => {
        setLoading(true);
        setError('');
        try {
            const response = await fetch('/api/orders');
            if (!response.ok) throw new Error('Failed to load orders');
            const data = await response.json();
            setOrders(data);
        } catch (e) {
            setError(e.message);
        } finally {
            setLoading(false);
        }
    };

    const createOrder = async (name) => {
        setLoading(true);
        setError('');
        try {
            const response = await fetch('/api/orders', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ name })
            });

            if (!response.ok) {
                const errorData = await response.json();
                throw new Error(errorData.message || 'Failed to create order');
            }

            await loadOrders();
            return true;
        } catch (e) {
            setError(e.message);
            return false;
        } finally {
            setLoading(false);
        }
    };

    return { orders, loading, error, loadOrders, createOrder };
};</code></pre>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Benefits -->
    <div class="bg-blue-50 rounded-lg p-6 mt-8">
        <h3 class="text-lg font-bold text-blue-900 mb-4">💡 Key Benefits</h3>
        <ul class="space-y-2 text-blue-800">
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>Component ecosystem</strong> - Huge library of reusable components
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>Strong typing</strong> - Works great with TypeScript
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>Developer experience</strong> - Excellent debugging tools
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>Performance</strong> - Virtual DOM, efficient updates
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>Industry standard</strong> - Large community, lots of jobs
            </li>
        </ul>
    </div>
</div>