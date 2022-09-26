$('#editForm').on('submit', function (e) {

  if(!validateEditForm()) {
       e.preventDefault();
  }
});

function validateEditForm()
{
  var result = confirm('Are you sure you want to delete this question?');

    // I do not know what result returns but in case that yes is true
    if (result === true) {
        $('#delete_form').submit();
    }
}

// function validate(aCheckBox) {
//   if (aCheckBox.checked) {
//     alert("checked");
//   } else {
//     alert("You didn't check it! Let me check it for you.");
//   }
// }    