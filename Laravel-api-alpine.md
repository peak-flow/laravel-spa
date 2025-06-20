# Laravel API + Alpine.js

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

## 🎮 API Controller: `app/Http/Controllers/Api/OrderController.php`

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

## 🧭 Routes: `routes/api.php`

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
    return view('orders.alpine');
})->name('orders.index');
```

------

## 🖼️ View: `resources/views/orders/alpine.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Orders - Alpine.js</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div x-data="orderManager()" x-init="loadOrders()">
        <h1>Orders</h1>

        <!-- Success Message -->
        <div x-show="message" style="color: green; margin: 10px 0;" x-text="message"></div>

        <!-- Create Button -->
        <button x-show="!showCreateForm" @click="showCreate()">New Order</button>

        <!-- Create Form -->
        <div x-show="showCreateForm" style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;">
            <h2>Create Order</h2>
            <form @submit.prevent="createOrder()">
                <input type="text" x-model="newOrderName" placeholder="Order name" required>
                <button type="submit" :disabled="loading">
                    <span x-show="!loading">Create</span>
                    <span x-show="loading">Creating...</span>
                </button>
                <button type="button" @click="hideCreate()">Cancel</button>
            </form>
            <div x-show="error" style="color: red;" x-text="error"></div>
        </div>

        <!-- Loading -->
        <div x-show="loading && orders.length === 0">Loading orders...</div>

        <!-- Orders List -->
        <ul>
            <template x-for="order in orders" :key="order.id">
                <li x-text="`${order.name} (${order.status})`"></li>
            </template>
        </ul>
    </div>

    <script>
        function orderManager() {
            return {
                orders: [],
                showCreateForm: false,
                newOrderName: '',
                loading: false,
                message: '',
                error: '',

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
    </script>
</body>
</html>
```

------

💡**Key Benefits:**
- **Lightweight** - Alpine.js is only ~15KB
- **API-first** - Clean separation between frontend/backend
- **Reactive** - UI updates automatically with data changes
- **No build process** - Works with CDN, no compilation needed
- **Vue-like syntax** - Easy to learn if you know Vue

**Perfect for:** Simple interactive features without heavy JavaScript framework overhead