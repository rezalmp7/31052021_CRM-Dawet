
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <form method="POST" action="<?php echo base_url(); ?>pelanggan/edit_aksi">
                                <input type="hidden" name="id" value="<?php echo $pelanggan->id; ?>">
                                <fieldset class="uk-fieldset">
                            
                                    <legend class="uk-legend">Pelanggan Pelanggan</legend>
                            
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="text" name="nama" placeholder="Nama" value="<?php echo $pelanggan->nama; ?>" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Username</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="text" name="username" placeholder="Username" value="<?php echo $pelanggan->username; ?>" required>
                                        </div>
                                    </div>
                                    <input type="hidden" value="<?php echo $pelanggan->password; ?>" name="password_lama">
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Ganti Password</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="password" name="password" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">No Telp</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="number" name="no_telp" value="<?php echo $pelanggan->no_telp; ?>" placeholder="No Telp" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                                        <div class="uk-form-controls">
                                            <textarea class="uk-textarea" name="alamat" required><?php echo $pelanggan->alamat; ?></textarea>
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