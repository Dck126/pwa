<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
     <div class="row">
          <div class="col">
               <div class="clock">
                    <div class="inside">
                         <div class="content">
                              <center>
                                   <p class='days'><span id="sun">SUN</span>&nbsp;<span id="mon">MON</span>&nbsp;<span id="tus">TUS</span>&nbsp;<span id="wed">WED</span>&nbsp;<span id="thu">THU</span>&nbsp;<span id="fri">FRI</span>&nbsp;<span id="sat">SAT</span></p>
                                   <br>
                                   <p class='text'><span id='hours'></span>:<span id='min'></span>:<span id='sec'></span>&nbsp;&nbsp;<span id='time'></span></p>
                                   <p id=date>
                                        <span id='cal'><i class="fa fa-calendar"></i></span>
                                        <span id='day'></span>
                                        <span id='month'></span>
                                        <span id='year'></span>
                                   </p>
                              </center>
                         </div>
                    </div>
                    <center>
                         <font face="Times New Roman">
                              <font size="4">
                                   <h2>Dicky Ikbal Pratama</h2>
                                   <p>Untuk melihat fitur cartoon & orang di harapkan untuk login</p>
                                   <h1>
                                        <center><img src="img/kucing.png" width="500px" height="400px"></center>
                                   </h1>
                              </font>
                         </font>
                    </center>
               </div>
          </div>
     </div>
</div>
<script type="text/javascript">
     var daysofweek = ['sun', 'mon', 'tus', 'wed', 'thu', 'fri', 'sat'];
     var month = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

     function clock() {
          // setting up my variables
          var today = new Date();
          var h = today.getHours();
          var m = today.getMinutes();
          var s = today.getSeconds();
          var day = h < 11 ? 'AM' : 'PM';
          var daytoday = today.getDay();
          var date = today.getDate();
          var mon = today.getMonth();
          var year = today.getFullYear();

          // adding leading zeros to them
          h = h < 10 ? '0' + h : h;
          m = m < 10 ? '0' + m : m;
          s = s < 10 ? '0' + s : s;

          // writing it down in the document
          document.getElementById('hours').innerHTML = h;
          document.getElementById('min').innerHTML = m;
          document.getElementById('sec').innerHTML = s;
          document.getElementById('time').innerHTML = day;
          document.getElementById('' + daysofweek[daytoday] + '').style.color = '#000000';
          document.getElementById('day').innerHTML = date;
          document.getElementById('month').innerHTML = month[mon];
          document.getElementById('year').innerHTML = year;

     }
     var inter = setInterval(clock, 400);
</script>

<?= $this->endSection(); ?>