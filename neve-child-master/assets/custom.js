// console.log("Custom Working!")

var $ = jQuery.noConflict();

    $(document).ready(function($){

    

    $("#submit").submit(function(e){
    e.preventDefault();

        let title = $("#input-title").val();
        let author = $("#input-author").val();

        
        fetch('http://lazashopee.test/wp-json/add/v1/store', {
            method: 'POST',
            body: JSON.stringify({title: title, author:author}),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        })
        .then(response => response.json())
        .then(data => console.log(data))
        
        // $.ajax({
        //     url: '/wp-admin/admin-ajax.php',
        //     dataType: 'JSON',
        //     type: 'POST',
        //     data: {
        //         action: "custom_details",
        //         data: {
        //             title: title,
        //             author: author
        //         }
        //     },
        //     success: function (res) {
        //         console.log(res)
        //         $("#input-title").val('');
        //         $("#input-author").val('');
        //         load_post();
        //     }
        // });

    });

    $(".delete--button").click(function(e) {
        e.preventDefault();

        let id = $(e.target).attr('id');
        // let deleteID = '20';

        fetch('http://lazashopee.test/wp-json/delete/v1/store', {
            method: 'post',
            body: JSON.stringify({id: id}),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        })
            .then(response => response.json())
            .then(data => console.log(data))
        
        // console.log(id);
        // return 
        // $.ajax({
        //     url: '/wp-admin/admin-ajax.php',
        //     dataType: 'JSON',
        //     type: 'POST',
        //     data: {
        //         action: 'delete_post',
        //         data: {
        //             id: id
        //         }
        //     },
        //     success: function(response){
        //         console.log(response)
        //         load_post();
        //     }
        // });
    })

    $(".edit--button").click(function(e) {
        e.preventDefault();
        $("#modal").show();

        // console.log(e.target);
        // let id = $("#update-post-id").val();

        let id = $(e.target).attr('id');
        let updateTitle = $(e.target).attr("title");
        let updateAuthor = $(e.target).attr("author");


        $("#update-title").val(updateTitle);
        $("#update-author").val(updateAuthor);
        $("#update-post-id").val(id);

        // console.log(updateTitle, updateAuthor);
        // console.log(id);

        // fetch('http://lazashopee.test/wp-json/delete/v1/store', {
        //     method: 'post',
        //     body: JSON.stringify({id: id}),
        //     headers: {
        //         'Content-type': 'application/json; charset=UTF-8',
        //     }
        // })
        //     .then(response => response.json())
        //     .then(data => console.log(data))

        // $.ajax({
        //     url: '/wp-admin/admin-ajax.php',
        //     dataType: 'JSON',
        //     type: 'POST',
        //     data: {
        //         action: 'get_post',
        //         data: {
        //             id: id,
        //         }
        //     },
        //     success: function(response){
        //         $("#update-title").val(response[0].post_title);
        //         $("#update-author").val(response[0].post_content);
        //         $("#update-post-id").val(response[0].ID);
        //     }
        // });





        // return

        // $("#submitUpdate").click(function(e){
        //     e.preventDefault();

        //     let title = $("#update-title").val();
        //     let author = $("#update-author").val();

        //     console.log(title);
        //     console.log(author);
        //     console.log('Run');

        //     $.ajax({
        //         url: '/wp-admin/admin-ajax.php',
        //         dataType: 'JSON',
        //         type: 'POST',
        //         data: {
        //             action: 'edit_post',
        //             data: {
        //                 id: id,
        //                 title: title,
        //                 author: author
        //             }
        //         },
        //         success: function(response){
        //             console.log(response)
        //             // location.reload();
        //         }
        //     });
        // });
        
        return
        let title = $("#update-title").val();
        let author = $("#update-author").val();

        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            dataType: 'JSON',
            type: 'POST',
            data: {
                action: 'edit_post',
                data: {
                    id: id,
                    title: title,
                    author: author
                }
            },
            success: function(response){
                console.log(response)
            }
        });
    })

    $("#submitUpdate").click(function(e){
        e.preventDefault();

        // console.log("Run");

        let id = $("#update-post-id").val();
        let title = $("#update-title").val();
        let author = $("#update-author").val();

        fetch('http://lazashopee.test/wp-json/update/v1/store', {
            method: "POST",
            body: JSON.stringify({id: id, title:title, author:author}),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        })
            .then(response => response.json())
            .then(data => console.log(data))

        // $.ajax({
        //     url: '/wp-admin/admin-ajax.php',
        //     dataType: 'JSON',
        //     type: 'POST',
        //     data: {
        //         action: 'update_post',
        //         data: {
        //             id: id,
        //             title: title,
        //             author: author
        //         }
        //     },
        //     success: function(response){
        //         console.log(response)
        //     }
        // });
    })

    function load_post(){
        location.reload();
    }

})