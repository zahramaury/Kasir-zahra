<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Kasir</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            max-width: 800px;
            margin: auto;
        }

        .logo {
            text-align: right;
        }

        .logo img {
            width: 150px;
        }

        h1 {
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tfoot th {
            text-align: right;
        }

        .notes {
            margin-top: 20px;
            font-size: 14px;
        }

        address {
            margin-top: 20px;
            font-size: 14px;
            font-style: normal;
        }
    </style>
</head>

<body>
    <h1>Invoice</h1>
    
    <?php if($member): ?>
        <p>Member Name: <?php echo e($member->name); ?></p>
        <p>No. HP: <?php echo e($member->phone_number); ?></p>
        <p>Bergabung Sejak: <?php echo e($member->created_at); ?></p>
        <p>Point Member: <?php echo e($member->poin_member); ?></p>
    <?php else: ?>
        <p>Member: Non-Member</p>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Sub total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->product->name); ?></td>
                    <td>Rp.<?php echo e($item->product->price); ?></td>
                    <td><?php echo e($item->qty); ?></td>
                    <td>Rp.<?php echo e($item->product->price * $item->qty); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Poin Member</th>
                <td><?php echo e($member ? $member->poin_member : '0'); ?></td>
            </tr>
            <tr>
                <th colspan="3">Tunai</th>
                <td>Rp.<?php echo e($transaction->total_pay); ?></td>
            </tr>
            <tr>
                <th colspan="3">Kembalian</th>
                <td>Rp.<?php echo e($transaction->kembalian); ?></td>
            </tr>
            <tr>
                <th colspan="3">Total</th>
                <td>Rp.<?php echo e($transaction->total_price); ?></td>
            </tr>
        </tfoot>
    </table>

    <div class="notes">
        Terima kasih atas pembelian Anda.
    </div>
    <hr>
    <address>
        dhnckyazz<br>
        Alamat: Jl. Wikrama Pajajaran Gedung Siliwangi No.9<br>
        Email: Wikrama.com
    </address>
</body>

</html>
<?php /**PATH C:\kasir-dheanickyta\resources\views/pembelian/invoice.blade.php ENDPATH**/ ?>