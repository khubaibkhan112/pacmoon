var formMode = 'add';
var mainUrl = $('meta[name="main_url"]').attr('content');
var csrf = $('meta[name="csrf-token"]').attr('content');
(function () {
    var addRoleForm = document.getElementById('addRoleForm');
    var fv = FormValidation.formValidation(addRoleForm, {
        fields: {
            modalRoleName: {
                validators: {
                    notEmpty: {
                        message: 'Please enter role name'
                    }
                }
            }
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap5: new FormValidation.plugins.Bootstrap5({
                eleValidClass: '',
                rowSelector: '.col-12'
            }),
            submitButton: new FormValidation.plugins.SubmitButton(),
            autoFocus: new FormValidation.plugins.AutoFocus()
        }
    });
    const selectAll = document.querySelector('#selectAll'),
        checkboxList = document.querySelectorAll('[type="checkbox"]');

    selectAll.addEventListener('change', function (event) {
        checkboxList.forEach(function (checkbox) {
            checkbox.checked = event.target.checked;
        });
    });
    addRoleForm.addEventListener('submit', function (event) {
        event.preventDefault();
        fv.validate().then(function (status) {
            if (status === 'Valid') {
                if (formMode === 'add') {
                    var formData = {
                        roleName: $('#modalRoleName').val(),
                        permissionIds: getSelectedPermissionIds(),
                    };

                    $.ajax({
                        url: mainUrl+"/roles",
                        type: 'POST',
                        dataType: 'json',
                        data : formData,
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        success: function(data) {
                            $('.invalid-feedback').empty().hide();
                            if (data.message) {
                                $('.invalid-feedback').empty().hide();
                                console.log('Role Created successfully');
                                location.reload();
                            } else {                                
                                $('.invalid-feedback').html(data.message).show();
                                console.error('Failed to create role: ' + data.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error: ' + error);
                        }
                    });
                } else if (formMode === 'edit') {
                    var id = $('#edit-input').val();
                    var formData = {
                        roleId : id,
                        roleName: $('#modalRoleName').val(),
                        permissionIds: getSelectedPermissionIds(),
                    };
                    $.ajax({
                        url: mainUrl+"/roles"+'/'+id,
                        type: 'PUT',
                        dataType: 'json',
                        data : formData,
                        headers: {
                            'X-CSRF-TOKEN': csrf
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.message) {
                                console.log('Role Updated successfully');
                                location.reload();
                            } else {
                                console.error('Failed to update role: ' + data.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX error: ' + error);
                        }
                    });
                }
            } else {
                console.log('Form is not valid.');
            }
        });
    });
})();
function getSelectedPermissionIds() {
    var selectedPermissionIds = [];
    $('[type="checkbox"]:checked:not(#selectAll)').each(function () {
        selectedPermissionIds.push($(this).val());
    });
    if(selectedPermissionIds.length === 0)
    {
        return selectedPermissionIds[0] = ['0'];
    }else{
        return selectedPermissionIds;
    }
}
function openEditRoleModal(roleData) {
    $('.role-title').empty();
    var decodedObject = JSON.parse(roleData);
    formMode = "edit";
    console.log(formMode);
    $('#addRoleModal').modal('show');
    $('#modalRoleName').val(decodedObject.name);
    decodedObject.permissions.forEach(permissionId => {
        $(`#${permissionId}`).prop('checked', true);
    });
    $('#addRoleForm').append('<input type="hidden" id="edit-input" name="role_id" value="'+decodedObject.id+'"/>')
    $('.role-title').html('Edit Role');
    var isAllCheckbox = $('#addRoleModal').find('input[type="checkbox"]:not(#selectAll)').length;
    var isAnyCheckboxChecked = $('#addRoleModal').find('input[type="checkbox"]:checked:not(#selectAll)').length;
    if (isAllCheckbox === isAnyCheckboxChecked) {
        $('#selectAll').prop('checked', true);
    } else {
        $('#selectAll').prop('checked', false);
    }
}
$(document).ready(function() {
    $('#addRoleButton').click(function() {
        $('.role-title').empty();
        $('#addRoleModal').modal('show');
        formMode = "add";
        $('.role-title').html('Add New Role');
    });
});
function uncheckAllCheckboxes() {
    $('#addRoleModal').modal('hide');
    $('#addRoleModal').find('input[type=checkbox]').prop('checked', false);
    $('#modalRoleName').val('');
    $('#edit-input').remove();
}
$('#addRoleModal').on('hidden.bs.modal', function () {
    uncheckAllCheckboxes();
});
$('#addRoleModal').on('change', 'input[type="checkbox"]:not(#selectAll)', function() {
    var totalCheckboxes = $('#addRoleModal').find('input[type="checkbox"]:not(#selectAll)').length;
    var checkedCheckboxes = $('#addRoleModal').find('input[type="checkbox"]:not(#selectAll):checked').length;
    if (totalCheckboxes === checkedCheckboxes) {
        $('#selectAll').prop('checked', true);
    } else {
        $('#selectAll').prop('checked', false);
    }
});
