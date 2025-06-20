# Laravel Blade

------

## 📄 Model: `app/Models/Order.php`

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
    public function index() {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create() {
        return view('orders.create');
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required']);
        Order::create($request->only('name') + ['status' => 'pending']);
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
```

------

## 🖼️ Views

### `resources/views/orders/index.blade.php`

```blade
<h1>Orders</h1>
<a href="{{ route('orders.create') }}">New Order</a>

<ul>
@foreach ($orders as $order)
    <li>{{ $order->name }} ({{ $order->status }})</li>
@endforeach
</ul>
```

------

### `resources/views/orders/create.blade.php`

```blade
<h1>Create Order</h1>

<form method="POST" action="{{ route('orders.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Order name" required>
    <button type="submit">Create</button>
</form>
```

------

💡This gives you:

- `/orders` → List all orders
- `/orders/create` → Show new order form
- `POST /orders` → Save new order

