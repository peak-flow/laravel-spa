<div class="prose prose-lg max-w-none">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Laravel API + Alpine.js</h2>
            <p class="text-gray-600 mt-2">🪶 <strong>Lightweight Modern Option</strong> - Vue-like syntax, no build process</p>
        </div>
        <div class="flex space-x-2">
            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">~15KB</span>
            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">No Build Process</span>
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
                    <span>Very lightweight (~15KB)</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Vue-like syntax but simpler</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>No build process needed</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Works great with CDN</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Easy to add to existing projects</span>
                </li>
            </ul>
        </div>

        <div class="bg-red-50 rounded-lg p-6 border border-red-200">
            <h3 class="text-lg font-bold text-red-900 mb-4">❌ Cons</h3>
            <ul class="space-y-2 text-red-800">
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Limited compared to full frameworks</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Can get messy in complex scenarios</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Smaller ecosystem</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Perfect For -->
    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8">
        <div class="flex">
            <div class="ml-3">
                <h3 class="text-lg font-bold text-blue-900 mb-2">💡 Perfect For</h3>
                <p class="text-blue-800">Adding interactivity to existing Blade apps - Simple interactive features without heavy JavaScript framework overhead</p>
            </div>
        </div>
    </div>

    <!-- Code Examples -->
    <div class="space-y-8">
        <!-- Model (same as before) -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">📄 Model: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">app/Models/Order.php</code> (Same as before)</h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="php">
                    <pre><code class="language-php">&lt;?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'status'];
}</code></pre>
                </div>
            </div>
        </div>

        <!-- API Controller -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🎮 API Controller: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">app/Http/Controllers/Api/OrderController.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="php">
                    <pre><code class="language-php">&lt;?php

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
}</code></pre>
                </div>
            </div>
        </div>

        <!-- API Routes -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🧭 API Routes: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">routes/api.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="php">
                    <pre><code class="language-php">&lt;?php

use App\Http\Controllers\Api\OrderController;

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::post('/', [OrderController::class, 'store']);
});</code></pre>
                </div>
            </div>
        </div>

        <!-- Web Routes -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🧭 Web Routes: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">routes/web.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="php">
                    <pre><code class="language-php">&lt;?php

Route::get('/orders', function () {
    return view('orders.alpine');
})->name('orders.index');</code></pre>
                </div>
            </div>
        </div>

        <!-- Alpine.js View -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🖼️ Alpine.js View: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/views/orders/alpine.blade.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="html">
                    <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Orders - Alpine.js&lt;/title&gt;
    &lt;script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"&gt;&lt;/script&gt;
    &lt;meta name="csrf-token" content="{{ csrf_token() }}"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div x-data="orderManager()" x-init="loadOrders()"&gt;
        &lt;h1&gt;Orders&lt;/h1&gt;

        &lt;!-- Success Message --&gt;
        &lt;div x-show="message" style="color: green; margin: 10px 0;" x-text="message"&gt;&lt;/div&gt;

        &lt;!-- Create Button --&gt;
        &lt;button x-show="!showCreateForm" @click="showCreate()"&gt;New Order&lt;/button&gt;

        &lt;!-- Create Form --&gt;
        &lt;div x-show="showCreateForm" style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;"&gt;
            &lt;h2&gt;Create Order&lt;/h2&gt;
            &lt;form @submit.prevent="createOrder()"&gt;
                &lt;input type="text" x-model="newOrderName" placeholder="Order name" required&gt;
                &lt;button type="submit" :disabled="loading"&gt;
                    &lt;span x-show="!loading"&gt;Create&lt;/span&gt;
                    &lt;span x-show="loading"&gt;Creating...&lt;/span&gt;
                &lt;/button&gt;
                &lt;button type="button" @click="hideCreate()"&gt;Cancel&lt;/button&gt;
            &lt;/form&gt;
            &lt;div x-show="error" style="color: red;" x-text="error"&gt;&lt;/div&gt;
        &lt;/div&gt;

        &lt;!-- Loading --&gt;
        &lt;div x-show="loading && orders.length === 0"&gt;Loading orders...&lt;/div&gt;

        &lt;!-- Orders List --&gt;
        &lt;ul&gt;
            &lt;template x-for="order in orders" :key="order.id"&gt;
                &lt;li x-text="`${order.name} (${order.status})`"&gt;&lt;/li&gt;
            &lt;/template&gt;
        &lt;/ul&gt;
    &lt;/div&gt;

    &lt;script&gt;
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
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
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
                <strong>Lightweight</strong> - Alpine.js is only ~15KB
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>API-first</strong> - Clean separation between frontend/backend
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>Reactive</strong> - UI updates automatically with data changes
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>No build process</strong> - Works with CDN, no compilation needed
            </li>
            <li class="flex items-start">
                <span class="text-blue-600 mr-2">•</span>
                <strong>Vue-like syntax</strong> - Easy to learn if you know Vue
            </li>
        </ul>
    </div>
</div>