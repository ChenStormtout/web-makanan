<x-app-layout>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Pastikan Tailwind CSS sudah terhubung, ini hanya untuk referensi kelas -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Google Fonts: Poppins (Utama) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Lucide Icons (jika digunakan) -->
        <script src="https://unpkg.com/lucide@latest"></script>
        <style>
            /* --- Variabel CSS Global (Palet Warna Profesional Baru) --- */
            :root {
                --bg-start-color: #ffe3c7; /* rgb(255, 227, 199) - Warm cream */
                --bg-end-color: #ededed;   /* rgb(237, 237, 237) - Light grey */

                --primary-accent-color:rgb(69, 76, 68); /* Darker, sophisticated orange-brown for highlights */
                --secondary-accent-color:rgb(255, 127, 8); /* Deep purple, for contrasting elements */
                
                --text-main: #333333;       /* Very dark grey for main text */
                --text-secondary: #666666;  /* Medium grey for secondary text */
                --text-light: #999999;      /* Light grey for less prominent text */
                --white: #FFFFFF;
                
                --border-light: #e0e0e0;    /* Light grey for borders */
                --card-bg: #FFFFFF;         /* White for cards/containers */
                
                --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
                --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
                --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.15);
            }

            /* --- Base Body Styling (Consistent with dashboard layout) --- */
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, var(--bg-start-color) 0%, var(--bg-end-color) 100%);
                min-height: 100vh;
                color: var(--text-main);
                overflow-x: hidden;
            }

            /* Main content area padding (from x-app-layout's <main> tag) */
            .page-content-wrapper {
                padding: 2.5rem; /* p-6/p-8, ensure consistency with main x-app-layout content */
                max-width: 1200px; /* Max width for content */
                margin: auto; /* Center content */
                width: 100%;
            }

            /* --- Sales Report Heading --- */
            .report-heading {
                font-size: 2.2rem; /* text-3xl, slightly adjusted */
                font-weight: 700; /* font-extrabold */
                color: var(--text-main); /* text-gray-900 */
                margin-bottom: 1.5rem; /* mb-6 */
                padding-bottom: 0.5rem; /* pb-2 */
                border-bottom: 2px solid var(--border-light); /* border-b-2 border-indigo-200 */
                text-align: left;
            }

            /* --- Total Revenue Card --- */
            .revenue-card {
                margin-bottom: 2rem; /* mb-8 */
                padding: 2rem; /* p-6 */
                background: var(--card-bg); /* bg-white */
                border-radius: 1rem; /* rounded-xl */
                box-shadow: var(--shadow-md); /* shadow-lg ring-1 ring-gray-50/5 */
                border: 1px solid var(--border-light); /* Added for cleaner look */
                display: flex;
                flex-direction: column; /* Default for mobile */
                justify-content: space-between;
                align-items: flex-start; /* Default for mobile */
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }

            @media (min-width: 640px) { /* sm breakpoint */
                .revenue-card {
                    flex-direction: row;
                    align-items: center;
                }
            }

            .revenue-card:hover {
                transform: translateY(-5px); /* hover:scale-[1.01] */
                box-shadow: var(--shadow-lg); /* hover:shadow-xl */
            }

            .revenue-label {
                font-size: 1.15rem; /* text-xl */
                font-weight: 500; /* font-medium */
                color: var(--text-secondary); /* text-gray-700 */
                margin-bottom: 0.75rem; /* mb-3 */
            }

            .revenue-amount {
                font-size: 2.5rem; /* text-3xl */
                font-weight: 700; /* font-extrabold */
                color: var(--primary-accent-color); /* text-indigo-600 */
            }

            /* --- Sales Order Table Container --- */
            .sales-table-container {
                overflow-x-auto;
                background: var(--card-bg); /* bg-white */
                border-radius: 1rem; /* rounded-xl */
                box-shadow: var(--shadow-md); /* shadow-lg ring-1 ring-gray-50/5 */
                border: 1px solid var(--border-light); /* Added for cleaner look */
                padding: 1.5rem; /* p-4 */
                transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            }

            .sales-table-container:hover {
                box-shadow: var(--shadow-lg); /* hover:shadow-xl */
            }

            .custom-table {
                min-width: 100%;
                font-size: 0.9rem; /* text-sm */
                color: var(--text-main); /* text-gray-800 */
                border-collapse: separate;
                border-spacing: 0;
            }

            .custom-table th, .custom-table td {
                padding: 0.9rem 1.25rem; /* px-6 py-3/4, adjusted for consistency */
                text-align: left;
                vertical-align: top; /* Align content to top */
            }

            /* --- Table Header --- */
            .custom-table thead tr {
                background-color: var(--secondary-accent-color); /* bg-indigo-50 */
                color: var(--white); /* text-indigo-800 */
                text-transform: uppercase;
                font-size: 0.75rem; /* text-xs */
                font-weight: 600; /* font-semibold */
                letter-spacing: 0.05em; /* tracking-wider */
            }
            .custom-table thead th:first-child {
                border-top-left-radius: 0.75rem; /* rounded-tl-xl */
            }
            .custom-table thead th:last-child {
                border-top-right-radius: 0.75rem; /* rounded-tr-xl */
            }

            /* --- Table Body --- */
            .custom-table tbody tr {
                border-bottom: 1px solid var(--border-light); /* border-t border-gray-200 */
                transition: background-color 0.15s ease-in-out; /* transition duration-150 ease-in-out */
            }
            .custom-table tbody tr:last-child {
                border-bottom: none; /* Remove border on last row */
            }
            .custom-table tbody tr:nth-child(odd) {
                background-color: var(--white); /* Putih solid untuk ganjil */
            }
            .custom-table tbody tr:nth-child(even) {
                background-color: #f9f9f9; /* Abu-abu sangat terang untuk genap */
            }
            .custom-table tbody tr:hover {
                background-color: #f0f0f0; /* hover:bg-gray-50 */
                box-shadow: var(--shadow-sm); /* Add subtle shadow on hover */
            }

            /* --- Table Cell Specifics --- */
            .order-code {
                font-weight: 500; /* font-medium */
                color: var(--text-main); /* text-gray-900 */
            }

            .product-list { /* list-disc list-inside text-gray-700 space-y-1 */
                list-style: none; /* Remove default bullets */
                padding-left: 0;
                margin: 0;
                color: var(--text-secondary);
                font-size: 0.85rem;
                line-height: 1.4;
            }
            .product-list li {
                margin-bottom: 0.2rem;
                position: relative;
                padding-left: 0.8rem; /* Indent for custom bullet */
            }
            .product-list li::before {
                content: '•'; /* Custom bullet */
                color: var(--primary-accent-color); /* Bullet color */
                font-size: 0.8em;
                position: absolute;
                left: 0;
                top: 0.2em;
            }
            .product-list li:last-child {
                margin-bottom: 0;
            }

            .total-price-cell {
                text-align: right;
                font-weight: 700; /* font-semibold */
                color: #28a745; /* text-gray-900, changed to green for consistency */
                font-size: 1rem; /* Slightly larger for emphasis */
            }

            .payment-method-cell {
                text-transform: capitalize;
                color: var(--text-secondary); /* text-gray-700 */
            }

            .created-at-cell {
                color: var(--text-light); /* text-gray-600 */
                font-size: 0.8rem;
            }

            /* --- Empty State --- */
            .empty-state {
                text-align: center;
                padding: 2.5rem; /* py-8 */
                color: var(--text-secondary); /* text-gray-500 */
                font-style: italic;
                background: var(--card-bg); /* Use card background */
                border-radius: 0.75rem;
                border: 1px solid var(--border-light);
                box-shadow: var(--shadow-sm);
                margin-top: 1.5rem;
            }

            /* --- Responsive Adjustments --- */
            @media (max-width: 1024px) {
                .page-content-wrapper {
                    padding: 2rem 1.5rem;
                }
                .report-heading {
                    font-size: 2rem;
                    margin-bottom: 1.25rem;
                }
                .revenue-card {
                    padding: 1.5rem;
                    margin-bottom: 1.5rem;
                }
                .revenue-label {
                    font-size: 1rem;
                    margin-bottom: 0.5rem;
                }
                .revenue-amount {
                    font-size: 2rem;
                }
                .sales-table-container {
                    padding: 1.25rem;
                }
                .custom-table th, .custom-table td {
                    padding: 0.75rem 1rem;
                }
                .custom-table thead th:first-child, .custom-table thead th:last-child {
                    border-top-left-radius: 0.6rem;
                    border-top-right-radius: 0.6rem;
                }
            }

            @media (max-width: 768px) {
                .page-content-wrapper {
                    padding: 1.5rem 1rem;
                }
                .report-heading {
                    font-size: 1.8rem;
                    margin-bottom: 1rem;
                }
                .revenue-card {
                    flex-direction: column;
                    align-items: center;
                    padding: 1.25rem;
                    margin-bottom: 1rem;
                }
                .revenue-label {
                    text-align: center;
                    width: 100%;
                }
                .revenue-amount {
                    font-size: 1.8rem;
                }
                .sales-table-container {
                    padding: 1rem;
                }
                .custom-table {
                    font-size: 0.8rem;
                }
                .custom-table th, .custom-table td {
                    padding: 0.6rem 0.8rem;
                }
                .product-list {
                    font-size: 0.75rem;
                }
                .total-price-cell {
                    font-size: 0.9rem;
                }
                .created-at-cell {
                    font-size: 0.7rem;
                }
                .empty-state {
                    padding: 2rem;
                }
            }
        </style>
    </head>
    <div class="page-content-wrapper">
        <!-- Sales Report Heading -->
        <h1 class="report-heading">Laporan Penjualan</h1>

        <!-- Total Revenue Card -->
        <div class="revenue-card">
            <div class="revenue-label">
                <span>Total Pendapatan:</span>
            </div>
            <div class="revenue-amount">
                Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}
            </div>
        </div>

        <!-- Sales Order Table Container -->
        <div class="sales-table-container">
            <div class="overflow-x-auto">
                <table class="custom-table">
                    <!-- Table Header -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Pesanan</th>
                            <th>Produk</th>
                            <th style="text-align: right;">Total Harga</th> {{-- Explicit right align for amount --}}
                            <th>Metode</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="table-row {{ $loop->odd ? 'odd-row' : 'even-row' }}">
                                <td>{{ $loop->iteration }}</td>
                                <td class="order-code">{{ $order->order_code }}</td>
                                <td>
                                    <ul class="product-list">
                                        @foreach ($order->items as $item)
                                            <li>{{ $item->product->name ?? '-' }} x{{ $item->quantity }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="total-price-cell">Rp {{ number_format($order->total_price ?? 0, 0, ',', '.') }}</td>
                                <td class="payment-method-cell">{{ $order->payment_method }}</td>
                                <td class="created-at-cell">{{ $order->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002-2v-1a2 2 0 00-2-2H9a2 2 0 00-2 2v1a2 2 0 002 2m0 0h6m-6 0H9m-6 0h6"></path>
                                        </svg>
                                        <p>Tidak ada transaksi selesai.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    lucide.createIcons(); // Pastikan ikon Lucide diinisialisasi
</script>