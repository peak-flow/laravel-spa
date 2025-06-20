# Laravel API + Vue.js

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

## 🎮 API Controller: `app/Http/Controllers/Api/OrderController.php` (Same as Alpine)

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

## 🧭 Routes: `routes/api.php` (Same as Alpine)

```php
use App\Http\Controllers\Api\OrderController;

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
});
```

------

## 🧭 Web Routes: `routes/web.php`

```php
Route::get('/orders', function () {
    return view('orders.vue');
})->name('orders.index');
```

------

## 🖼️ View: `resources/views/orders/vue.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Orders - Vue.js</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <order-manager></order-manager>
    </div>

    <script>
        const { createApp } = Vue;

        const OrderManager = {
            template: `
                <div>
                    <h1>Orders</h1>

                    <!-- Success Message -->
                    <div v-if="message" style="color: green; margin: 10px 0;">
                        {{ message }}
                    </div>

                    <!-- Create Button -->
                    <button v-if="!showCreateForm" @click="showCreate">New Order</button>

                    <!-- Create Form -->
                    <div v-if="showCreateForm" style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;">
                        <h2>Create Order</h2>
                        <form @submit.prevent="createOrder">
                            <input 
                                type="text" 
                                v-model="newOrderName" 
                                placeholder="Order name" 
                                required
                            >
                            <button type="submit" :disabled="loading">
                                {{ loading ? 'Creating...' : 'Create' }}
                            </button>
                            <button type="button" @click="hideCreate">Cancel</button>
                        </form>
                        <div v-if="error" style="color: red;">{{ error }}</div>
                    </div>

                    <!-- Loading -->
                    <div v-if="loading && orders.length === 0">Loading orders...</div>

                    <!-- Orders List -->
                    <ul>
                        <li v-for="order in orders" :key="order.id">
                            {{ order.name }} ({{ order.status }})
                        </li>
                    </ul>
                </div>
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
    </script>
</body>
</html>
```

------

## 📦 Alternative with Build Process: `resources/js/components/OrderManager.vue`

```vue
<template>
    <div>
        <h1>Orders</h1>

        <!-- Success Message -->
        <div v-if="message" class="success-message">
            {{ message }}
        </div>

        <!-- Create Button -->
        <button v-if="!showCreateForm" @click="showCreate" class="btn btn-primary">
            New Order
        </button>

        <!-- Create Form -->
        <div v-if="showCreateForm" class="create-form">
            <h2>Create Order</h2>
            <form @submit.prevent="createOrder">
                <input 
                    type="text" 
                    v-model="newOrderName" 
                    placeholder="Order name" 
                    required
                    class="form-input"
                >
                <button type="submit" :disabled="loading" class="btn btn-success">
                    {{ loading ? 'Creating...' : 'Create' }}
                </button>
                <button type="button" @click="hideCreate" class="btn btn-secondary">
                    Cancel
                </button>
            </form>
            <div v-if="error" class="error-message">{{ error }}</div>
        </div>

        <!-- Loading -->
        <div v-if="loading && orders.length === 0" class="loading">
            Loading orders...
        </div>

        <!-- Orders List -->
        <ul class="orders-list">
            <li v-for="order in orders" :key="order.id" class="order-item">
                {{ order.name }} ({{ order.status }})
            </li>
        </ul>
    </div>
</template>

<script>
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
                const response = await this.$http.get('/api/orders');
                this.orders = response.data;
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
                const response = await this.$http.post('/api/orders', {
                    name: this.newOrderName
                });

                await this.loadOrders();
                this.hideCreate();
                this.message = 'Order created successfully!';
                setTimeout(() => this.message = '', 3000);
            } catch (e) {
                this.error = e.response?.data?.message || 'Failed to create order';
            }
            
            this.loading = false;
        }
    }
}
</script>

<style scoped>
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
</style>
```

------

💡**Key Benefits:**
- **Component-based** - Reusable, maintainable components
- **Reactive data binding** - Automatic UI updates
- **Rich ecosystem** - Vue Router, Vuex, lots of plugins
- **Great tooling** - Vue DevTools, CLI, hot reload
- **Template syntax** - Clean, readable templates

**Installation with Vite:**
```bash
npm install vue@next
npm install @vitejs/plugin-vue
```

**Perfect for:** Medium to large frontend applications with complex interactions