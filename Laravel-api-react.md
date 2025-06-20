# Laravel API + React

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

## 🎮 API Controller: `app/Http/Controllers/Api/OrderController.php` (Same as Alpine/Vue)

```php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->json(Order::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        
        $order = Order::create([
            'name' => $request->name,
            'status' => 'pending'
        ]);
        
        return response()->json($order, 201);
    }
}
```

------

## 🧭 Routes

### `routes/api.php` (Same as Alpine/Vue)

```php
use App\Http\Controllers\Api\OrderController;

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
});
```

### `routes/web.php`

```php
Route::get('/orders', function () {
    return view('orders.react');
})->name('orders.index');
```

------

## 🖼️ View: `resources/views/orders/react.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Orders - React</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
</head>
<body>
    <div id="root"></div>

    <script type="text/babel">
        const { useState, useEffect } = React;

        // Custom hook for API calls
        const useOrders = () => {
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
        const OrderForm = ({ onSubmit, onCancel, loading }) => {
            const [name, setName] = useState('');
            const [localError, setLocalError] = useState('');

            const handleSubmit = async (e) => {
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
                <div style={{ border: '1px solid #ccc', padding: '15px', margin: '10px 0' }}>
                    <h2>Create Order</h2>
                    <form onSubmit={handleSubmit}>
                        <input
                            type="text"
                            value={name}
                            onChange={(e) => setName(e.target.value)}
                            placeholder="Order name"
                            disabled={loading}
                            style={{ padding: '8px', margin: '5px' }}
                        />
                        <button 
                            type="submit" 
                            disabled={loading || !name.trim()}
                            style={{ padding: '8px 16px', margin: '5px' }}
                        >
                            {loading ? 'Creating...' : 'Create'}
                        </button>
                        <button 
                            type="button" 
                            onClick={onCancel}
                            disabled={loading}
                            style={{ padding: '8px 16px', margin: '5px' }}
                        >
                            Cancel
                        </button>
                    </form>
                    {localError && (
                        <div style={{ color: 'red', margin: '5px 0' }}>
                            {localError}
                        </div>
                    )}
                </div>
            );
        };

        // Order List Component
        const OrderList = ({ orders, loading }) => {
            if (loading && orders.length === 0) {
                return <div>Loading orders...</div>;
            }

            return (
                <ul style={{ listStyle: 'none', padding: 0 }}>
                    {orders.map(order => (
                        <li 
                            key={order.id}
                            style={{ 
                                padding: '8px',
                                borderBottom: '1px solid #eee'
                            }}
                        >
                            {order.name} ({order.status})
                        </li>
                    ))}
                </ul>
            );
        };

        // Main App Component
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

            const handleShowCreate = () => {
                setShowCreateForm(true);
                setMessage('');
            };

            const handleHideCreate = () => {
                setShowCreateForm(false);
            };

            return (
                <div>
                    <h1>Orders</h1>

                    {/* Success Message */}
                    {message && (
                        <div style={{ color: 'green', margin: '10px 0' }}>
                            {message}
                        </div>
                    )}

                    {/* Error Message */}
                    {error && (
                        <div style={{ color: 'red', margin: '10px 0' }}>
                            {error}
                        </div>
                    )}

                    {/* Create Button */}
                    {!showCreateForm && (
                        <button 
                            onClick={handleShowCreate}
                            disabled={loading}
                            style={{ padding: '8px 16px', margin: '10px 0' }}
                        >
                            New Order
                        </button>
                    )}

                    {/* Create Form */}
                    {showCreateForm && (
                        <OrderForm
                            onSubmit={handleCreateOrder}
                            onCancel={handleHideCreate}
                            loading={loading}
                        />
                    )}

                    {/* Orders List */}
                    <OrderList orders={orders} loading={loading} />
                </div>
            );
        };

        // Render the app
        ReactDOM.render(<OrderManager />, document.getElementById('root'));
    </script>
</body>
</html>
```

------

## 📦 Production Build Setup

### `package.json`

```json
{
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
}
```

------

### `vite.config.js`

```js
import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [react()],
    build: {
        outDir: 'public/dist',
        manifest: true,
        rollupOptions: {
            input: 'resources/js/app.jsx'
        }
    }
});
```

------

### `resources/js/app.jsx`

```jsx
import React from 'react';
import ReactDOM from 'react-dom/client';
import OrderManager from './components/OrderManager';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<OrderManager />);
```

------

### `resources/js/components/OrderManager.jsx`

```jsx
import React, { useState, useEffect } from 'react';
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
        <div className="order-manager">
            <h1>Orders</h1>

            {message && (
                <div className="success-message">{message}</div>
            )}

            {error && (
                <div className="error-message">{error}</div>
            )}

            {!showCreateForm && (
                <button 
                    onClick={() => setShowCreateForm(true)}
                    disabled={loading}
                    className="btn btn-primary"
                >
                    New Order
                </button>
            )}

            {showCreateForm && (
                <OrderForm
                    onSubmit={handleCreateOrder}
                    onCancel={() => setShowCreateForm(false)}
                    loading={loading}
                />
            )}

            <OrderList orders={orders} loading={loading} />
        </div>
    );
};

export default OrderManager;
```

------

### `resources/js/hooks/useOrders.js`

```js
import { useState } from 'react';

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
};
```

------

💡**Key Benefits:**
- **Component ecosystem** - Huge library of reusable components
- **Strong typing** - Works great with TypeScript
- **Developer experience** - Excellent debugging tools
- **Performance** - Virtual DOM, efficient updates
- **Industry standard** - Large community, lots of jobs

**Installation:**
```bash
npm install react react-dom @vitejs/plugin-react
npm run dev
```

**Perfect for:** Large, complex applications with rich interactions and team experience with React