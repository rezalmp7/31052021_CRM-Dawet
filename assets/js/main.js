$(document).ready(function () {
    $('#data-table').DataTable();
});
$(document).ready(function () {
    $('.select2').select2();
});

$(document).ready(function () {
    $('#tambah_pelanggan').hide();
    $('.select_pelanggan').on('change', function () {
        var value = $(this).val();

        if(value == 'tambah_pelanggan')
        {
            $('#tambah_pelanggan').show();
            $('input[name="nama"]').attr("required", true);
            $('input[name="no_telp"]').attr("required", true);
            $('input[name="alamat"]').attr("required", true);
        }
        else
        {
            $('#tambah_pelanggan').hide();
            $('input[name="nama"]').attr("required", false);
            $('input[name="no_telp"]').attr("required", false);
            $('input[name="alamat"]').attr("required", false);
        }
    });
})