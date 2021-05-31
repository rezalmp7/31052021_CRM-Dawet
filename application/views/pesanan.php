
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body uk-margin-medium-bottom uk-clearfix">
                            <a href="<?php echo base_url(); ?>pesanan/tambah" class="uk-button button-uk-success">Tambah</a>
                        </div>
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <ul class="uk-subnav uk-subnav-pill" uk-switcher>
                                <li><a href="#">All</a></li>
                                <li><a href="#">Menunggu</a></li>
                                <li><a href="#">Proses</a></li>
                                <li><a href="#">Selesai</a></li>
                            </ul>

                            <ul class="uk-switcher uk-margin">
                                <li>
                                    <table class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Produk</th>
                                                <th>Disc</th>
                                                <th>Total</th>
                                                <th>Tgl Memesan</th>
                                                <th>Tgl Pesanan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
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
                                                <td style="white-space: nowrap;">Rp. <?php echo number_format($a['harga'], '0', ',', '.'); ?></td>
                                                <td style="white-space: nowrap;"><?php echo $a['disc']; ?>%</td>
                                                <td style="white-space: nowrap;">Rp. <?php echo number_format($a['total'], '0', ',', '.'); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['create_at'])); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['pesanan_tgl'])); ?></td>
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
                                                <td>
                                                    <?php
                                                    if($a['status'] == 'menunggu')
                                                    {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/proses?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="clarity:process-on-vm-line" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    elseif ($a['status'] == 'proses') {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/selesai?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="akar-icons:double-check" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    else {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <table class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Produk</th>
                                                <th>Total</th>
                                                <th>Tgl Memesan</th>
                                                <th>Tgl Pesanan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($transaksi_menunggu as $a) {
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
                                                <td style="white-space: nowrap;">Rp. <?php echo number_format($a['total'], '0', ',', '.'); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['create_at'])); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['pesanan_tgl'])); ?></td>
                                                <td><span class="iconify uk-text-danger" data-icon="akar-icons:circle-fill" data-inline="false"></span> Menunggu</td>
                                                <td>
                                                    <?php
                                                    if($a['status'] == 'menunggu')
                                                    {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/proses?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="clarity:process-on-vm-line" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    elseif ($a['status'] == 'proses') {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/selesai?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="akar-icons:double-check" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    else {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <table class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Produk</th>
                                                <th>Total</th>
                                                <th>Tgl Memesan</th>
                                                <th>Tgl Pesanan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($transaksi_proses as $a) {
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
                                                <td style="white-space: nowrap;">Rp. <?php echo number_format($a['total'], '0', ',', '.'); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['create_at'])); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['pesanan_tgl'])); ?></td>
                                                <td><span class="iconify uk-text-danger" data-icon="akar-icons:circle-fill" data-inline="false"></span> Menunggu</td>
                                                <td>
                                                    <?php
                                                    if($a['status'] == 'menunggu')
                                                    {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/proses?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="clarity:process-on-vm-line" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    elseif ($a['status'] == 'proses') {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/selesai?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="akar-icons:double-check" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    else {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <table class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Produk</th>
                                                <th>Total</th>
                                                <th>Tgl Memesan</th>
                                                <th>Tgl Pesanan</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($transaksi_selesai as $a) {
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
                                                <td style="white-space: nowrap;">Rp. <?php echo number_format($a['total'], '0', ',', '.'); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['create_at'])); ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($a['pesanan_tgl'])); ?></td>
                                                <td><span class="iconify uk-text-danger" data-icon="akar-icons:circle-fill" data-inline="false"></span> Menunggu</td>
                                                <td>
                                                    <?php
                                                    if($a['status'] == 'menunggu')
                                                    {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/proses?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="clarity:process-on-vm-line" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    elseif ($a['status'] == 'proses') {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/selesai?id=<?php echo $a['id']; ?>" class="uk-button button-uk-success uk-button-small"><span class="iconify" data-icon="akar-icons:double-check" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    else {
                                                    ?>
                                                    <a href="<?php echo base_url(); ?>pesanan/info?id=<?php echo $a['id']; ?>" class="uk-button button-uk-primary uk-button-small"><span class="iconify" data-icon="ant-design:file-search-outlined" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/edit?id=<?php echo $a['id']; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                                    <a href="<?php echo base_url(); ?>pesanan/hapus?id=<?php echo $a['id']; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>