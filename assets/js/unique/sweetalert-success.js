// SweetAlert Success Message
const flashData = $('#flash-msg').data('flashdata');
const formName = $('#flash-msg').data('form');

// console.log(formName);

if (flashData) {
  Swal.fire({
    title: formName + ' Data ',
    text: 'Successfully ' + flashData,
    type: 'success'
  });
}