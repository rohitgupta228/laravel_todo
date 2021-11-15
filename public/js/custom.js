$(document).ready(function () {
  $(".todo-form").each(function () {
    $(this).validate({
      rules: {
        title: {
          required: true,
        },
        body: {
          required: true,
        },
        due_date: {
          required: true,
        },
      },
      messages: {
        title: {
          required: "Please enter title.",
        },
        body: {
          required: "Please enter a body.",
        },
        due_date: {
          required: "Please enter due date.",
        },
      },
      errorElement: "span",
      errorClass: "todo-error",
      onkeyup: function (element) {
        $(element).valid();
      },
      errorPlacement: function (error, element) {
        element.parent().closest("div.form-group").addClass("has-error");
        element.parent().closest("div.form-group").append(error);
      },
      success: function (element) {
        element.parent().closest("div.form-group").removeClass("has-error");
        element
          .parent()
          .closest("div.form-group")
          .find("span.help-block:first")
          .remove();
      },
    });
  });
});

$("#create_todo").on("submit", function (e) {
  e.preventDefault();
  var formData = getPayload();
  $.ajax({
    url: createTodo,
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      window.location.href = "/todo";
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log("error");
    },
    complete: function () {},
  });
});

$("#update_todo").on("submit", function (e) {
  e.preventDefault();
  var formData = getPayload();
  formData.append("todo_id", $("#todo_id").val());
  $.ajax({
    url: updateTodo,
    method: "POSt",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      window.location.href = "/todo";
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      console.log("error");
    },
    complete: function () {},
  });
});

function getPayload() {
  var files = $("#attachment")[0].files;
  var formData = new FormData();
  formData.append("file", files[0]);
  formData.append("title", $("#title").val());
  formData.append("body", $("#body").val());
  formData.append("due_date", $("#due_date").val());
  formData.append("user_id", logged_user_details.id);
  formData.append("completed", $("#completed").prop("checked") ? 1 : 0);
  return formData;
}
