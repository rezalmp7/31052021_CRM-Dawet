                <!--End of Tawk.to Script-->
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-padding-remove-vertical uk-margin-remove body-content">
                        <div class="uk-width-1-1 uk-child-width-1-4@l uk-padding-remove uk-margin-remove-left uk-margin-remove-right uk-margin-small-top uk-grid-match card"
                            uk-grid>
                            <div class="body-card">
                                <div>
                                    <div class="uk-width-1-1 uk-text-center heading">Pesanan Menunggu</div>
                                    <div class="uk-width-1-1 uk-text-center value"><?php echo $menunggu; ?></div>
                                </div>
                            </div>
                            <div class="body-card">
                                <div>
                                    <div class="uk-width-1-1 uk-text-center heading">Pesanan Proses</div>
                                    <div class="uk-width-1-1 uk-text-center value"><?php echo $proses; ?></div>
                                </div>
                            </div>
                            <div class="body-card">
                                <div>
                                    <div class="uk-width-1-1 uk-text-center heading">Pesanan Selesai</div>
                                    <div class="uk-width-1-1 uk-text-center value"><?php echo $selesai; ?></div>
                                </div>
                            </div>
                            <div class="body-card">
                                <div>
                                    <div class="uk-width-1-1 uk-text-center heading">Jumlah Pesanan</div>
                                    <div class="uk-width-1-1 uk-text-center value"><?php echo $jumlah_pesanan; ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="uk-card uk-card-default uk-padding-small uk-margin-medium-top uk-border-rounded">
                            <div uk-filter="target: .js-filter">

                                <ul class="uk-subnav uk-subnav-pill">
                                    <li class="uk-active" uk-filter-control><a href="#">Semua Pesanan</a></li>
                                    <li uk-filter-control="[data-color='menunggu']"><a href="#">Menunggu</a></li>
                                    <li uk-filter-control="[data-color='proses']"><a href="#">Proses</a></li>
                                    <li uk-filter-control="[data-color='selesai']"><a href="#">Selesai</a></li>
                                </ul>

                                <ul class="js-filter uk-child-width-1-1 uk-text-center" uk-grid>
                                    <?php
                                    foreach ($pesanan as $a) {
                                        $id = $a['id'];
                                    ?>
                                    <li class="" data-color="<?php echo $a['status']; ?>">
                                        <div class="uk-card uk-card-default uk-card-body uk-padding-small">
                                            <table class="uk-table uk-table-small">
                                                <tr>
                                                    <td class="uk-text-left">Status</td>
                                                    <td class="uk-text-left">: <?php echo $a['status']; ?><td>
                                                </tr>
                                                <tr>
                                                    <td class="uk-text-left">Tanggal Dibuat</td>
                                                    <td class="uk-text-left">: <?php if($a['create_at'] != null) { echo date('d F Y', strtotime($a['create_at'])); } else { echo '-'; } ?><td>
                                                </tr>
                                                <tr>
                                                    <td class="uk-text-left">Tanggal Pengambilan</td>
                                                    <td class="uk-text-left">: <?php if($a['pesanan_tgl'] != null) { echo date('d F Y', strtotime($a['pesanan_tgl'])); } else { echo '-'; } ?></td>
                                                </tr>                                                
                                                <tr>
                                                    <td class="uk-text-left">Tanggal Diproses</td>
                                                    <td class="uk-text-left">: <?php if($a['proses_at'] != null) { echo date('d F Y', strtotime($a['proses_at'])); } else { echo '-'; } ?></td>
                                                </tr>                                                
                                                <tr>
                                                    <td class="uk-text-left">Tanggal Selesai</td>
                                                    <td class="uk-text-left">: <?php if($a['done_at'] != null) { echo date('d F Y', strtotime($a['done_at'])); } else { echo '-'; } ?></td>
                                                </tr>
                                            </table>
                                            <table class="uk-table uk-table-small">
                                                <tbody>
                                                    <?php
                                                    foreach ($produk_pesanan[$id] as $b) {
                                                    ?>
                                                    <tr>
                                                        <td class="uk-text-left"><?php echo $b['nama']; ?></td>
                                                        <td class="uk-text-right"><span class="uk-float-left">Rp</span> <?php echo number_format($b['harga'],0,',','.'); ?></td>
                                                        <?php $total_harga = $b['harga']*$b['qty']; ?>
                                                        <td class="uk-text-left"><?php echo $b['qty']; ?>X</td>
                                                        <td class="uk-text-right"><span class="uk-float-left">Rp</span> <?php echo number_format($total_harga,0,',','.'); ?></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                    <tr style="border-top: 1px solid black">
                                                        <td colspan="3" class="uk-text-bold uk-text-right">Total</td>
                                                        <td class="uk-text-right"><span class="uk-float-left">Rp</span> <?php echo number_format($a['harga'],0,',','.'); ?><td>
                                                    </tr>
                                                    <?php
                                                    $potongan = $a['harga']*$a['disc']/100;
                                                    ?>
                                                    <tr>
                                                        <td colspan="3" class="uk-text-bold uk-text-right">Discount (<?php echo $a['disc']; ?>%)</td>
                                                        <td class="uk-text-right"><span class="uk-float-left">Rp</span> <?php echo number_format($potongan,0,',','.'); ?><td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="uk-text-bold uk-text-right">Total Harga</td>
                                                        <td class="uk-text-right"><span class="uk-float-left">Rp</span> <?php echo number_format($a['total'],0,',','.'); ?><td>
                                                    </tr>
                                                </tbody>
                                            </table>    
                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                </ul>

                            </div>
                        </div>


                        <?php echo $this->session->userdata('dawet_level');
                        