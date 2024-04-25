
$("li").click(function () {
  $(this).addClass("active").siblings().removeClass("active");
});

$(function () {
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 50) {
      $(".header").addClass("changeHeader");
    } else {
      //remove the background property so it comes transparent again (defined in your css)
      $(".header").removeClass("changeHeader");
    }
  });
});

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

function openForm1() {
  document.getElementById("myForm1").style.display = "block";
}

function closeForm1() {
  document.getElementById("myForm1").style.display = "none";
}

//multiple table column search
function search() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    var tds = tr[i].getElementsByTagName("td");
    var found = false;
    for (var j = 0; j < tds.length; j++) {
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          found = true;
        }
      }
    }
    if (found) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}

function search1() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
    var tds = tr[i].getElementsByTagName("td");
    var found = false;
    for (var j = 0; j < tds.length; j++) {
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          found = true;
        }
      }
    }
    if (found) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}

function pharmacyMedicineSearch() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function showPassword() {
  var x = document.getElementById("password");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function checkPassword() {
  const passwordInput = document.getElementById("password");
  const showPasswordCheckbox = document.getElementById("showPassword");

  showPasswordCheckbox.addEventListener("change", function () {
    if (showPasswordCheckbox.checked) {
      passwordInput.type = "text";
    } else {
      passwordInput.type = "password";
    }
  });
}

function preventEditMED() {
        var refnoInput = document.getElementById('refno');
        if (!refnoInput.value.startsWith('MED')) {
            refnoInput.value = 'MED' + refnoInput.value.replace(/[^a-zA-Z0-9]/g, '');
        }
    }

    function preventEditBCH() {
      var refnoInput = document.getElementById('batchNo');
      if (!refnoInput.value.startsWith('BCH')) {
          refnoInput.value = 'BCH' + refnoInput.value.replace(/[^a-zA-Z0-9]/g, '');
      }
  }



