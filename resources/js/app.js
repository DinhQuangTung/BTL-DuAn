import 'slick-carousel/slick/slick.min.js';
import 'select2/dist/js/select2.min.js';
require('./bootstrap');
require('./home');
require('./all_courses');
require('./course_detail');
require('./documents');
require('./profile');
require('./review');
require('./management');

$(".btn-approve").on('click', function(){
    var post = $(this);
    var courseId = $(this).val();
    $.ajax({
        method: "POST",
        url: "http://127.0.0.1:8000/admin/approve-course/" + courseId,
        data: $(this).val(),
        success : function(response){
            post.text(response);
            if (response == 'approved') {
                post.addClass('bg-white text-dark');
            } else {
                post.removeClass('bg-white text-dark');
            }
        }
    });
});
