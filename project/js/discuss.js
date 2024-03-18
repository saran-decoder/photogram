document.addEventListener("DOMContentLoaded", function () {
    const chatInput = document.getElementById("chat-input");
    const sendChatbtn = document.getElementById("send-chat");
    const chatbox = document.getElementById("chat-body-inner");
    const chatbody = document.querySelector(".chat-body.overflow-scroll");

    let userMessage = null; // Variable to store user's message
    const API_KEY = "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"; // Paste API key here
    const inputInitHeight = chatInput.scrollHeight;

    const createChatLi = (message, className, timestamp) => {
        // Create a chat <div> element with passed message and class name
        const chatLi = document.createElement("div");
        chatLi.classList.add("message", className);
        let chatContent =
            className === "message-out"
                ? `<div class="message-inner">
                        <div class="message-content">
                            <div class="message-text">
                                <p class="mb-0">${message}</p>
                            </div>
                        </div>

                        <div class="message-footer">
                            <span class="extra-small text-muted">${timestamp}</span>
                        </div>
                    </div>`
                : `<a class="avatar avatar-responsive">
                        <img class="avatar-img" src="../assets/images/default/AI.jpg" alt="">
                    </a>
                    <div class="message-inner">
                        <div class="message-content">
                            <div class="message-text">
                                <p class="mb-0">${message}</p>
                            </div>
                        </div>

                        <div class="message-footer">
                            <span class="extra-small text-muted">${timestamp}</span>
                        </div>
                    </div>`;
        chatLi.innerHTML = chatContent;
        return chatLi; // return chat <div> element
    };

    const getCurrentTime = () => {
        // Function to get the current time in 12-hour format with AM/PM indicator
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const amOrPm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12 || 12; // Convert hours to 12-hour format
        return `${hours}:${minutes} ${amOrPm}`;
    }

    const generateResponse = () => {
        // Display "Typing..." message while waiting for the response. Use this after <div id="typing-spinner" class="spinner-grow text-primary" role="status"></div>
        const typingChatli = createChatLi('Typing...', "message");
        chatbox.appendChild(typingChatli);

        const API_URL = "https://api.openai.com/v1/chat/completions";

        const requestOptions = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Authorization: `Bearer ${API_KEY}`,
            },
            body: JSON.stringify({
                model: "gpt-3.5-turbo",
                messages: [
                    {
                        role: "user",
                        content: userMessage,
                    },
                ],
            }),
        };

        // Send POST request to API, get a response and append it to the chatbox
        fetch(API_URL, requestOptions)
            .then((res) => res.json())
            .then((data) => {
                const botResponse = data.choices[0].message.content.trim();
                const botResponseTime = getCurrentTime(); // Get the timestamp for bot response
                const incomingChatli = createChatLi(botResponse, "message", botResponseTime);
                chatbox.removeChild(typingChatli); // Remove "Typing..." message
                chatbox.appendChild(incomingChatli);

                // Scroll to the bottom of the chatbody
                chatbody.scrollTop = chatbody.scrollHeight;
            })
            .catch(() => {
                const errorMessage = "Oops Something went wrong. Please try again.";
                const errorChatLi = createChatLi(errorMessage, "message-out");
                chatbox.removeChild(typingChatli); // Remove "Typing..." message
                chatbox.appendChild(errorChatLi);

                // Scroll to the bottom of the chatbody
                chatbody.scrollTop = chatbody.scrollHeight;
            });
    };

    const handleChat = () => {
        userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
        if (!userMessage) return;

        // Get current time for user message
        const userMessageTime = getCurrentTime();

        // Clear the input textarea and set its height to default
        chatInput.value = "";
        chatInput.style.height = `${inputInitHeight}px`;

        // Append the user's message to the chatbox
        const outgoingChatli = createChatLi(userMessage, "message-out", userMessageTime);
        chatbox.appendChild(outgoingChatli);

        // Generate bot response after a short delay
        setTimeout(() => {
            generateResponse();
            // Scroll to the bottom of the chatbody after appending the bot's response
            chatbody.scrollTop = chatbody.scrollHeight;
        }, 600);
    };

    chatInput.addEventListener("input", () => {
        // Adjust the height of the input textarea based on its content
        chatInput.style.height = `${inputInitHeight}px`;
        chatInput.style.height = `${chatInput.scrollHeight}px`;
    });

    sendChatbtn.addEventListener("click", handleChat);
});