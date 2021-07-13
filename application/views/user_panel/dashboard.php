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
                                    <div class="uk-width-1-1 uk-text-center heading">Jumlah Pelanggan</div>
                                    <div class="uk-width-1-1 uk-text-center value"><?php echo $jml_pelanggan; ?></div>
                                </div>
                            </div>
                        </div>

                        <?php echo $this->session->userdata('dawet_level');
                        