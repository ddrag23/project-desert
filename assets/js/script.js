$(document).ready(function() {
	$('.tambahProduk').on('click', function() {
			$('#formModalLabel').html('Tambah Data Barang');
			$('.modal-footer button[type=submit]').html('Tambah Data');
			$('#nama').val('');
			$('#kategori').val('');
			$('#harga').val('');
			$('#deskripsi').val('');
			$('#gambar').val('');
			$('#id').val('');
	});


	$('.tampilModalUbah').on('click', function() {
			$('#formModalLabel').html('Ubah Data Barang');
			$('.modal-footer button[type=submit]').html('Ubah Data');
			$('.modal-body form').attr('action', "http://localhost/project-desert/produk/edit");

			const id_produk = $(this).data('id_produk');

			$.ajax({
					url: "http://localhost/project-desert/produk/getUbah",
					data: {id_produk : id_produk},
					method: 'post',
					dataType: 'json',
					success: function(data) {
							$('#nama').val(data.nama);
							$('#kategori').val(data.kategori);
							$('#harga').val(data.harga);
							$('#deskripsi').val(data.deskripsi);
							$('#id_produk').val(data.id_produk);
					}
			});

	});

});
