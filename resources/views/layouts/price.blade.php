<style>

    .pricing-container{
        display:flex;
        gap:1rem;
        justify-content:center;
        align-items:stretch;
    }

    @media(max-width:767px){
        
    .pricing-container{
        align-items:center;
    }
    }
</style>
<section class="pricing-section">
    <h2 style="text-align:center; color:#f10ade;">Choose Your Plan</h2>

    <div class="billing-toggle" style="margin-bottom: 1rem; display:flex; align-items:center; justify-content:center; gap:1rem; color:#f10ade; font-weight:bold;">
        <label class="switch">
            <input type="checkbox" id="billingToggle" checked>
            <span class="slider" style="background:#f10ade;"></span>
        </label>
        <span id="billingLabel">Yearly</span>
        <span>Get discount for yearly purchases!</span>
    </div>

    <div class="pricing-container">

        <!-- Free Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            display:flex;
            flex-direction:column;
        ">
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

            <div style="margin-top:auto;">
                <a href="{{ route('register') }}" class="button"
                   style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px; display:inline-block;">
                    Get Started
                </a>
            </div>
        </div>

        <!-- Lite Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            background:#fff0ff;
            display:flex;
            flex-direction:column;
        ">
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

            <div style="margin-top:auto;">
                <form action="{{ route('paystack.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="10000000">
                    <input type="hidden" name="plan" value="lite">
                    <button type="submit" class="button"
                        style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px;">
                        Start Free Trial
                    </button>
                </form>
            </div>
        </div>

        <!-- Business Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            display:flex;
            flex-direction:column;
        ">
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

            <div style="margin-top:auto;">
                <form action="{{ route('paystack.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="15000000">
                    <input type="hidden" name="plan" value="business">
                    <button type="submit" class="button"
                        style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px;">
                        Contact Sales
                    </button>
                </form>
            </div>
        </div>

        <!-- Enterprise Plan -->
        <div class="pricing-card" style="
            border:1px solid #f10ade;
            border-radius:8px;
            padding:1rem;
            width:300px;
            text-align:center;
            background:#fff0ff;
            display:flex;
            flex-direction:column;
        ">
            <h3 style="color:#f10ade;">Enterprise</h3>
            <h3>₦1,000,000</h3>

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

            <div style="margin-top:auto;">
                <form action="{{ route('paystack.checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="100000000">
                    <input type="hidden" name="plan" value="enterprise">
                    <button type="submit" class="button"
                        style="background:#f10ade; color:#fff; padding:0.5rem 1rem; border-radius:4px;">
                        Request Demo
                    </button>
                </form>
            </div>
        </div>

    </div>
</section>
