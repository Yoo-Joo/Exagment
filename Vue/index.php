<!DOCTYPE html>
<html>
 <head>
  <title>Live Bootstrap 4 Table Row Reorder with PHP using Ajax jQuery</title>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" type="text/css">
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
 </head>
 <body>

 <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #304B5F;
  padding: 20px;
}
.wrapper{
  background: #fff;
  padding: 25px;
  max-width: 460px;
  width: 100%;
  border-radius: 3px;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}
.wrapper .item{
  color: #fff;
  display: flex;
  margin-bottom: 8px;
  padding: 12px 17px;
  background: #304B5F;
  border-radius: 3px;
  align-items: center;
  justify-content: space-between;
}
.wrapper .item:last-child{
  margin-bottom: 0px;
}
.wrapper .item .text{
  font-size: 18px;
  font-weight: 400;
}
.wrapper .item i{
  font-size: 18px;
  cursor: pointer;
}

 </style>

  <br />
  <br />
  <div class="container">
   <h3 align="center">Live Bootstrap 4 Table Row Reorder with PHP using Ajax jQuery</h3>
   <br />
   <div class="card">
    <div class="card-header">Live Table Row Reorder</div>
    <div class="card-body">
     <div class="table-resposive">
      <table class="table table-striped table-bordered">
       <thead style="cursor: ">
        <tr>
         <th>Id</th>
         <th>Date</th>
        </tr>
       </thead>
       <tbody style="cursor: all-scroll;"></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:'fetch_data'},
   dataType:'json',
   success:function(data)
   {
    var html = '';
    for(var count = 0; count < data.length; count++)
    {
     html += '<tr id="'+data[count].id_affectation+'">';
     html += '<td>'+data[count].id_affectation+'</td>';
     html += '<td>'+data[count].date_aff+'</td>';
     html += '</tr>';
    }
    $('tbody').html(html);
   }
  })
 }

 $('tbody').sortable({
  placeholder : "ui-state-highlight",
  update : function(event, ui)
  {
   var id_affecation_array = new Array();
   $('tbody tr').each(function(){
    id_affectation_array.push($(this).attr('id'));
   });

   $.ajax({
    url:"action.php",
    method:"POST",
    data:{id_affectation_array:id_affectation_array, action:'update'},
    success:function()
    {
     load_data();
    }
   })
  }
 });

});
</script>

