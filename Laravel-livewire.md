# Laravel Livewire

------

## 📄 Model: `app/Models/Order.php` (Same as Blade)

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'status'];
}
```

------

## ⚡ Livewire Component: `app/Http/Livewire/OrderManager.php`

```php
namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderManager extends Component
{
    public $orders = [];
    public $name = '';
    public $showCreateForm = false;

    public function mount()
    {
        $this->loadOrders();
    }

    public function loadOrders()
    {
        $this->orders = Order::all()->toArray();
    }

    public function showCreate()
    {
        $this->showCreateForm = true;
        $this->name = '';
    }

    public function hideCreate()
    {
        $this->showCreateForm = false;
        $this->name = '';
    }

    public function store()
    {
        $this->validate(['name' => 'required']);
        
        Order::create([
            'name' => $this->name,
            'status' => 'pending'
        ]);
        
        $this->loadOrders();
        $this->hideCreate();
        session()->flash('message', 'Order created successfully!');
    }

    public function render()
    {
        return view('livewire.order-manager');
    }
}
```

------

## 🧭 Routes: `routes/web.php`

```php
use App\Http\Livewire\OrderManager;

Route::get('/orders', OrderManager::class)->name('orders.index');
```

------

## 🖼️ View: `resources/views/livewire/order-manager.blade.php`

```blade
<div>
    <h1>Orders</h1>

    @if (session()->has('message'))
        <div style="color: green; margin: 10px 0;">
            {{ session('message') }}
        </div>
    @endif

    @if (!$showCreateForm)
        <button wire:click="showCreate">New Order</button>
    @endif

    @if ($showCreateForm)
        <div style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;">
            <h2>Create Order</h2>
            <form wire:submit.prevent="store">
                <input type="text" wire:model="name" placeholder="Order name" required>
                <button type="submit">Create</button>
                <button type="button" wire:click="hideCreate">Cancel</button>
            </form>
            @error('name') <span style="color: red;">{{ $message }}</span> @enderror
        </div>
    @endif

    <ul>
        @foreach ($orders as $order)
            <li>{{ $order['name'] }} ({{ $order['status'] }})</li>
        @endforeach
    </ul>
</div>
```

------

## 📋 Layout: `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html>
<head>
    <title>Orders App</title>
    @livewireStyles
</head>
<body>
    {{ $slot }}
    @livewireScripts
</body>
</html>
```

------

💡**Key Benefits:**
- **No page refreshes** - Everything happens via AJAX automatically
- **Real-time validation** - Errors show instantly
- **Minimal JavaScript** - All logic in PHP
- **Reactive UI** - State changes update the view automatically
- **Clean separation** - One component handles all order logic

**Installation:**
```bash
composer require livewire/livewire
php artisan make:livewire OrderManager
```

**Perfect for:** Apps with heavy AJAX interactions but you want to stay in PHP