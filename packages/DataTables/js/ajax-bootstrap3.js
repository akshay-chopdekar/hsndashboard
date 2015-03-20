'use strict';

$(document).ready(function () {
    var responsiveHelper = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone : 480
    };
    var tableElement = $('#example');

    tableElement.dataTable({
        processing: true,
        serverSide: true,
        pagingType: "input",
        autoWidth      : false,
        ajax           : 'scripts/server_processing.php',
        preDrawCallback: function () {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper) {
                responsiveHelper = new ResponsiveDatatablesHelper(tableElement, breakpointDefinition);
            }
        },
        rowCallback    : function (nRow) {
            responsiveHelper.createExpandIcon(nRow);
        },
        drawCallback   : function (oSettings) {
            responsiveHelper.respond();
        }
    });
});


//To add entry into table
$(document).ready(function() {
  var userId;
  var table = $('#example').DataTable();

  $('#example tbody').on('click', 'tr', function() {
    $('#myModal').modal();
    if ($(this).hasClass('success')) {
      $(this).removeClass('success');
    } else {
      table.$('tr.success').removeClass('success');
      $(this).addClass('success');
    }
    userId=$(this).find('td').eq(0).text();/*Get userId for blocking user*/

    $('#userId').html(($(this).find('td').eq(0).text()));
    $('#userName').html(($(this).find('td').eq(1).text()));
    $('#blockedStatus').html(($(this).find('td').eq(2).text()));
  });

  $('#rowcount').click(function() {
    alert(table.rows('.success').data().length + ' row(s) selected');
  });

  $('#delete').click(function() {
    $('tr.success').each(function() {
      alert($(this).find('td').eq(0).text());
    });
    table.row('.success').remove().draw(false);
  });



  $('#blockUser').click(function(){
     $.ajax({
       url: "../php/blockuser.php",
       async: false,
       data : {
         userId : userId
       },
       type : "POST",
       dataType:"json",
    })
    .done(function(data) {    
      //alert(data.response);
    })
    .fail(function() {
      //alert(data.response);
    })
    $('#myModal').modal('hide');
    $("#example").DataTable().draw();
  });
});