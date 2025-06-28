<x-app-layout>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            /* --- Variabel CSS Global (Palet Warna Profesional Baru) --- */
            :root {
                --bg-start-color: #ffe3c7; /* rgb(255, 227, 199) - Warm cream */
                --bg-end-color: #ededed;   /* rgb(237, 237, 237) - Light grey */

                --primary-accent-color: #A36A00; /* Darker, sophisticated orange-brown for highlights */
                --secondary-accent-color:rgb(255, 170, 0); /* Deep purple, for contrasting elements */
                
                --text-main: #333333;       /* Very dark grey for main text */
                --text-secondary: #666666;  /* Medium grey for secondary text */
                --text-light: #999999;      /* Light grey for less prominent text */
                --white: #FFFFFF;
                
                --border-light: #e0e0e0;    /* Light grey for borders */
                --card-bg: #FFFFFF;         /* White for cards/containers */
                
                --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
                --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
                --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.15);

                --success-bg: #e6ffe6;      /* Latar belakang sukses */
                --success-border: #c3e6cb;  /* Border sukses */
                --success-text: #28a745;    /* Teks sukses */

                --error-bg: #ffebe6;        /* Latar belakang error */
                --error-border: #ffccb3;    /* Border error */
                --error-text: #dc3545;      /* Teks error */
            }

            /* --- Base Body Styling (Consistent with dashboard layout) --- */
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, var(--bg-start-color) 0%, var(--bg-end-color) 100%);
                min-height: 100vh;
                color: var(--text-main);
                overflow-x: hidden;
            }

            /* Main content wrapper */
            .page-content-wrapper {
                padding: 2.5rem; /* Equivalent to p-6/p-8, ensure consistency with main x-app-layout content */
                max-width: 1200px; /* Max width for content */
                margin: auto; /* Center content */
                width: 100%;
            }

            /* --- Page Header for Title and Cart Button --- */
            .page-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem; /* mb-4 */
            }

            /* --- Notification Styling --- */
            .notification {
                margin-bottom: 1.5rem; /* mb-4 */
                padding: 1rem; /* p-4 */
                border-radius: 0.5rem; /* rounded-lg */
                font-size: 0.95rem;
                display: flex;
                align-items: center;
                gap: 0.75rem;
            }

            .notification.success {
                background-color: var(--success-bg);
                border: 1px solid var(--success-border);
                color: var(--success-text);
            }

            .notification.error {
                background-color: var(--error-bg);
                border: 1px solid var(--error-border);
                color: var(--error-text);
            }

            /* --- Page Title --- */
            .page-title {
                font-size: 2rem; /* text-2xl */
                font-weight: 600; /* font-semibold */
                color: var(--text-main); /* text-gray-800 */
                /* margin-bottom is now handled by .page-header */
            }

            /* --- Cart Button Styling --- */
            .cart-button-wrapper {
                position: relative; /* Needed for positioning the count badge */
            }

            .cart-button {
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                background-color: var(--secondary-accent-color); /* Deep purple for contrast */
                color: var(--white);
                padding: 0.75rem 1.25rem;
                border-radius: 0.5rem;
                font-weight: 500;
                text-decoration: none;
                transition: background-color 0.2s ease, transform 0.2s ease;
                box-shadow: var(--shadow-sm);
            }

            .cart-button:hover {
                background-color: #55008C; /* Slightly darker purple on hover */
                transform: translateY(-2px);
            }

            .cart-icon {
                width: 20px;
                height: 20px;
            }

            .cart-count {
                position: absolute;
                top: -8px;
                right: -8px;
                background-color: var(--primary-accent-color); /* Orange-brown for notification */
                color: var(--white);
                font-size: 0.75rem;
                font-weight: 700;
                border-radius: 9999px; /* Fully rounded */
                padding: 0.2rem 0.5rem;
                min-width: 24px;
                text-align: center;
                line-height: 1;
                box-shadow: var(--shadow-sm);
            }


            /* --- Product Grid Styling --- */
            .product-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Responsive columns */
                gap: 1.5rem; /* gap-6 */
            }

            .product-card {
                background: var(--card-bg); /* bg-white */
                border-radius: 1rem; /* rounded-xl, slightly softer than 2xl */
                box-shadow: var(--shadow-md); /* shadow */
                overflow: hidden;
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
                border: 1px solid var(--border-light); /* Added for cleaner look */
            }

            .product-card:hover {
                transform: translateY(-5px);
                box-shadow: var(--shadow-lg);
            }

            .product-image {
                width: 100%;
                height: 12rem; /* h-48 */
                object-fit: cover;
                border-bottom: 1px solid var(--border-light); /* Separator for image */
            }

            .no-image-placeholder {
                width: 100%;
                height: 12rem; /* h-48 */
                background-color: #f0f0f0; /* bg-gray-200 */
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--text-light); /* text-gray-500 */
                font-size: 0.9rem;
            }

            .product-info {
                padding: 1.5rem; /* p-4, slightly increased for more space */
            }

            .product-name {
                font-size: 1.15rem; /* text-lg */
                font-weight: 600; /* font-semibold */
                color: var(--text-main); /* text-gray-800 */
                margin-bottom: 0.5rem;
            }

            .product-description {
                color: var(--text-secondary); /* text-gray-600 */
                font-size: 0.9rem; /* text-sm */
                line-height: 1.5;
                margin-top: 0.25rem; /* mt-1 */
            }

            .product-price {
                color: var(--primary-accent-color); /* text-orange-600 changed to primary accent */
                font-weight: 700; /* font-bold */
                font-size: 1.2rem; /* mt-2 */
                margin-top: 1rem;
            }

            .add-to-cart-form {
                margin-top: 1.5rem; /* mt-3 */
                display: flex; /* Make it a flex container */
                align-items: center; /* Vertically align items */
                gap: 0.75rem; /* Space between quantity controls and button */
            }

            /* --- Quantity Input Styling --- */
            .quantity-controls {
                display: flex;
                align-items: center;
                border: 1px solid var(--border-light);
                border-radius: 0.5rem;
                overflow: hidden;
                background-color: var(--white);
                /* --- New: Set a fixed width or max-width for quantity controls --- */
                width: 110px; /* Adjust this value as needed to fit your design */
                flex-shrink: 0; /* Prevent it from shrinking */
            }

            .quantity-button {
                background-color: var(--bg-end-color); /* Light grey background */
                color: var(--text-main);
                padding: 0.5rem 0.75rem;
                font-size: 1rem;
                font-weight: 600;
                border: none;
                cursor: pointer;
                transition: background-color 0.2s ease, color 0.2s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0; /* Prevent button from shrinking */
            }

            .quantity-button:hover {
                background-color: var(--primary-accent-color);
                color: var(--white);
            }

            .quantity-button:disabled {
                background-color: #f0f0f0;
                color: var(--text-light);
                cursor: not-allowed;
            }

            .quantity-input {
                /* --- Changed: Let input grow to fill space within controls --- */
                flex-grow: 1; 
                padding: 0.5rem 0; /* No horizontal padding, handled by buttons */
                border: none; /* Remove individual border */
                text-align: center;
                font-size: 0.95rem;
                -moz-appearance: textfield; /* Hide arrows in Firefox */
                color: var(--text-main);
                min-width: 0; /* Allow it to shrink if needed, but flex-grow will make it fill */
            }

            .quantity-input::-webkit-outer-spin-button,
            .quantity-input::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            .add-to-cart-button {
                flex-grow: 1; /* Allow button to take remaining space */
                background-color: var(--primary-accent-color); /* bg-orange-500 changed to primary accent */
                color: var(--white); /* text-white */
                padding: 0.75rem 1rem; /* py-2 px-4 */
                border-radius: 0.5rem; /* rounded-lg */
                transition: background-color 0.2s ease;
                font-weight: 500;
                text-align: center; /* Ensure text is centered if button grows */
            }

            .add-to-cart-button:hover {
                background-color:rgb(255, 0, 0); /* Slightly darker shade of primary accent on hover */
            }

            /* --- Empty State --- */
            .empty-state-message {
                grid-column: 1 / -1; /* col-span-1 md:col-span-2 lg:col-span-3 */
                text-align: center;
                color: var(--text-secondary); /* text-gray-500 */
                padding: 3rem;
                background: var(--card-bg);
                border-radius: 1rem;
                border: 1px solid var(--border-light);
                box-shadow: var(--shadow-sm);
            }

            /* --- Responsive Adjustments --- */
            @media (max-width: 1024px) {
                .page-content-wrapper {
                    padding: 2rem 1.5rem;
                }
                .page-title {
                    font-size: 1.8rem;
                }
                .cart-button {
                    padding: 0.6rem 1rem;
                    font-size: 0.9rem;
                }
                .product-card {
                    border-radius: 0.75rem;
                }
                .product-image, .no-image-placeholder {
                    height: 10rem;
                }
                .product-name {
                    font-size: 1.1rem;
                }
                .product-description {
                    font-size: 0.85rem;
                }
                .product-price {
                    font-size: 1.1rem;
                }
                .add-to-cart-button {
                    padding: 0.6rem 0.9rem;
                    font-size: 0.9rem;
                }
            }

            @media (max-width: 768px) {
                .page-content-wrapper {
                    padding: 1.5rem 1rem;
                }
                .page-header {
                    flex-direction: column; /* Stack title and button vertically */
                    align-items: flex-start; /* Align title and button to start */
                    margin-bottom: 1rem;
                    gap: 1rem; /* Space between title and button when stacked */
                }
                .page-title {
                    font-size: 1.6rem;
                    margin-bottom: 0; /* Reset margin as gap handles spacing */
                }
                .cart-button-wrapper {
                    width: 100%; /* Make button wrapper full width */
                    display: flex; /* Allow button inside to center if desired */
                    justify-content: flex-end; /* Align button to the end of the line */
                }
                .cart-button {
                    width: auto; /* Allow button to size naturally */
                    padding: 0.5rem 0.8rem;
                    font-size: 0.85rem;
                }
                .product-grid {
                    grid-template-columns: 1fr; /* Single column on small screens */
                    gap: 1.25rem;
                }
                .product-card {
                    border-radius: 0.75rem;
                }
                .product-image, .no-image-placeholder {
                    height: 9rem;
                }
                .product-info {
                    padding: 1.25rem;
                }
                .product-name {
                    font-size: 1rem;
                }
                .product-description {
                    font-size: 0.8rem;
                }
                .product-price {
                    font-size: 1rem;
                }
                .add-to-cart-form {
                    flex-direction: column; /* Stack input and button vertically */
                    align-items: stretch; /* Stretch items to full width */
                    gap: 0.5rem;
                }
                .quantity-controls {
                    width: 100%; /* Make quantity controls full width on small screens */
                    max-width: 200px; /* Optional: Limit max width even on small screens */
                    margin: 0 auto; /* Center it */
                }
                .quantity-input {
                    flex-grow: 1; /* Allow input to grow */
                }
                .add-to-cart-button {
                    padding: 0.5rem 0.8rem;
                    font-size: 0.85rem;
                    width: 100%; /* Ensure button takes full width when stacked */
                }
                .empty-state-message {
                    padding: 2rem;
                    font-size: 0.9rem;
                }
            }
        </style>
    </head>
    <div class="page-content-wrapper">
        <div class="page-header">
            <h1 class="page-title">Daftar Produk</h1>
            <div class="cart-button-wrapper">
                {{-- Anda perlu mengganti `route('customer.cart.index')` dengan route yang benar ke halaman keranjang Anda --}}
                <a href="{{ route('customer.cart') }}" class="cart-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-cart cart-icon"><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
                    <span>Keranjang</span>
                    {{-- Ini adalah badge untuk jumlah item di keranjang. Anda perlu menggantinya dengan nilai dinamis dari backend Anda. --}}
                    {{-- Contoh: <span class="cart-count">{{ $cartItemCount }}</span> --}}
                    <span class="cart-count">3</span> 
                </a>
            </div>
        </div>

        {{-- Notifikasi sukses saat produk ditambahkan --}}
        @if (session('success'))
            <div class="notification success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Notifikasi error jika ada --}}
        @if (session('error'))
            <div class="notification error">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-circle"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- Daftar produk --}}
        <div class="product-grid">
            @forelse ($products as $product)
                <div class="product-card">
                    @if ($product->image && file_exists(public_path('storage/' . $product->image)))
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <div class="no-image-placeholder">
                            Tidak ada gambar
                        </div>
                    @endif

                    <div class="product-info">
                        <h2 class="product-name">{{ $product->name }}</h2>
                        <p class="product-description">{{ $product->description }}</p>
                        <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                        <form method="POST" action="{{ route('customer.cart.add', $product->id) }}" class="add-to-cart-form">
                            @csrf
                            <div class="quantity-controls">
                                <button type="button" class="quantity-button" onclick="decrementQuantity(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus"><path d="M5 12h14"/></svg>
                                </button>
                                <input type="number" name="quantity" value="1" min="1" class="quantity-input" aria-label="Kuantitas">
                                <button type="button" class="quantity-button" onclick="incrementQuantity(this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-plus"><path d="M12 5v14"/><path d="M5 12h14"/></svg>
                                </button>
                            </div>
                            <button type="submit" class="add-to-cart-button">
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state-message">
                    Belum ada produk tersedia.
                </div>
            @endforelse
        </div>
    </div>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();

        function incrementQuantity(button) {
            const input = button.parentNode.querySelector('.quantity-input');
            input.value = parseInt(input.value) + 1;
            // Re-check state of decrement button
            const decrementButton = button.parentNode.querySelector('.quantity-button:first-child');
            decrementButton.disabled = false;
        }

        function decrementQuantity(button) {
            const input = button.parentNode.querySelector('.quantity-input');
            let currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
            // Disable button if value is 1 after decrement
            if (parseInt(input.value) <= 1) {
                button.disabled = true;
            }
        }

        // Handle initial state and input changes
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.quantity-input').forEach(input => {
                const decrementButton = input.parentNode.querySelector('.quantity-button:first-child');
                
                // Initial check on load
                if (parseInt(input.value) <= 1) {
                    decrementButton.disabled = true;
                }

                // Listen for manual input changes
                input.addEventListener('input', function() {
                    let val = parseInt(this.value);
                    if (isNaN(val) || val < 1) {
                        this.value = 1; // Default to 1 if invalid
                        val = 1;
                    }
                    if (val <= 1) {
                        decrementButton.disabled = true;
                    } else {
                        decrementButton.disabled = false;
                    }
                });
            });
        });
    </script>
</x-app-layout>