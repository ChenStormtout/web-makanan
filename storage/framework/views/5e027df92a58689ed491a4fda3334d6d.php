<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice #<?php echo e($order->id); ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 15px;
            background-color: #f7f7f7;
            color: #333;
            font-size: 0.95em;
            line-height: 1.5;
        }

        .invoice-container {
            max-width: 780px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: 1px solid #e0e0e0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #0056b3;
            font-size: 2em;
            margin: 0;
            font-weight: 700;
        }

        .invoice-details {
            text-align: right;
        }

        .invoice-details p {
            margin: 3px 0;
            font-size: 0.9em;
            color: #555;
        }

        .customer-info {
            margin-bottom: 25px;
            padding: 12px;
            background-color: #f0f8ff;
            border-left: 4px solid #0056b3;
            border-radius: 5px;
            font-size: 0.9em;
        }

        .customer-info p {
            margin: 4px 0;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.04);
        }

        thead th {
            background-color: #0056b3;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.85em;
            text-transform: uppercase;
            padding: 10px;
        }

        th, td {
            padding: 9px 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f0f0f0;
        }

        tfoot td {
            font-weight: 600;
            font-size: 1em;
            border-top: 2px solid #0056b3;
            padding-top: 12px;
        }

        .total-row .total-label {
            text-align: right;
            padding-right: 15px;
            color: #0056b3;
        }

        .total-row .total-amount {
            text-align: right;
            color: #0056b3;
            font-size: 1.1em;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.8em;
            color: #777;
            padding-top: 15px;
            border-top: 1px dashed #ccc;
        }

        .print-button {
            display: block;
            width: fit-content;
            margin: 15px auto 0;
            padding: 8px 16px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 0.85em;
            cursor: pointer;
        }

        .print-button:hover {
            background-color: #003e86;
        }

        @media print {
            .print-button {
                display: none;
            }

            body {
                background-color: white;
                margin: 0;
                padding: 0;
                font-size: 1em;
            }

            .invoice-container {
                box-shadow: none;
                border: none;
                margin: 0;
                padding: 0;
            }

            .footer {
                color: #555;
            }
        }
    </style>
</head>
<body>

    <button class="print-button" onclick="window.print()">Cetak Invoice</button>

    <div class="invoice-container">
        <div class="header">
            <h1>INVOICE</h1>
            <div class="invoice-details">
                <p><strong>Invoice #<?php echo e($order->id); ?></strong></p>
                <p>Tanggal: <?php echo e($order->created_at->format('d M Y')); ?></p>
                <p>Metode Pembayaran: <?php echo e(ucfirst($order->payment_method)); ?></p>
                <p>Status: <?php echo e(ucfirst($order->status)); ?></p>
            </div>
        </div>

        <div class="customer-info">
            <p><strong>Kepada:</strong></p>
            <p><?php echo e($order->user->name ?? 'Pelanggan Tidak Diketahui'); ?></p>
            <p>Email: <?php echo e($order->user->email ?? '-'); ?></p>
            <p>Alamat Pengiriman: <?php echo e($order->address); ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->product->name ?? 'Produk Tidak Diketahui'); ?></td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td>Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?></td>
                        <td>Rp <?php echo e(number_format($item->quantity * $item->price, 0, ',', '.')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="3" class="total-label">Total Harga</td>
                    <td class="total-amount">Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td>
                </tr>
            </tfoot>
        </table>

        <div class="footer">
            <p>Terima kasih atas pesanan Anda!</p>
            <p>Jika ada pertanyaan, silakan hubungi tim kami.</p>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/admin/orders/invoice.blade.php ENDPATH**/ ?>