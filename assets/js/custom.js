// Sweetalert2
$(".tombol-delete").on("click", function (e) {
	e.preventDefault();

	const href = $(this).attr("href");

	Swal.fire({
		title: "Apakah anda yakin?",
		text: "Data akan dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data!",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
// end of Sweetalert2

// daftarpegawai
$(document).ready(function () {
	$("#pilihPegawaiSimuk").change(function () {
		var id = $(this).val();
		$.ajax({
			url: "<?= base_url('index.php/admin/getIdPegawai') ?>",
			method: "POST",
			data: {
				id: id,
			},
			async: true,
			dataType: "json",
			success: function (data) {
				var html = "";
				var i;
				for (i = 0; i < data.length; i++) {
					html +=
						"<option value=" +
						data[i].id_pegawai +
						">" +
						data[i].id_pegawai +
						"</option>";
				}
				$("#idPegawaiSimuk").html(html);
			},
		});
		return false;
	});
});
