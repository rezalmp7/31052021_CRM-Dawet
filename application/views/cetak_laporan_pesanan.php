<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&family=Poppins:wght@300;400;500;600;700;800;900&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />
    <style>
    @media print
    {
        @page 
        {
            size: landscape;
        }
    }
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit-icons.min.js"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
    <script>
    window.print();
    </script>
</head>
<body>
    <article class="uk-article">

        <h1 class="uk-article-title uk-margin-remove uk-padding-remove uk-text-center">Laporan Keuangan DAWET</h1>

        <p class="uk-article-meta uk-text-center">on <?php echo date('d-m-Y', strtotime($tgl_awal)); ?> - <?php echo date('d-m-Y', strtotime($tgl_akhir)); ?></p>

        <table class="uk-table uk-table-hover uk-table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Produk</th>
                    <th>Tgl Memesan</th>
                    <th>Tgl Pesanan</th>
                    <th>Tgl Selesai</th>
                    <th>Status</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $pemasukan = 0;
                foreach ($transaksi as $a) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td>
                        <?php echo $a['nama_pelanggan']; ?>
                        <hr class="uk-padding-remove uk-margin-remove">
                        <span class="uk-text-bold uk-text-small"><?php echo $a['no_telp_pelanggan']; ?></span>
                    </td>
                    <td>
                        <?php
                        foreach ($pesanan[$a['id']] as $b) {
                            echo $b['nama_produk'].' - '.number_format($b['harga_produk'], 0, ',', '.').' - '.$b['qty'].'<br>'; 
                        }
                        ?>
                    </td>
                    <td><?php echo date('d/m/Y', strtotime($a['create_at'])); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($a['pesanan_tgl'])); ?></td>
                    <td><?php echo date('d/m/Y', strtotime($a['done_at'])); ?></td>
                    <td>
                        <?php if($a['status'] == 'menunggu')
                        {
                        ?>
                        <span class="iconify uk-text-danger" data-icon="akar-icons:circle-fill" data-inline="false"></span> Menunggu
                        <?php
                        }
                        elseif ($a['status'] == 'proses') {
                        ?>
                        <span class="iconify uk-text-warning" data-icon="akar-icons:circle-fill" data-inline="false"></span> Proses
                        <?php
                        }
                        else {
                        ?>
                        <span class="iconify uk-text-success" data-icon="akar-icons:circle-fill" data-inline="false"></span> Selesai
                        <?php
                        }
                        ?>
                    </td>
                    <td style="white-space: nowrap;">Rp. <?php echo number_format($a['total'], '0', ',', '.'); ?></td>
                </tr>
                <?php
                $no++;
                $pemasukan = $pemasukan+$a['total'];
                }
                ?>
            </tbody>
        </table>
    </article>
</body>
</html>