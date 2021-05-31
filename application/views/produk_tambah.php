
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <form method="POST" action="<?php echo base_url(); ?>produk/tambah_aksi">
                                <fieldset class="uk-fieldset">

                                    <legend class="uk-legend">Tambah Produk</legend>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="text" name="nama"
                                                placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Harga</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="number" name="harga"
                                                placeholder="Harga" required>
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