var request = null;

var commentsElement = document.getElementById('top_layer');

$("#submit-comment").on('click', function(event){
    if ($.trim($('#comment').val()) == '') {
        console.log("empty message");
        return;
    };

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }

    // setup some local variables
    var form = $("#comment_submission_form");

    // Let's select and cache all the fields
    var inputs = form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    inputs.prop("disabled", true);
    
    $("#comment").val("");
    
    // Fire off the request to /form.php
    request = $.ajax({
        url: "/main/comment/submit_comment_top/",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        jsonResponse = $.parseJSON(response);
        updateComments(jsonResponse);
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        inputs.prop("disabled", false);
    });
});

// $("#comment").keypress(function (e) {
//     if(e.which == 13) {
//         document.getElementById("submit-comment").click();
//         loadComments();
//     }
// });

function updateComments(data) {
    commentsElement.innerHTML = '';
    for (userComment of data) {
        var newLi = createCommentLi(userComment);

        // Append new li to top layer
        commentsElement.appendChild(newLi);
    }
}

function loadComments() {
    document.getElementById("loading-overlay").style.display = 'block';
    $.ajax({
        url: "/main/comment/get_comments/",
        type: "post",
        data: {
            tournament_id : document.getElementById("tournament_id").value
        },
        success: function (data) {
            var jsonData = $.parseJSON(data);
            updateComments(jsonData);
            document.getElementById("loading-overlay").style.display = 'none';
        },
        error: function (e) {
            document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}

function requestCommentThread(commentId) {
    document.getElementById("loading-overlay").style.display = 'block';
    $.ajax({
        url: "/main/comment/get_comment_thread/",
        type: "post",
        data: {
            comment_id : commentId
        },
        success: function (data) {
            var jsonData = $.parseJSON(data);
            loadCommentThread(commentId, jsonData);
            document.getElementById("loading-overlay").style.display = 'none';
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            document.getElementById("loading-overlay").style.display = 'none';
        }

    });
}

function loadCommentThread(commentId, data) {
    var commentThreadElement = document.getElementById('comment-thread-' + commentId);
    commentThreadElement.innerHTML = '';

    createCommentThreadTextArea(commentThreadElement, commentId);
    for (userComment of data) {
        var newLi = createCommentLi(userComment);

        // Append new li to top layer
        commentThreadElement.appendChild(newLi);
    }
}

function pin(commentId, value, tournamentId) {
    document.getElementById("loading-overlay").style.display = 'block';
    $.ajax({
        url: "/main/comment/pin/",
        type: "post",
        data: {
            comment_id : commentId,
            pin_value : value,
            tournament_id : sessionData["tourn_id"]
        },
        success: function (data) {
            var jsonData = $.parseJSON(data);
            updateComments(jsonData);
            document.getElementById("loading-overlay").style.display = 'none';
        },
        error: function (e) {
            alert("Cannot update pin status error " + e);
            document.getElementById("loading-overlay").style.display = 'none';
        }
    });
}

/**
 * Helper function to parse json response & create new comment li.
 * @param {jsonObject} userComment 
 */
function createCommentLi(userComment) {
    var newLi = document.createElement('li');
    newLi.className = "clearfix text-left";
    newLi.id = "comment-" + userComment.comment_id;
    var newImgElement = document.createElement('img');
    newImgElement.className = 'avatar';

    if (userComment.user_image == '') {
        if (userComment.user_gender == 'Laki-laki') {
            newImgElement.src = '/main/assets/img/avatar/avamale_1.png';
        }
        else {
            newImgElement.src = '/main/assets/img/avatar/avafemale_1.png';
        }
    }
    else {
        newImgElement.src = '/main/assets/uploads/user/' + userComment.user_image;
    }

    // Create post comments
    var newPostCommentsDiv = document.createElement('div');
    newPostCommentsDiv.className = "post-comments";
    
    if (userComment.pinned == "1") {
        var pinnedElementDiv = document.createElement('div');
        pinnedElementDiv.innerHTML = '<i class="fa fa-thumb-tack" aria-hidden="true" style="font-size:16px"></i> Pinned by Creator';
        
        newPostCommentsDiv.appendChild(pinnedElementDiv);
    }

    // Create post comments childs
    var commentHeaderElement = document.createElement('p');
    commentHeaderElement.className = "meta";

    if (creator == "0"){
        var replyheader = "<i class='pull-right'><i class='fa fa-reply'></i> <a onclick='requestCommentThread(" + userComment.comment_id + ")'><small>Komentari</small></a></i>";
    }
    else if (creator == "1" && userComment.pinned == "1") {
        var replyheader = "<i class='pull-right'><a onclick='pin(" + userComment.comment_id + ", 0)'><small><i class='fa fa-thumb-tack' style='font-size:16px'></i> Unpin</small></a></i>";
    }
    else if (creator == "1" && userComment.pinned == "0"){
        var replyheader = "<i class='pull-right'><a onclick='pin(" + userComment.comment_id + ", 1)'><small><i class='fa fa-thumb-tack' style='font-size:16px'></i> Pin</small></a></i>";
    }

    commentHeaderElement.innerHTML = userComment.post_time + " <a href='#'>" + userComment.user_name + "</a> Berkata:" + replyheader;
    var commentBodyElement = document.createElement('p');
    commentBodyElement.innerHTML = userComment.comment;

    var commentFooterElement = document.createElement('p');
    // commentFooterElement.className = "meta";
    var replyFooter = "<i class='pull-right'><a onclick='requestCommentThread(" + userComment.comment_id + ")'><i class='fa fa-reply'></i> "
                    + userComment.replies + " komentar</a></i><hr>";
    commentFooterElement.innerHTML = replyFooter;

    // Append post comments childs
    newPostCommentsDiv.appendChild(commentHeaderElement);
    newPostCommentsDiv.appendChild(commentBodyElement);
    newPostCommentsDiv.appendChild(commentFooterElement);

    // create threadElement
    var threadElement = document.createElement('ul');
    threadElement.className = 'comments';
    threadElement.id = 'comment-thread-' + userComment.comment_id;

    // Append new Li Childs
    newLi.appendChild(newImgElement);
    newLi.appendChild(newPostCommentsDiv);
    newLi.appendChild(threadElement);

    return newLi;
}

function createCommentThreadTextArea(commentThreadElement, commentId) {
    var newForm = document.createElement('form');
    newForm.id = "comment_submission_form_" + commentId;
    
    // form group
    var newDiv = document.createElement('div');
    newDiv.className = 'form-group';

    var newHiddenInputTourn = document.createElement('input');
    newHiddenInputTourn.type = 'text';
    newHiddenInputTourn.id = 'tournament_id';
    newHiddenInputTourn.name = 'tournament_id';
    newHiddenInputTourn.style = 'display: none;';
    newHiddenInputTourn.value = document.getElementById('tournament_id').value;

    var newHiddenInputComment = document.createElement('input');
    newHiddenInputComment.type = 'text';
    newHiddenInputComment.id = 'ancestor_id';
    newHiddenInputComment.name = 'ancestor_id';
    newHiddenInputComment.style = 'display: none;';
    newHiddenInputComment.value = commentId;

    var newLi = document.createElement('li');
    newLi.className = "clearfix";

    var newTextArea = document.createElement('textarea');
    newTextArea.id = 'comment_new';
    newTextArea.name = 'comment_new';
    newTextArea.className = 'form-control';
    newTextArea.rows = '3';
    newTextArea.placeholder = "Tambahkan komentar anda...";
    newTextArea.style.height = "36px";
    newTextArea.onkeyup = (event) => {
        textAreaAdjust(newTextArea);
        // onPressEnter(event, commentId);
    };
    newTextArea.focus();

    var newLabel = document.createElement('label');
    newLabel.innerHTML = 'Batalkan';
    newLabel.style.fontStyle = 'italic';
    newLabel.style.cursor = 'pointer';

    // append to form group 
    newDiv.appendChild(newHiddenInputTourn);
    newDiv.appendChild(newHiddenInputComment);
    newDiv.appendChild(newLabel);
    newDiv.appendChild(newTextArea);

    // create submit button
    var newButton = document.createElement('button');
    newButton.id = 'submit-comment-' + commentId;
    newButton.name = 'submit-comment-' + commentId;
    newButton.className = 'btn btn_remove_outline btn_outline_blue text15 text_medium mt-2';
    newButton.innerHTML = 'Kirim';
    newButton.onclick = () => postCommentThread(commentId, 'comment_submission_form_' + commentId);

    newDiv.appendChild(newButton);

    newLabel.onclick = () => hideOrDisplayTextArea(newTextArea, newLabel, newButton);

    newForm.appendChild(newDiv);

    commentThreadElement.appendChild(newForm);
}

function postCommentThread(commentId, formId) {
    // setup some local variables
    var form = $("#" + formId);

    // Let's select and cache all the fields
    var inputs = form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = form.serialize();

    if ($.trim($("#" + formId + " textarea").val()) == '') {
        console.log("Empty MEssage" + $("#" + formId + " textarea").val());
        return;
    };

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    inputs.prop("disabled", true);
    
    // Fire off the request to /form.php
    request = $.ajax({
        url: "/main/comment/submit_comment_thread/",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        jsonResponse = $.parseJSON(response);
        console.log(jsonResponse);
        loadCommentThread(commentId, jsonResponse);
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        inputs.prop("disabled", false);
    });
}

function hideOrDisplayTextArea(textArea, labelElement, button) {
    if (labelElement.innerHTML == "Komentari") {
        labelElement.innerHTML = "Batalkan";
        textArea.style.display = "block";
        button.style.display = "block";
    }
    else {
        labelElement.innerHTML = "Komentari";
        textArea.style.display = "none";
        button.style.display = "none";
    }
}

function textAreaAdjust(element) {
    element.style.height = "1px";
    element.style.height = (16+element.scrollHeight)+"px";
}

function onPressEnter(event, commentId) {
    // if (event.keyCode === 13) {
    //     event.preventDefault();
    //     postCommentThread(commentId, 'comment_submission_form_' + commentId);
    //     console.log("Press enter");
    // }
}