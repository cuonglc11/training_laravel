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

function showEditCategory(id) {
    var formData = new FormData();
    formData.append('id', id)
    sentData('category/show', formData, 'POST', function (response) {
        console.log(response);
        styleModel(response.data.name, 'Upload Category', id, response.img, 'block', 'none')

    }, function (error) {
        alert('lỗi hệ thống');
    })
}

function showAddCategory() {

    styleModel('', 'Add Category', '', '', 'none', 'block')
}

function uploadCategory() {
    var name = $('#nameCategory').val();
    var id = $('#idCategory').val();
    var formData = new FormData($('#yourFormId')[0]);
    formData.append('name', name);
    formData.append('id', id);
    sentData('category/update', formData, 'POST', function (response) {
        location.reload();
    }, function (error) {
    })
}

function deleteCategory(id) {
    var formData = new FormData();
    formData.append('id', id);
    sentData('category/destroy', formData, 'POST', function (response) {
        location.reload();
    }, function (error) {
    })
}

function styleModel(name, text, idCategory, imgAvt, upload, save) {
    $("#exampleModalToggle").modal('show');
    $('#nameCategory').val(name);
    $('#titile').text(text);
    $('#preview-image').attr('src', imgAvt);
    $('#idCategory').val(idCategory);
    $('#upload').css('display', upload);
    $('#save').css('display', save);

}
