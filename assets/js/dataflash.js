const flasData = $('.flash-data').data('flashdata');
const flasDataError = $('.flash-data2').data('flashdata2');


if(flasData){
	Swal.fire(
	  'Berhasil',
	  flasData,
	  'success'
	)
}

if(flasDataError){
	Swal.fire(
	  'Terjadi Kesalahan',
	  flasDataError,
	  'error'
	)
}
