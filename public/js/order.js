  $(document).ready(function() {
    $(".addBtn").on("click", function() {
      var medicineName = $("input[name='Mname']").val();
      if (medicineName) {
        // Create a new form element
        var form = $('<form></form>');
        form.attr('method', 'POST');
        form.attr('action', 'your_post_url_here'); // Replace with the actual URL to send the POST request to
        // Create a hidden input field for the medicine name
        var input = $('<input>');
        input.attr('type', 'hidden');
        input.attr('name', 'medicineName');
        input.attr('value', medicineName);
        // Append the input field to the form
        form.append(input);
        // Append the form to the document and submit it
        $(document.body).append(form);
        form.submit();
      }
    });
  });
