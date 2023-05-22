// flash data
const flashData = $('.flash-data').data('flashdata');
if (flashData) {
	Swal.fire({
	  icon: 'success',
	  title: 'Mantap',
	  text: ''+flashData,
	  showConfirmButton: true,
	});
}
// end flash data

// flash data
const flashDataHapus = $('.flash-data-hapus').data('flashdata');
if (flashDataHapus) {
	Swal.fire({
	  icon: 'success',
	  title: ''+flashDataHapus,
	  showConfirmButton: false,
	  timer: 2800,
	});
}
// end flash data

// tombol hapus
$('.hapus').on('click',function(e){
	e.preventDefault();
	const href = $(this).attr('href');
	// const diatas untuk mengambil atribut href pada elemen a yang saya klik

	Swal.fire({
	  title: 'Anda Yakin Menghapus Data?',
	  text: "Anda Tidak Akan Bisa Mengembalikan Data ini !!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya Hapus',
	  cancelButtonText: 'Batal',
	}).then((result) => {
	  if (result.isConfirmed) {
	    document.location.href=href;
	  }
	});
});
// end tombol hapus

// tombol tidak setuju
$('.tidak_setuju').on('click',function(e){
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: 'Yakin Pinjaman Tidak Disetujui ?',
	  text: "Anda Tidak Akan Bisa Mengubah Keputusan ini !!",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Ya',
	  cancelButtonText: 'Batal',
	}).then((result) => {
	  if (result.isConfirmed) {
	    document.location.href=href;
	  }
	});
});
// end tombol tidak setuju

// user access menu chekcbox

$(".user_access").on('click',function(){
	const role_id = $(this).data('role_id');
	const menu_id = $(this).data('menu_id');

	// $(this).data('role_id');
	// artinya jquery ambil data yang saat ini sedang diklik, datanya berupa role_id yang ditulis didalam htmlnya
	$.ajax({
		url:"../ubah_akses",
		type:"POST",
		data:{
			role_id: role_id,
			menu_id: menu_id
		},
		success: function() {
			document.location.href='' + role_id;
		}
	});
});

// v_menu status aktif
$('.statusMenu').on('click',function(){
	const aktif = $(this).data('active');
	const id_submenu = $(this).data('id_submenu');
	$.ajax({
		url:"menu/ubah_menu",
		type:"POST",
		data:{
			aktif:aktif,
			id_submenu:id_submenu,
		},

		success: function(){
			document.location.href='';
		}
	});
});

// end v_menu status aktif

// detail menu
// akses
$('.sub_menu_access').on('click',function(){
	const role_id = $(this).data('role_id');
	const id_submenu = $(this).data('id_submenu');
	$.ajax({
		url:"../akses_submenu",
		type:"POST",
		data:{
			role_id:role_id,
			id_submenu:id_submenu,
		},

		success: function(){
			document.location.href='';
		}
	});
});
// end akses

// status
$('.submenu_active').on('click',function(){
	const id_submenu = $(this).data('id_submenu');
	$.ajax({
		url:"../sm_active",
		type:"POST",
		data:{
			id_submenu:id_submenu,
		},

		success: function(){
			document.location.href='';
		}
	});
});
// end status

// end detail menu


// ========>> perhitungan pengembalian buku

const tgl_kembali = $('.tgl_kembali').val();
const tgl_pinjam = $('#tgl_pinjam').val();
if (tgl_kembali) {

	let tgl1 = new Date(tgl_kembali);
	let tgl2 = new Date(tgl_pinjam);
	let max = $('#max_day').val();

	let beda = tgl1.getTime() - tgl2.getTime();
	let selisih = beda / (1000*3600*24)-max;
	if (selisih > 0) {

		let denda = $('#denda').val();
		let jml_buku = $('#jml_buku').val();
		let bayar = denda*selisih*jml_buku;

		let text = "Terlambat selama "+selisih+" hari";
		let rp = "Denda yang harus dibayar Rp."+bayar;
		$('.terlambat').text(text);
		$('.denda').text(rp);
		$('#jml_denda').val(bayar);
		$('#terlambat').val(selisih);
	}
}

$('.tgl_kembali').on('change',function(){
	let kembali_tgl = $('.tgl_kembali').val();

	let tgl1 = new Date(kembali_tgl);
	let tgl2 = new Date(tgl_pinjam);
	let max = $('#max_day').val();

	let beda = tgl1.getTime() - tgl2.getTime();
	let selisih = beda / (1000*3600*24)-max;
	let denda = $('#denda').val();

	let jml_buku = $('#jml_buku').val();
	let bayar = denda*selisih*jml_buku;
	if (selisih > 0) {
		let text = "Terlambat selama "+selisih+" hari";
		let rp = "Denda yang harus dibayar Rp."+bayar;
		$('.terlambat').text(text);
		$('.denda').text(rp);
		$('#jml_denda').val(bayar);
		$('#terlambat').val(selisih);
	} else
		{
			$('.terlambat').text('');
			$('.denda').text('');
			$('#jml_denda').val('');
			$('#terlambat').val('');
		}
});

// =======>> end perhitungan

// notification

$('#tombol_hari').on('click',function(){
	$.ajax({
		url:"../notif",
		type:"POST",
		data:{},
		dataType:"json",
		success: function(data){
			$.each(data,function(){
				$('#notif').text(data.jml);
			});
		},
	});
});
// end notification