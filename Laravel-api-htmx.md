# Laravel + HTMX

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

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();
        
        if ($request->header('HX-Request')) {
            return view('orders.partials.list', compact('orders'));
        }
        
        return view('orders.htmx', compact('orders'));
    }

    public function create(Request $request)
    {
        if ($request->header('HX-Request')) {
            return view('orders.partials.create-form');
        }
        
        return redirect()->route('orders.index');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        
        Order::create([
            'name' => $request->name,
            'status' => 'pending'
        ]);

        if ($request->header('HX-Request')) {
            $orders = Order::all();
            return view('orders.partials.list-with-message', [
                'orders' => $orders,
                'message' => 'Order created successfully!'
            ]);
        }
        
        return redirect()->route('orders.index');
    }

    public function cancelCreate(Request $request)
    {
        if ($request->header('HX-Request')) {
            return '<button hx-get="/orders/create" hx-target="#form-container">New Order</button>';
        }
        
        return redirect()->route('orders.index');
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
Route::delete('/orders/create', [OrderController::class, 'cancelCreate'])->name('orders.cancel-create');
```

------

## 🖼️ Main View: `resources/views/orders/htmx.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Orders - HTMX</title>
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .success-message { color: green; margin: 10px 0; }
        .create-form { border: 1px solid #ccc; padding: 15px; margin: 10px 0; }
        .loading { opacity: 0.5; }
    </style>
</head>
<body>
    <div>
        <h1>Orders</h1>

        <!-- Form Container -->
        <div id="form-container">
            <button hx-get="{{ route('orders.create') }}" hx-target="#form-container">
                New Order
            </button>
        </div>

        <!-- Orders Container -->
        <div id="orders-container" hx-get="{{ route('orders.index') }}" hx-trigger="load">
            @include('orders.partials.list', ['orders' => $orders])
        </div>
    </div>

    <script>
        // Add CSRF token to all HTMX requests
        document.body.addEventListener('htmx:configRequest', function(evt) {
            evt.detail.headers['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;
        });
    </script>
</body>
</html>
```

------

## 🧩 Partial Views

### `resources/views/orders/partials/list.blade.php`

```blade
<ul>
    @foreach ($orders as $order)
        <li>{{ $order->name }} ({{ $order->status }})</li>
    @endforeach
</ul>
```

------

### `resources/views/orders/partials/list-with-message.blade.php`

```blade
<div class="success-message">{{ $message }}</div>
<ul>
    @foreach ($orders as $order)
        <li>{{ $order->name }} ({{ $order->status }})</li>
    @endforeach
</ul>
```

------

### `resources/views/orders/partials/create-form.blade.php`

```blade
<div class="create-form">
    <h2>Create Order</h2>
    <form hx-post="{{ route('orders.store') }}" 
          hx-target="#orders-container"
          hx-indicator="#loading">
        @csrf
        <input type="text" name="name" placeholder="Order name" required>
        <button type="submit">Create</button>
        <button type="button" 
                hx-delete="{{ route('orders.cancel-create') }}"
                hx-target="#form-container">
            Cancel
        </button>
    </form>
    <div id="loading" class="loading" style="display: none;">Creating...</div>
</div>
```

------

## 🔄 Advanced Example with Inline Editing

### Enhanced Controller Method:

```php
public function edit(Order $order, Request $request)
{
    if ($request->header('HX-Request')) {
        return view('orders.partials.edit-form', compact('order'));
    }
    
    return redirect()->route('orders.index');
}

public function update(Order $order, Request $request)
{
    $request->validate(['name' => 'required']);
    
    $order->update(['name' => $request->name]);
    
    if ($request->header('HX-Request')) {
        return view('orders.partials.order-row', compact('order'));
    }
    
    return redirect()->route('orders.index');
}
```

### Enhanced List Partial:

```blade
<!-- resources/views/orders/partials/enhanced-list.blade.php -->
<ul>
    @foreach ($orders as $order)
        @include('orders.partials.order-row', ['order' => $order])
    @endforeach
</ul>
```

### Order Row Partial:

```blade
<!-- resources/views/orders/partials/order-row.blade.php -->
<li id="order-{{ $order->id }}">
    <span hx-get="{{ route('orders.edit', $order) }}" 
          hx-target="#order-{{ $order->id }}"
          style="cursor: pointer;">
        {{ $order->name }} ({{ $order->status }})
    </span>
</li>
```

### Edit Form Partial:

```blade
<!-- resources/views/orders/partials/edit-form.blade.php -->
<li id="order-{{ $order->id }}">
    <form hx-put="{{ route('orders.update', $order) }}" 
          hx-target="#order-{{ $order->id }}">
        @csrf
        <input type="text" name="name" value="{{ $order->name }}" required>
        <button type="submit">Save</button>
        <button type="button" 
                hx-get="{{ route('orders.index') }}"
                hx-target="#order-{{ $order->id }}">
            Cancel
        </button>
    </form>
</li>
```

------

💡**Key Benefits:**
- **HTML over the wire** - Server returns HTML fragments, not JSON
- **Minimal JavaScript** - All logic stays on the server
- **Progressive enhancement** - Works without JS, enhanced with it
- **Simple mental model** - Traditional server-side rendering with AJAX
- **Small footprint** - HTMX is only ~14KB

**Perfect for:** Teams that prefer server-side logic but want modern UX interactions