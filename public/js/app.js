$('#myform').on('submit', function (e) {
     
    e.preventDefault();

    var me = $(this),
        url = me.attr('action'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').text('Create');

    // $.ajax({
    //     url: url,
    //     dataType: 'html',
    //     success: function (response) {
    //         $('#modal-body').html(response);
    //     }
    // });
    var NPWP   = $('#txt_npwp').val();
    $.ajax({
    url      : url,
    type     : 'GET',
    dataType : 'html',
    data     : 'NPWP='+NPWP,
    success  : function(respons){
        $('#modal-body').html(respons);
    },
})

    $('#myModal').modal('show');
}); 
