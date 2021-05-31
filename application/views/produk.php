
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body uk-margin-medium-bottom uk-clearfix">
                            <a href="<?php echo base_url(); ?>produk/tambah" class="uk-button button-uk-success">Tambah</a>                            
                        </div>
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <table id="data-table" class="uk-table uk-table-hover uk-table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($produk as $a) {
                                    ?>
                                    <tr>
                                        <td><?php echo $a->nama; ?></td>
                                        <td>Rp. <?php echo number_format($a->harga,0,",","."); ?><td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>produk/edit?id=<?php echo $a->id; ?>" class="uk-button button-uk-warning uk-button-small"><span class="iconify" data-icon="la:pen" data-inline="false"></span></a>
                                            <a href="<?php echo base_url(); ?>produk/hapus?id=<?php echo $a->id; ?>" class="uk-button button-uk-danger uk-button-small"><span class="iconify" data-icon="bi:trash" data-inline="false"></span></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>