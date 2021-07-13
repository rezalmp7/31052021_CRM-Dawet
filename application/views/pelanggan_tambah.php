
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <form method="POST" action="<?php echo base_url(); ?>pelanggan/tambah_aksi">
                                <fieldset class="uk-fieldset">
                            
                                    <legend class="uk-legend">Tambah Pelanggan</legend>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">ID</label>
                                        <div class="uk-form-controls">
                                            <?php echo $id; ?>
                                            <input class="uk-input" id="form-stacked-text" type="hidden" name="id" value="<?php echo $id; ?>">
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Nama</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="text" name="nama" placeholder="Nama" required>
                                        </div>
                                    </div>
                                    
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Username</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="text" name="username" placeholder="Username" required>
                                        </div>
                                    </div>
                                    
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Password</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="password" name="password" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">No Telp</label>
                                        <div class="uk-form-controls">
                                            <input class="uk-input" id="form-stacked-text" type="number" name="no_telp" placeholder="No Telp" required>
                                        </div>
                                    </div>
                                    <div class="uk-margin">
                                        <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                                        <div class="uk-form-controls">
                                            <textarea class="uk-textarea" name="alamat" required></textarea>
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