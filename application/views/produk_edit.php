
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <form method="POST" action="<?php echo base_url(); ?>produk/edit_aksi">
                                <input type="hidden" name="id" value="<?php echo $produk->id; ?>"
                                <fieldset class="uk-fieldset">

                                    <legend class="uk-legend">Edit Produk</legend>

                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="text" value="<?php echo $produk->nama; ?>" name="nama"
                                                placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Harga</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="number" name="harga" value="<?php echo $produk->harga; ?>"
                                                placeholder="Harga" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <div class="uk-form-controls">
                                            <input class="uk-button button-uk-warning" type="submit" value="EDIT">
                                        </div>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>