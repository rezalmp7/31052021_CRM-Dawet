
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <table>
                                <tr>
                                    <th style="text-align: left">Nama Pelanggan</th>
                                    <td>: <?php echo $transaksi->nama; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Nomor Telephone</th>
                                    <td>: <?php echo $transaksi->no_telp; ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: left">Alamat</th>
                                    <td>: <?php echo $transaksi->alamat; ?></td>
                                </tr>
                            </table>
                            <br>
                            <table class="uk-table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Qty</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_harga = 0;
                                    foreach ($pesanan as $a) {
                                        $harga_barang = $a->harga*$a->qty;
                                    ?>
                                    <tr>
                                        <td><?php echo $a->nama; ?></td>
                                        <td>Rp. <?php echo number_format($a->harga, '0', ',', '.'); ?></td>
                                        <td><?php echo $a->qty; ?></td>
                                        <td>Rp. <?php echo number_format($harga_barang, '0', ',', '.'); ?></td>
                                    </tr>
                                    <?php
                                    $total_harga = $total_harga+$harga_barang;
                                    $total_bayar = $total_harga-($total_harga*$transaksi->disc/100);
                                    }
                                    ?>
                                    <tr>
                                        <td style="font-weight: bold" colspan="3">Total</td>
                                        <td style="font-weight: bold">Rp. <?php echo number_format($total_harga, '0', ',', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold" colspan="3">Disc</td>
                                        <td style="font-weight: bold"><?php echo $transaksi->disc; ?>%</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold" colspan="3">Total Bayar</td>
                                        <td style="font-weight: bold">Rp. <?php echo number_format($total_bayar, '0', ',', '.'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>