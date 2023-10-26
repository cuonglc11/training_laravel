function addCategory() {
    var name = $('#nameCategory').val();
    var formData = new FormData($('#yourFormId')[0]);
    var fileInput = $('#fileInput')[0].files[0];
    formData.append('name', name);
    formData.append('image', fileInput);
    sentData('category/store', formData, 'POST', function (response) {
        location.reload();
    }, function (error) {
    })

}

function showEditCategory(id, name) {
    styleModel(name, 'Upload Category', id, 'none', 'none', 'none', 'block', 'none')
}

function showAddCategory() {
    styleModel('', 'Upload Category', '', 'block', 'block', 'block', 'none', 'block')
}

function uploadCategory() {
    var name = $('#nameCategory').val();
    var id = $('#idCategory').val();
    var formData = new FormData($('#yourFormId')[0]);
    formData.append('name', name);
    formData.append('id', id);
    sentData('category/update', formData, 'POST',function (response) {
        location.reload();
    }, function (error) {
    })
}

function deleteCategory(id) {
    var formData = new FormData();
    formData.append('id', id);
    sentData('category/destroy', formData, 'POST',function (response) {
        location.reload();
    }, function (error) {
    })
}

function styleModel(name, text, idCategory, customFile, avt, imgAvt, upload, save) {
    $("#exampleModalToggle").modal('show');
    $('#nameCategory').val(name);
    $('#titile').text(text);
    $('#idCategory').val(idCategory);
    $('#custom-file').css('display', customFile);
    $('#avt').css('display', avt);
    $('#img_avt').css('display', imgAvt);
    $('#upload').css('display', upload);
    $('#save').css('display', save);

}
