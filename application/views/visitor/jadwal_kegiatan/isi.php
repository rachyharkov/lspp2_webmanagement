<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
<style>

.recommended {
    animation: owoglow 800ms infinite alternate;
}

@keyframes owoglow {
  from {
    box-shadow: 1px 1px 5px -5px #fff;
  }
  to {
    box-shadow: 1px 1px 5px 5px #fff;
  }
}

.fc-col-header-cell-cushion, .fc-daygrid-day-number {
	text-decoration: none;
	color: black;
}

</style>
<script src="<?php echo base_url() ?>assets/plugins/moment/min/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.min.js"></script>

<div class="container mt-4">
  <h3>JADWAL KEGIATAN</h3>
	<div id="calendar" class="calendar"></div>
</div>

<div class="modal fade" id="detailKegiatanModal" tabindex="-1" aria-labelledby="detailKegiatanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailKegiatanModalLabel">Detail Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$('.close-moddal').click(function() {
  $(".modal").modal("hide")
  $('.modal-title').text('...')
  $('.modal-body').html('')
})

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    initialDate: moment().format('YYYY-MM-DD'),
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    events:[
      <?php $classnyak->getallschedule() ?>
      {
        title: 'Long Event',
        start: '2021-12-07',
        end: '2021-12-10'
      },
    ],
    eventClick: function(info) {
      info.jsEvent.preventDefault(); // don't let the browser navigate
      $('#detailKegiatanModal').modal('toggle');
      $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>Menu/getdetailschedule/" + info.event.id,
        success: function(data){
          var dt = JSON.parse(data)
          $('.modal-title').text(dt.judul_kegiatan)
          var string = `
            <table class="table table-borderless text-dark">
              <tr>
                <td>Judul Kegiatan</td>
                <td>:</td>
                <td>${dt.judul_kegiatan}</td>
              </tr>
              <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>${dt.tanggal_mulai} - ${dt.tanggal_akhir}</td>
              </tr>
              <tr>
                <td>Detail</td>
                <td>:</td>
                <td>${dt.detail_kegiatan}</td>
              </tr>
            </table>
            `;

            $('.modal-body').html(string)
        },
        error: function(error) {
          alert('Error occured!')
        }
      });
    }
  });

  calendar.render();
});

</script>