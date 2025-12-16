<section class="pricing-section">
    <h2 style="text-align:center; color:#f10ade;">Choose Your Plan</h2>

    <div class="billing-toggle" style="margin-bottom: 1rem; display:flex; align-items:center; justify-content:center; gap:1rem; color:#f10ade; font-weight:bold;">
        <label class="switch">
            <input type="checkbox" id="billingToggle" checked> <!-- Checked = Yearly by default -->
            <span class="slider" style="background:#f10ade;"></span>
        </label>
        <span id="billingLabel">Yearly</span>
        <span>Get discount for yearly purchases!</span>
    </div>

    <div class="pricing-container" style="display:flex; gap:1rem; justify-content:center;">

        <!-- Free Plan -->
        <div class="pricing-card" style="border:2px solid #f10ade; border-radius:8px; padding:1rem; width:300px; text-align:center;">
            <h3 style="color:#f10ade;">Free</h3>
            <p class="price" data-ngn-month="7500" data-ngn-year="70000">₦70,000/yr</p>
            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>1 User</li>
                <li>1 store/location</li>
                <li>Max Product 500</li>
                <li>Sales Report</li>
                <li>Stock Adjustment</li>
                <li>Report Download</li>
                <li>24/7 Support</li>
            </ul>
            <a href="{{ route('register') }}" class="button" style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px; display:inline-block; margin-top:0.5rem;">Get Started</a>
        </div>

        <!-- Lite Plan -->
        <div class="pricing-card featured" style="border:2px solid #f10ade; border-radius:8px; padding:1rem; width:300px; text-align:center; background:#fff0ff;">
            <h3 style="color:#f10ade;">Lite</h3>
            <p class="price" data-ngn-month="10000" data-ngn-year="100000">₦100,000/yr</p>
            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>Unlimited Users</li>
                <li>2 store/Location</li>
                <li>Unlimited Products</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking</li>
                <li>24/7 Support</li>
            </ul>
            <form action="{{ route('paystack.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="10000000"> <!-- NGN Kobo -->
                <input type="hidden" name="plan" value="lite">
                <button type="submit" class="button" style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px; margin-top:0.5rem;">Start Free Trial</button>
            </form>
        </div>

        <!-- Business Plan -->
        <div class="pricing-card" style="border:2px solid #f10ade; border-radius:8px; padding:1rem; width:300px; text-align:center;">
            <h3 style="color:#f10ade;">Business</h3>
            <p class="price" data-ngn-month="15000" data-ngn-year="150000">₦150,000/yr</p>
            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>Unlimited Users</li>
                <li>2 store/Location</li>
                <li>Unlimited Products</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking</li>
                <li>Discount Management Support</li>
                <li>Customer Management</li>
                <li>Profit & Loss Statement</li>
                <li>Barcode Support</li>
                <li>24/7 Support</li>
            </ul>
            <form action="{{ route('paystack.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="15000000"> <!-- NGN Kobo -->
                <input type="hidden" name="plan" value="business">
                <button type="submit" class="button" style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px; margin-top:0.5rem;">Contact Sales</button>
            </form>
        </div>

        <!-- Enterprise Plan (one-time purchase) -->
        <div class="pricing-card" style="border:2px solid #f10ade; border-radius:8px; padding:1rem; width:300px; text-align:center; background:#fff0ff;">
            <h3 style="color:#f10ade;">Enterprise</h3>
            <h3 class="price2">₦1,000,000</h3>
            <ul style="list-style:none; padding:0; margin:0.5rem 0;">
                <li>Unlimited Users</li>
                <li>2 store/Location</li>
                <li>Unlimited Products</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking</li>
                <li>Discount Management Support</li>
                <li>Customer Management</li>
                <li>Profit & Loss Statement</li>
                <li>Barcode Support</li>
                <li>24/7 Support</li>
            </ul>
            <form action="{{ route('paystack.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="100000000"> <!-- NGN Kobo -->
                <input type="hidden" name="plan" value="enterprise">
                <button type="submit" class="button" style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px; margin-top:0.5rem;">Request Demo</button>
            </form>
        </div>

    </div>
</section>




<script>
    const toggle = document.getElementById('billingToggle');
    const label = document.getElementById('billingLabel');
    const prices = document.querySelectorAll('.price'); // Enterprise excluded
    
    function updatePrices() {
        const isYearly = toggle.checked;
        prices.forEach((price) => {
            const monthly = parseFloat(price.dataset.ngnMonth);
            const yearly = parseFloat(price.dataset.ngnYear);
            const amount = isYearly ? yearly : monthly;
            const formatted = amount.toLocaleString();
            price.innerHTML = `₦${formatted}${isYearly ? '/yr' : '/mo'}`;
    
            // Update hidden input in form
            const form = price.closest('.pricing-card').querySelector('form');
            if (form) {
                const amountInput = form.querySelector('input[name="amount"]');
                if (amountInput) {
                    amountInput.value = Math.round(amount * 100); // Kobo
                }
            }
        });
    
        label.textContent = isYearly ? 'Yearly' : 'Monthly';
    }
    
    // Default = Yearly
    toggle.checked = true;
    updatePrices();
    
    toggle.addEventListener('change', updatePrices);
    </script>
    