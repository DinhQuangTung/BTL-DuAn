$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.document-name, .preview-button').on('click', function() {
    $.ajax({
      type: 'POST',
      url: '/documents/learned',
      data: {
        lessonId: $(this).data('lesson-id'),
        documentId: $(this).data('document-id'),
      },
      dataType: 'json',
      success: function (response) {
        $('#progressBarDocument').css('width', response.percentage + '%');
        $('#progressBarDocument').html(response.percentage + '%');
      }
    })
  });
});

$('.delete-document').on('click', function () {
  $('#deleteDocumentForm').attr('action', 'http://127.0.0.1:8000/lessons/' + $(this).attr('data-lesson-id') + '/documents/' + $(this).attr('value'));
  // alert($('#deleteDocumentForm').attr('action'));
  // alert($(this).attr('data-lesson-id'));
});
  