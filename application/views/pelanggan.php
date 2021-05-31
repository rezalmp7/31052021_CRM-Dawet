
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body uk-margin-medium-bottom uk-clearfix">
                            <a href="<?php echo base_url(); ?>pelanggan/tambah" class="uk-button button-uk-success">Tambah</a>
                        </div>
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <table id="data-table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Jumlah Pemesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach($pelanggan as $a) {
                                        $id = $a['id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td>
                                        <?php echo $a['nama']; ?>
                                        </td>
                                        <td><?php echo $a['no_telp']; ?></td>
                                        <td><?php echo $a['alamat']; ?></td>
                                        <td><?php echo $jml_transaksi[$id]; ?>X</td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>pelanggan/edit?id=<?php echo $id; ?>" class="uk-button button-uk-warning uk-button-small"><span
                                                    class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                            <a href="<?php echo base_url(); ?>pelanggan/hapus?id=<?php echo $id; ?>" class="uk-button button-uk-danger uk-button-small"><span
                                                    class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>