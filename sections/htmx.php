
<div class="prose prose-lg max-w-none">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Laravel + HTMX</h2>
            <p class="text-gray-600 mt-2">🌐 <strong>Server-Side Focused Modern</strong> - HTML over the wire</p>
        </div>
        <div class="flex space-x-2">
            <span class="bg-orange-100 text-orange-800 text-sm font-medium px-3 py-1 rounded-full">~14KB</span>
            <span class="bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">No Build Process</span>
            <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full">HTML not JSON</span>
        </div>
    </div>

    <!-- Pros and Cons -->
    <div class="grid md:grid-cols-2 gap-6 mb-8">
        <div class="bg-green-50 rounded-lg p-6 border border-green-200">
            <h3 class="text-lg font-bold text-green-900 mb-4">✅ Pros</h3>
            <ul class="space-y-2 text-green-800">
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Server returns HTML, not JSON</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Minimal JavaScript knowledge needed</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Progressive enhancement</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Small footprint (~14KB)</span>
                </li>
                <li class="flex items-start">
                    <span class="text-green-600 mr-2">•</span>
                    <span>Great for teams that prefer server-side logic</span>
                </li>
            </ul>
        </div>

        <div class="bg-red-50 rounded-lg p-6 border border-red-200">
            <h3 class="text-lg font-bold text-red-900 mb-4">❌ Cons</h3>
            <ul class="space-y-2 text-red-800">
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Different paradigm from traditional JS frameworks</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Limited complex UI interactions</span>
                </li>
                <li class="flex items-start">
                    <span class="text-red-600 mr-2">•</span>
                    <span>Newer technology (smaller community)</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Perfect For -->
    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 mb-8">
        <div class="flex">
            <div class="ml-3">
                <h3 class="text-lg font-bold text-blue-900 mb-2">💡 Perfect For</h3>
                <p class="text-blue-800">Teams comfortable with server-side rendering but want modern UX</p>
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
}</code></pre>
                </div>
            </div>
        </div>

        <!-- Main View -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🖼️ Main View: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/views/orders/htmx.blade.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="html">
                    <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;title&gt;Orders - HTMX&lt;/title&gt;
    &lt;script src="https://unpkg.com/htmx.org@1.9.10"&gt;&lt;/script&gt;
    &lt;meta name="csrf-token" content="{{ csrf_token() }}"&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;div&gt;
        &lt;h1&gt;Orders&lt;/h1&gt;

        &lt;!-- Form Container --&gt;
        &lt;div id="form-container"&gt;
            &lt;button hx-get="{{ route('orders.create') }}" hx-target="#form-container"&gt;
                New Order
            &lt;/button&gt;
        &lt;/div&gt;

        &lt;!-- Orders Container --&gt;
        &lt;div id="orders-container" hx-get="{{ route('orders.index') }}" hx-trigger="load"&gt;
            @include('orders.partials.list', ['orders' => $orders])
        &lt;/div&gt;
    &lt;/div&gt;

    &lt;script&gt;
        // Add CSRF token to all HTMX requests
        document.body.addEventListener('htmx:configRequest', function(evt) {
            evt.detail.headers['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;
        });
    &lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                </div>
            </div>
        </div>

        <!-- Partial Views -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <div class="bg-gray-50 px-6 py-3 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">🧩 Create Form Partial: <code class="text-sm font-mono bg-gray-100 px-2 py-1 rounded">resources/views/orders/partials/create-form.blade.php</code></h3>
            </div>
            <div class="p-6">
                <div class="code-block" data-language="html">
                    <pre><code class="language-html">&lt;div style="border: 1px solid #ccc; padding: 15px; margin: 10px 0;"&gt;
    &lt;h2&gt;Create Order&lt;/h2&gt;
    &lt;form hx-post="{{ route('orders.store') }}"
          hx-target="#orders-container"
          hx-indicator="#loading"&gt;
        @csrf
        &lt;input type="text" name="name" placeholder="Order name" required&gt;
        &lt;button type="submit"&gt;Create&lt;/button&gt;
        &lt;button type="button"
                hx-delete="{{ route('orders.cancel-create') }}"
                hx-target="#form-container"&gt;
            Cancel
        &lt;/button&gt;
    &lt;/form&gt;
    &lt;div id="loading" style="display: none;"&gt;Creating...&lt;/div&gt;
&lt;/div&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>

    <!-- Key Benefits -->
    <div class="bg-orange-50 rounded-lg p-6 mt-8">
        <h3 class="text-lg font-bold text-orange-900 mb-4">💡 Key Benefits</h3>
        <ul class="space-y-2 text-orange-800">
            <li class="flex items-start">
                <span class="text-orange-600 mr-2">•</span>
                <strong>HTML over the wire</strong> - Server returns HTML fragments, not JSON
            </li>
            <li class="flex items-start">
                <span class="text-orange-600 mr-2">•</span>
                <strong>Minimal JavaScript</strong> - All logic stays on the server
            </li>
            <li class="flex items-start">
                <span class="text-orange-600 mr-2">•</span>
                <strong>Progressive enhancement</strong> - Works without JS, enhanced with it
            </li>
            <li class="flex items-start">
                <span class="text-orange-600 mr-2">•</span>
                <strong>Simple mental model</strong> - Traditional server-side rendering with AJAX
            </li>
            <li class="flex items-start">
                <span class="text-orange-600 mr-2">•</span>
                <strong>Small footprint</strong> - HTMX is only ~14KB
            </li>
        </ul>
    </div>
</div>
