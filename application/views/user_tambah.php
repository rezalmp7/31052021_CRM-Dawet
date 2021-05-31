
                <div class="uk-width-1-1 uk-padding-remove uk-margin-remove">
                    <div class="uk-width-1-1 uk-padding-large uk-margin-remove body-content">
                        <div class="uk-padding-small uk-border-rounded segmen-body">
                            <form method="POST" action="<?php echo base_url(); ?>user/tambah_aksi">
                                <fieldset class="uk-fieldset">
                            
                                    <legend class="uk-legend">Tambah User</legend>
                            
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
                                        <label class="uk-form-label" for="form-stacked-text">Level</label>
                                        <div class="uk-form-controls">
                                            <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
                                                <label><input class="uk-radio" type="radio" name="level" value="1" checked> Admin</label>
                                                <label><input class="uk-radio" type="radio" name="level" value="2"> Super Admin</label>
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