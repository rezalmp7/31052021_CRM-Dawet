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
                        <div class="uk-width-1-1 uk-padding uk-padding-remove-horizontal uk-margin-remove">
                            <div class="uk-width-1-1 uk-padding-small uk-margin-remove segmen-body">
                                <canvas id="chartjs" class="uk-width-1-1"></canvas>
                            </div>
                        </div>
                        
                <script>
                    var ctx = document.getElementById('chartjs').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                datasets: [{
                                    label: 'Pesanan Perbulan',
                                    data: [<?php echo $month_1; ?>, <?php echo $month_2; ?>, <?php echo $month_3; ?>, <?php echo $month_4; ?>, <?php echo $month_5; ?>, <?php echo $month_6; ?>, <?php echo $month_7; ?>, <?php echo $month_8; ?>, <?php echo $month_9; ?>, <?php echo $month_10; ?>, <?php echo $month_11; ?>, <?php echo $month_12; ?>],
                                    backgroundColor: [
                                        'rgba(55, 81, 255, 0.3)',
                                    ],
                                    borderColor: [
                                        'rgba(55, 81, 255, 1)',
                                    ],
                                    fill: true,
                                    borderWidth: 2
                                }]
                            },
                            options: {
                                tension: 0.5,
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                </script>