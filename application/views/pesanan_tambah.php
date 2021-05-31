
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <form method="POST" action="<?php echo base_url(); ?>pesanan/tambah_aksi">
                                <fieldset class="uk-fieldset">

                                    <legend class="uk-legend">Tambah Pesanan</legend>
                                    
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">ID</label>
                                        <div class="uk-form-controls">
                                            <?php echo $id_transaksi; ?>
                                            <input class="uk-input" id="form-stacked-text" type="hidden" name="id" value="<?php echo $id_transaksi; ?>">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                        <div class="uk-form-controls">
                                            <select class="select2 uk-width-1-1 select_pelanggan" name="pelanggan" placeholder="Pelanggan">
                                                <option value="">--Pilih Pelanggan--</option>
                                                <option value="tambah_pelanggan">Tambah Pelanggan</option>
                                                <?php
                                                foreach ($pelanggan as $pe) {
                                                ?>
                                                <option value="<?php echo $pe->id; ?>"><?php echo $pe->nama; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="uk-margin" id="tambah_pelanggan">
                                    <hr>
                                        <label class="uk-form-label uk-text-bold" for="form-stacked-text">Tambah Pelanggan</label>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">ID</label>
                                            <div class="uk-form-controls">
                                                <?php echo $id_pelanggan; ?>
                                                <input class="uk-input" id="form-stacked-text" type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">Nama Pelanggan</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" id="form-stacked-text" type="text" name="nama_pelanggan" placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">No Telp Pelanggan</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" id="form-stacked-text" type="number" name="no_telp_pelanggan" placeholder="No Telp">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">Alamat Pelanggan</label>
                                            <div class="uk-form-controls">
                                                <textarea class="uk-textarea" name="alamat_pelanggan"></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="uk-width-1-1 uk-margin-remove uk-padding-remove field_wrapper">
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">Discount (%)</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" id="form-stacked-text" type="number" name="discount" placeholder="Discount">
                                            </div>
                                        </div>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text">Tanggal Pesanan</label>
                                            <div class="uk-form-controls">
                                                <input class="uk-input" id="form-stacked-text" type="date" name="tgl_pesanan" required>
                                            </div>
                                        </div>
                                        <label class="uk-form-label">Produk Pesanan</label>
                                        <div class="uk-margin">
                                            <label class="uk-form-label" for="form-stacked-text"></label>
                                            <div class="uk-form-controls">
                                                <a type="button" id="tambah_form_produk" class="uk-button uk-button-small uk-border-rounded uk-button-primary"><span class="iconify" data-icon="akar-icons:plus" data-inline="false"></span></a>
                                            </div>
                                        </div>
                                        <div class=" uk-width-expand uk-margin-remove uk-padding-remove" uk-grid>
                                            <div class="uk-margin-remove uk-width-2-3 uk-padding uk-padding-remove-left uk-padding-remove-vertical">
                                                <div class="uk-form-controls">
                                                    <select class="uk-select uk-width-1-1" name="produk[]">
                                                        <option value="">--Pilih Produk--</option>
                                                        <?php
                                                        foreach ($produk as $a) {
                                                        ?>
                                                            <option value="<?php echo $a->id; ?>"><?php echo $a->nama; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="uk-margin-remove uk-width-1-3 uk-padding uk-padding-remove-left uk-padding-remove-vertical">
                                                <div class="uk-form-controls">
                                                    <input class="uk-input" id="form-stacked-text" type="text" name="qty[]" placeholder="Qty" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <input class="uk-button button-uk-success" type="submit" value="SIMPAN">
                                        </div>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                $option_produk = '';
                foreach ($produk as $p) {
                    $option_produk .= '<option value="'.$p->id.'">'.$p->nama.'</option>';
                }
                $script_tambah_form = '<div class=" uk-width-expand uk-margin-remove uk-padding-small uk-padding-remove-horizontal uk-padding-remove-bottom" uk-grid><div class="uk-margin-remove uk-width-2-3 uk-padding uk-padding-remove-left uk-padding-remove-vertical"><div class="uk-form-controls"><select class="uk-select uk-width-1-1" name="produk[]"><option value="">--Pilih Produk--</option>'.$option_produk.'</select></div></div><div class="uk-margin-remove uk-width-1-3 uk-padding uk-padding-remove-left uk-padding-remove-vertical"><div class="uk-form-controls"><input class="uk-input" id="form-stacked-text" type="text" name="qty[]" placeholder="Qty" required></div></div></div>';
                ?>
                <script>
                $(document).ready(function(){
                    // var maxField = 6; //Input fields increment limitation
                    var addButton = $('#tambah_form_produk'); //Add button selector
                    var wrapper = $('.field_wrapper'); //Input field wrapper
                    var fieldHTML = '<?php echo $script_tambah_form; ?>'; //New input field html 
                    // var x = 1; //Initial field counter is 1
                    
                    //Once add button is clicked
                    $(addButton).click(function(){
                        //Check maximum number of input fields
                        $(wrapper).append(fieldHTML); //Add field html
                    });
                    
                });
                </script>