# Laravel + Inertia.js

------

## 📄 Model: `app/Models/Order.php` (Same as before)

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'status'];
}
```

------

## 🎮 Controller: `app/Http/Controllers/OrderController.php`

```php
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
}
```

------

## 🧭 Routes: `routes/web.php`

```php
use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
```

------

## 🖼️ Root Layout: `resources/js/Layouts/AppLayout.jsx`

```jsx
import React from 'react';
import { Head } from '@inertiajs/react';

export default function AppLayout({ title, children }) {
    return (
        <div>
            <Head title={title} />
            <div style={{ padding: '20px', fontFamily: 'Arial, sans-serif' }}>
                {children}
            </div>
        </div>
    );
}
```

------

## 📄 Pages

### `resources/js/Pages/Orders/Index.jsx`

```jsx
import React, { useState, useEffect } from 'react';
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
        <AppLayout title="Orders">
            <div>
                <h1>Orders</h1>

                {message && (
                    <div style={{ 
                        color: 'green', 
                        margin: '10px 0',
                        padding: '10px',
                        border: '1px solid green',
                        borderRadius: '4px',
                        backgroundColor: '#f0fff0'
                    }}>
                        {message}
                    </div>
                )}

                <Link 
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
                >
                    New Order
                </Link>

                <ul style={{ listStyle: 'none', padding: 0 }}>
                    {orders.map(order => (
                        <li 
                            key={order.id}
                            style={{
                                padding: '10px',
                                borderBottom: '1px solid #eee',
                                backgroundColor: '#f9f9f9',
                                margin: '5px 0',
                                borderRadius: '4px'
                            }}
                        >
                            <strong>{order.name}</strong> ({order.status})
                        </li>
                    ))}
                </ul>

                {orders.length === 0 && (
                    <p style={{ fontStyle: 'italic', color: '#666' }}>
                        No orders found. <Link href="/orders/create">Create one!</Link>
                    </p>
                )}
            </div>
        </AppLayout>
    );
}
```

------

### `resources/js/Pages/Orders/Create.jsx`

```jsx
import React, { useState } from 'react';
import { Head, useForm } from '@inertiajs/react';
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
        <AppLayout title="Create Order">
            <div>
                <h1>Create Order</h1>

                <form onSubmit={submit} style={{ maxWidth: '400px' }}>
                    <div style={{ marginBottom: '15px' }}>
                        <label style={{ display: 'block', marginBottom: '5px', fontWeight: 'bold' }}>
                            Order Name
                        </label>
                        <input
                            type="text"
                            value={data.name}
                            onChange={(e) => setData('name', e.target.value)}
                            style={{
                                width: '100%',
                                padding: '10px',
                                border: '1px solid #ccc',
                                borderRadius: '4px',
                                fontSize: '16px'
                            }}
                            placeholder="Enter order name"
                        />
                        {errors.name && (
                            <div style={{ color: 'red', marginTop: '5px', fontSize: '14px' }}>
                                {errors.name}
                            </div>
                        )}
                    </div>

                    <div style={{ marginBottom: '15px' }}>
                        <button
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
                        >
                            {processing ? 'Creating...' : 'Create Order'}
                        </button>

                        <Link 
                            href="/orders"
                            style={{
                                padding: '10px 20px',
                                backgroundColor: '#6c757d',
                                color: 'white',
                                textDecoration: 'none',
                                borderRadius: '4px',
                                fontSize: '16px'
                            }}
                        >
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </AppLayout>
    );
}
```

------

## 🔧 Configuration Files

### `app.blade.php` (Root Template)

```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @viteReactRefresh
    @vite('resources/js/app.jsx')
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
```

------

### `resources/js/app.jsx`

```jsx
import './bootstrap';
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
        root.render(<App {...props} />);
    },
});
```

------

### `vite.config.js`

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
});
```

------

### `package.json`

```json
{
    "private": true,
    "scripts": {
        "dev": "vite",
        "build": "vite build"
    },
    "devDependencies": {
        "@vitejs/plugin-react": "^4.0.0",
        "laravel-vite-plugin": "^0.8.0",
        "vite": "^4.0.0"
    },
    "dependencies": {
        "@inertiajs/react": "^1.0.0",
        "react": "^18.2.0",
        "react-dom": "^18.2.0"
    }
}
```

------

## 🔄 Alternative with Vue.js

### `resources/js/Pages/Orders/Index.vue`

```vue
<template>
    <AppLayout title="Orders">
        <div>
            <h1>Orders</h1>

            <div v-if="$page.props.flash.message" class="success-message">
                {{ $page.props.flash.message }}
            </div>

            <Link href="/orders/create" class="btn btn-primary">
                New Order
            </Link>

            <ul class="orders-list">
                <li v-for="order in orders" :key="order.id" class="order-item">
                    <strong>{{ order.name }}</strong> ({{ order.status }})
                </li>
            </ul>

            <p v-if="orders.length === 0" class="no-orders">
                No orders found. <Link href="/orders/create">Create one!</Link>
            </p>
        </div>
    </AppLayout>
</template>

<script>
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
</script>

<style scoped>
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
</style>
```

------

💡**Key Benefits:**
- **Best of both worlds** - Server-side routing with SPA feel
- **No API needed** - Controllers return props, not JSON
- **SEO friendly** - Server-side rendering
- **Framework agnostic** - Works with React, Vue, Svelte
- **Laravel patterns** - Use familiar Laravel features (validation, middleware, etc.)

**Installation:**
```bash
composer require inertiajs/inertia-laravel
npm install @inertiajs/react react react-dom
php artisan inertia:middleware
```

**Perfect for:** Teams that want SPA experience but prefer Laravel's MVC patterns over API development