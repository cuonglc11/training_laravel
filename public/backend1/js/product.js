$(document).ready(function () {
    $('#fileImageProduct').change(function () {
        var input = this;
        var url = URL.createObjectURL(input.files[0]);
        $('#preview-image').attr('src', url);
    });
});

function addProduct() {
    var formData = new FormData($('#productFrom')[0]);
    var fileInput = $('#fileImageProduct')[0].files[0];
    formData.append('name', $('#nameProduct').val())
    formData.append('category', $('#category').val())
    formData.append('image', fileInput);
    formData.append('price', $('#priceProduct').val());
    sentData('product/create', formData, 'POST', function (response) {
        location.reload();
    }, function (error) {
    })
}

function showProduct(id) {
    var formData = new FormData();
    formData.append('id', id);
    sentData('product/show', formData, 'POST', function (response) {
        console.log(response.data)
        show(response.data.name, response.img, response.data.id_category, response.data.price, 'Edit Product', 'block',
            'none', response.data.id)
    }, function (error) {

    })
}

function showAdd() {
    show('', '', '', '', 'Add Product', 'none', 'block', '')
}

function show(name, img, category, priceProduct, text, upload, save, id) {
    $("#exampleModalToggle").modal('show');
    $("#nameProduct").val(name);
    $('#preview-image').attr('src', img);
    $('#category').val(category);
    $('#idProduct').val(id);
    $('#titile').text(text)
    $("#priceProduct").val(priceProduct)
    $('#upload').css('display', upload);
    $('#save').css('display', save);

}

function uploadProduct() {
    var formData = new FormData($('#productFrom')[0]);
    var fileInput = $('#fileImageProduct')[0].files[0];
    formData.append('id', $('#idProduct').val())
    formData.append('name', $('#nameProduct').val())
    formData.append('category', $('#category').val())
    formData.append('image', fileInput);
    formData.append('price', $('#priceProduct').val());
    sentData('product/update', formData, 'POST', function (response) {
        location.reload();
    }, function (error) {
          alert('lỗi hệ thống')
    })
}
function deleteProduct(id) {
    var formData = new FormData();
    formData.append('id', id);
    sentData('product/destroy', formData, 'POST',function (response) {
        location.reload();
    }, function (error) {
    })
}
