
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body uk-margin-medium-bottom uk-clearfix">
                            <form class="uk-grid-small" method="POST" action="<?php echo base_url(); ?>laporan_keuangan/cetak" uk-grid>
                                <div class="uk-width-1-4@s">
                                    <input class="uk-input" type="date" name="tanggal_awal" placeholder="Tanggal Awal Laporan" required>
                                </div>
                                <div class="uk-width-1-4@s">
                                    <input class="uk-input" type="date" name="tanggal_akhir" placeholder="Tanggal Akhir Laporan" required>
                                </div>
                                <div uk-margin>
                                    <button type="submit" class="uk-button button-uk-success"><span class="iconify" data-icon="bytesize:print" data-inline="false"></span> Cetak</button>
                                </div>
                            </form>
                        </div>
                        <div class="uk-padding-small uk-border-rounded segmen-body">
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
                                <tfoot>
                                    <tr>
                                        <th colspan='7'>Total</th>
                                        <td>Rp <?php echo number_format($pemasukan, '0', ',', '.'); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>