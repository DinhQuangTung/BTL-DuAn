$(function () {
  // Activate tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Select/Deselect checkboxes
  var checkbox = $('table tbody input[type="checkbox"]');
  $("#selectAll").on('click', function () {
    if (this.checked) {
      checkbox.each(function () {
        this.checked = true;
      });
    } else {
      checkbox.each(function () {
        this.checked = false;
      });
    }
  });

  checkbox.on('click', function () {
    if (!this.checked) {
      $("#selectAll").prop("checked", false);
    }
  });

  $("ul.tab-bar > li > a").on("shown.bs.tab", function (e) {
    var id = $(e.target).attr("href").substr(1);
    window.location.hash = id;
  });

  var hash = window.location.hash;

  $("#managementSearch").on("submit", function () {
    $(hash).tab('show');
  })
});

$('.btn-user').on('click', function () {
  var post = $(this);
  var userId = post.attr('value');
  console.log(userId);
  $('.value-id').attr('value', userId);
});

$('.btn-course').on('click', function () {
  var post = $(this);
  var userId = post.attr('value');
  console.log(userId);
  $('.value-id').attr('value', userId);
});