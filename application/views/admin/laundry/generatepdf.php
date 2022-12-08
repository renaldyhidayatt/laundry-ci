<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            width: 80%;
            margin: auto;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            text-align: left;
        }

        td {
            padding: 12px;
        }

        .line {
            border-bottom: 1px solid black;
        }

        table td {
            font-weight: bold;
            text-align: left;
        }

        span {
            margin-left: 20px;
        }

        .right {
            text-align: right;
        }
    </style>
</head>

<body>
    <h4>LAUNDRY</h4>
    <h1 class="line">Transaction Note</h1>
    <table>
        <tr>
            <td>Transc, No.</td>
            <td class="right"><?php echo $laundry[0]->laundry_id ?></td>
        </tr>
        <tr>
            <td>Customer</td>
            <td class="right"><?php echo $laundry[0]->nama_pelanggan ?></td>
        </tr>
        <tr>
            <td>Laundry Weight</td>
            <td class="right"><?php echo $laundry[0]->berat ?> KG</td>
        </tr>
        <tr>
            <td>Laundry Category</td>
            <td class="right"><?php echo $laundry[0]->nama ?></td>
        </tr>
        <tr class="line">
            <td>Cost</td>
            <td class="right">Rp <?php echo $laundry[0]->harga ?> Per KG</td>
        </tr>
        <tr>
            <td><b>Total</b></td>
            <td class="right"><b>Rp <?php echo $laundry[0]->jumlah_total ?></b></td>
        </tr>
    </table>
    <p>Thank you for using our services. Looking forward to your next visit.</p>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>