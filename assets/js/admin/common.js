switch(window.location.origin){
    case 'http://diamondtour.vn':
        var HOSTNAMEADMIN = 'http://diamondtour.vn/admin';
        break;
    default:
        var HOSTNAMEADMIN = 'http://localhost/soundon/admin';
}
function errorHandle(jqXHR, exception){
    if (jqXHR.status === 0) {
        return ('Not connected.\nPlease verify your network connection.');
    } else if (jqXHR.status == 404) {
        return ('The requested page not found.');
    }  else if (jqXHR.status == 401) {
        return ('Sorry!! You session has expired. Please login to continue access.');
    } else if (jqXHR.status == 500) {
        return ('Internal Server Error.');
    } else if (exception === 'parsererror') {
        return ('Requested JSON parse failed.');
    } else if (exception === 'timeout') {
        return ('Time out error.');
    } else if (exception === 'abort') {
        return ('Ajax request aborted.');
    }
    return ('Unknown error occurred. Please try again.');
}
function remove(controller, id){
    var url = HOSTNAMEADMIN + '/' + controller + '/remove';
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_sitecom_token : document.getElementById('csrf').value
            },
            success: function(response){
                document.getElementById('csrf').value = response.reponse.csrf_hash;
                if(response.status == 200 && response.isExisted == true){
                    console.log(response);
                    console.log(response.message);
                    if(response.message != 'undefined'){
                        alert(response.message);
                    }
                    $('.remove_' + id).fadeOut();
                }
                if(response.status == 200 && response.isExisted == false){
                    alert('Danh mục này có chứa bài viết. Vui lòng xóa bài viết trước sau đó thực hiện lại thao tác');
                }
            },
            error: function(jqXHR, exception){
                if(jqXHR.status == 404 && jqXHR.responseJSON.message != 'undefined'){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }else{
                    console.log(errorHandle(jqXHR, exception));
                }
            }
        });
    }
}
function active(controller, id, question) {
    var url = HOSTNAMEADMIN + '/' + controller + '/active';
    if(confirm(question)){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_sitecom_token : document.getElementById('csrf').value
            },
            success: function(response){
                document.getElementById('csrf').value = response.reponse.csrf_hash;
                if(response.status == 200){
                    switch(controller){
                        case 'post_category' :
                            alert('Bật danh mục thành công');
                            break;
                        case 'product' :
                            alert('Bật thực đơn thành công');
                            break;
                        case 'post' :
                            alert('Bật bài viết thành công');
                            break;
                        case 'product_category' :
                            alert('Bật danh mục thành công');
                            break;
                    }
                    location.reload();
                }
                console.log(response);
            },
            error: function(jqXHR, exception){
                if(jqXHR.status == 404 &&  jqXHR.responseJSON.message != 'undefined '){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }else{
                    console.log(errorHandle(jqXHR, exception));
                }
            }
        });
    }
}

function deactive(controller, id, question) {
    var url = HOSTNAMEADMIN + '/' + controller + '/deactive';
    if(confirm(question)){
        $.ajax({
            method: "post",
            url: url,
            data: {
                id : id, csrf_sitecom_token : document.getElementById('csrf').value
            },
            success: function(response){
                document.getElementById('csrf').value = response.reponse.csrf_hash;
                if(response.status == 200){
                    if(controller == 'post' || controller == 'product'){
                        if(response.reponse.id != undefined){
                            if(confirm(response.message)){
                                location.href = HOSTNAMEADMIN + '/menu/edit/' + response.reponse.id;
                            }
                        }else{
                            alert(response.message);
                            location.reload();
                        }
                    }else{
                        if(response.reponse.id != undefined){
                            if(confirm(response.message)){
                                location.href = HOSTNAMEADMIN + '/menu/edit/' + response.reponse.id;
                            }
                        }else{
                            alert('Tắt bài viết thành công');
                            location.reload();
                        }
                    }
                    // switch(controller){
                    //     case 'post_category' :
                    //         alert('Tắt danh mục thành công');
                    //         break;
                    //     case 'product' :
                    //         if(response.reponse.id != undefined){
                    //             if(confirm(response.message)){
                    //                 console.log(HOSTNAMEADMIN + '/menu/edit/' + response.reponse.id);
                    //                 location.href = HOSTNAMEADMIN + '/menu/edit/' + response.reponse.id;
                    //             }
                    //         }else{
                    //             alert(response.message);
                    //             location.reload();
                    //         }
                    //         break;
                    //     case 'post' :
                    //         break;
                    //     case 'product_category' :
                    //         alert('Tắt danh mục thành công');
                    //         break;
                    // }
                }
            },
            error: function(jqXHR, exception){
                if(jqXHR.responseJSON.message != 'undefined'){
                    alert(jqXHR.responseJSON.message);
                    location.reload();
                }else{
                    console.log(errorHandle(jqXHR, exception));
                }
            }
        });
    }
}