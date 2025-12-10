<section class="pricing-section">
    <h2>Choose Your Plan</h2>

    <div class="billing-toggle">
        <label class="switch">
            <input type="checkbox" id="billingToggle">
            <span class="slider"></span>
        </label>
        <span id="billingLabel">Monthly</span>

        <select id="currencySelector">
            <option value="NGN" selected>NGN (₦)</option>
            <option value="USD">USD ($)</option>
            <option value="EUR">EUR (€)</option>
        </select>
    </div>

    <div class="pricing-container">

        <!-- Free Plan -->
        <div class="pricing-card">
            <h3>Free</h3>
            <p class="price" data-ngn-month="7500" data-ngn-year="70000">₦7500/month</p>
            <ul>
                <li>1 User</li>
                <li>1 store/location</li>
                <li>Maximum Product 500</li>
                <li>Sales Report</li>
                <li>Stock Adjustment</li>
                <li>Report Download</li>
                <li>24/7 Support</li>
            </ul>
            <a href="{{ route('register') }}" class="button">Get Started</a>
        </div>

        <!-- Lite Plan -->
        <div class="pricing-card featured">
            <h3>Lite</h3>
            <p class="price" data-ngn-month="10000" data-ngn-year="100000">₦7500/mo</p>
            <ul>
                <li>Unlimited User</li>
                <li>2 store/Location</li>
                <li>Unlimited product</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking </li>
                <li>24/7 Support</li>
            </ul>
            <form action="{{ route('paystack.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="150000"> <!-- NGN 1500 in Kobo -->
                <input type="hidden" name="plan" value="lite">
                <button type="submit" class="button">Start Free Trial</button>
            </form>
        </div>

        <!-- Business Plan -->
        <div class="pricing-card">
            <h3>Business</h3>
            <p class="price" data-ngn-month="15000" data-ngn-year="150000">₦15000/mo</p>
            <ul>
                <li>Unlimited User</li>
                <li>2 store/Location</li>
                <li>Unlimited product</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking </li>
                <li>Discount Management Support</li>
                <li>Customer Management</li>
                <li>Profit and Loss Statement</li>
                <li>Barcode support</li>
                <li>24/7 Support</li>
            </ul>
            <form action="{{ route('paystack.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="300000"> <!-- NGN 3000 in Kobo -->
                <input type="hidden" name="plan" value="business">
                <button type="submit" class="button">Contact Sales</button>
            </form>
        </div>

        <!-- Enterprise Plan -->
        <div class="pricing-card">
            <h3>Enterprise</h3>
            <p class="price" data-ngn-month="1000000" data-ngn-year="1000000">₦1000000</p>
            <ul>
                <li>Unlimited User</li>
                <li>2 store/Location</li>
                <li>Unlimited product</li>
                <li>Sales Report</li>
                <li>Report Download</li>
                <li>Stock Adjustment</li>
                <li>Expense Tracking </li>
                <li>Discount Management Support</li>
                <li>Customer Management</li>
                <li>Profit and Loss Statement</li>
                <li>Barcode support</li>
                <li>24/7 Support</li>
            </ul>
            <form action="{{ route('paystack.checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="amount" value="600000"> <!-- NGN 6000 in Kobo -->
                <input type="hidden" name="plan" value="enterprise">
                <button type="submit" class="button">Request Demo</button>
            </form>
        </div>

    </div>
</section>

<script>
    const toggle = document.getElementById('billingToggle');
    const label = document.getElementById('billingLabel');
    const currencySelector = document.getElementById('currencySelector');
    const prices = document.querySelectorAll('.price');
    const forms = document.querySelectorAll('form');

    const exchangeRates = {
        NGN: 1,
        USD: 1 / 1300,
        EUR: 1 / 1100
    };

    const currencySymbols = {
        NGN: '₦',
        USD: '$',
        EUR: '€'
    };

    function updatePrices() {
        const isYearly = toggle.checked;
        const currency = currencySelector.value;
        const rate = exchangeRates[currency];
        const symbol = currencySymbols[currency];

        prices.forEach((price, index) => {
            const monthly = parseFloat(price.dataset.ngnMonth);
            const yearly = parseFloat(price.dataset.ngnYear);
            const amount = isYearly ? yearly : monthly;
            const amountInSelectedCurrency = amount * rate;

            price.innerHTML = `${symbol}${amountInSelectedCurrency.toLocaleString(undefined, { minimumFractionDigits: 0 })}${isYearly ? '/yr' : '/mo'}`;

            // Update hidden amount input (in NGN Kobo)
            const form = price.parentElement.querySelector('form');
            if (form) {
                let amountInput = form.querySelector('input[name="amount"]');
                if (currency === "NGN") {
                    amountInput.value = (amount * 100).toFixed(0); // Kobo
                } else {
                    amountInput.value = Math.round(amountInSelectedCurrency * 100); // USD cents etc
                }
            }
        });

        label.textContent = isYearly ? 'Yearly' : 'Monthly';
    }

    toggle.addEventListener('change', updatePrices);
    currencySelector.addEventListener('change', updatePrices);
    updatePrices();
</script>