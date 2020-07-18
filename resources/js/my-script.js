/* ================================================================
// Kode untuk menampilkan nama file pada form yang menggunakan
// custom file upload Bootstrap, dipakai dalam form register dan update
*/

$('input[type="file"]').on('change', function () {
    let filenames = [];
    let files = document.getElementById('gambar_profil').files;

    for (let i in files) {
        if (files.hasOwnProperty(i)) {
            filenames.push(files[i].name);
        }
    }

    $(this).next('.custom-file-label').addClass("selected").
    html(filenames.join(',    '));
});

/* ================================================================
// Kode untuk membuat gambar pilihan background profil bisa dipilih
// Dipakai dalam form register dan update
*/

$('.pilihan-background-profil').click(function(){
    let nomorGambar = this.children[0].innerHTML;
    $('#background_profil').val(nomorGambar);
})

// ================================================================
// Kode utuk menampilkan form modal konfirmasi saat tombol delete di klik
// Dipakai dalam halaman home

// Jika tombol Hapus di klik, generate alamat URL untuk proses delete.
// idHapis disini adalah id user yang akan di delete

$('.btn-hapus').click(function(){
    let idHapus = $(this).attr('data-id');
    $("#deleteForm").attr('action', '/users/'+idHapus);
})

// Jika tombol "Ya, Hapus" di klik, submit form

$('#deleteForm [type="submit"]').click(function(){
    $("#deleteForm").submit();
})
