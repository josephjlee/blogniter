$('.form-check-input').on('click', function() {
  const roleId = $(this).data('role');
  const menuId = $(this).data('menu');
  const baseUrl = $('#metadata').data('base-url');

  console.log(baseUrl);

  $.ajax({
    url: baseUrl + 'access/change_access',
    type: 'post',
    data: {
      roleId: roleId,
      menuId: menuId
    },
    success: function() {
      document.location.href = baseUrl + 'access/manage/' + roleId;
    }
  });

});