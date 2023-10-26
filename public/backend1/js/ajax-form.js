$(document).ready(function () {
    $('#fileInput').change(function () {
        var input = this;
        var url = URL.createObjectURL(input.files[0]);
        $('#preview-image').attr('src', url);
    });
});

function sentData(url, formData, type ,successCallback ,errorCallback) {
        $.ajax({
            type: type,
            url: url,
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                successCallback(response)
            },
            error: function (err) {
                errorCallback(err)
            }

        })
}

