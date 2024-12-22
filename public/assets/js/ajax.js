$(document).ready(function() {
    
    function appendMessage(content, time, isSender) {
        const chatContainer = document.querySelector('.chat-container');
        
        // Create message bubble
        const messageBubble = document.createElement('div');
        messageBubble.classList.add('message-bubble', isSender ? 'sender' : 'receiver');
    
        // Create message content
        const messageContent = document.createElement('div');
        messageContent.classList.add('message-content');
        messageContent.textContent = content;
        messageBubble.appendChild(messageContent);
    
        // Create message time
        const messageTime = document.createElement('div');
        messageTime.classList.add('message-time');
        messageTime.textContent = time;
        messageBubble.appendChild(messageTime);
    
        // Append to chat container
        chatContainer.appendChild(messageBubble);
    }
    
    const chatContainer = document.querySelector('.chat-container');
    chatContainer.scrollTop = chatContainer.scrollHeight;
    // Print chats with there users
    const $notifiactions_sidebar = $('#notification-slider');
    
    $notifiactions_sidebar.on('click', function(){
        $.ajax({
            url: '/get-chats/',
            method: 'GET', 
            dataType: 'json', 
            success: function(response) {
                if(response.data.length > 0) {
                    console.log(response.data);
                    $('.tab-content #side1').empty();
                    $.each(response.data, function( index, chat ){
                        let cahtHTML = `
                            <div class="list-group list-group-flush chat-details" data-id="${chat.chat.id}">
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="ml-2 open-chat">
                                        <img class="avatar avatar-md brround cover-image" id="photo" src="${chat.user.photo}">
                                    </div>
                                    <div class="open-chat">
                                        <div class="font-weight-semibold" data-toggle="modal" id="name" data-target="#chatmodel">${chat.user.name}</div>
                                    </div>
                                    <div class="mr-auto open-chat">
                                        <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#chatmodel" ><i class="fab fa-facebook-messenger"></i></a> 
                                    </div>
                                </div>
                            </div>`;
                        $('.tab-content #side1').append(cahtHTML);
                        
                    });
                }
            },
            error: function() {
                $('#result').html('<p>Error fetching data.</p>');
            }
        });
    });
    
    function getChatDetails( chatId ){
        console.log(chatId);
        $.ajax({
            url: '/get-messages/' + chatId,
            method: 'GET', 
            success: function(response) {

                if (response && response.data ) {

                    console.log( response );
                    let userInsideChat = $('#user-inside-chat');
                    let chatBody       = $('.chat-container');
                    userInsideChat.empty();

                    let userDataInChat = `
                            <div class="img_cont mr-3">
                                <img src="${response.data.user_sender.photo}" class="rounded-circle user_img" alt="img">
                            </div>
                            <div class="align-items-center mt-2">
                                <h4 class="text-white mb-0 font-weight-semibold">${response.data.user_sender.name}</h4>
                                <span class="dot-label bg-success"></span><span class="mr-3 text-white">online</span>
                            </div>`;

                    userInsideChat.append(userDataInChat);
                    
                    chatBody.empty();
                    $.each(response.data.messages, function( index, message ){
                        let messageHTML = `
                                <div class="message-bubble sender">
                                    <div class="message-content">
                                      ${message.message}
                                    </div>
                                    <div class="message-time">${message.created_at}</div>
                                </div>`;

                        if( message.is_sender ){
                            messageHTML = `
                                <div class="message-bubble receiver">
                                    <div class="message-content">
                                    ${message.message}
                                    </div>
                                    <div class="message-time">${message.created_at}</div>
                                </div>`;
                        }

                        chatBody.append(messageHTML);
                    });
                }
            },
            error: function() {
                $('#result').html('<p>Error fetching data.</p>');
            }
        });
    }

    $(document).on('click', '.chat-details', function() {
        const chatId = $(this).data('id');
        console.log(chatId);
        getChatDetails(chatId);
    });
    
});
