document.addEventListener("DOMContentLoaded", function () {
    const chatInput = document.getElementById("chat-input");
    const sendChatbtn = document.getElementById("send-chat");
    const chatbox = document.getElementById("chat-body-inner");

    let userMessage = null; // Variable to store user's message
    const API_KEY = "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"; // Paste API key here
    const inputInitHeight = chatInput.scrollHeight;

    const createChatLi = (message, className) => {
        // Create a chat <li> element with passed message and class name
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
                            <span class="extra-small text-muted">08:45 PM</span>
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
                            <span class="extra-small text-muted">08:45 PM</span>
                        </div>
                    </div>`;
        chatLi.innerHTML = chatContent;
        return chatLi; // return chat <li> element
    };

    const generateResponse = () => {
        // Generate a response from the bot
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
                const incomingChatli = createChatLi(botResponse, "message");
                chatbox.appendChild(incomingChatli);
                chatbox.scrollTo(0, chatbox.scrollHeight);
            })
            .catch(() => {
                const errorMessage = "Oops Something went wrong. Please try again.";
                const errorChatLi = createChatLi(errorMessage, "message-out");
                chatbox.appendChild(errorChatLi);
                chatbox.scrollTo(0, chatbox.scrollHeight);
            });
    };

    const handleChat = () => {
        userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
        if (!userMessage) return;

        // Clear the input textarea and set its height to default
        chatInput.value = "";
        chatInput.style.height = `${inputInitHeight}px`;

        // Append the user's message to the chatbox
        const outgoingChatli = createChatLi(userMessage, "message-out");
        chatbox.appendChild(outgoingChatli);
        chatbox.scrollTo(0, chatbox.scrollHeight);

        // Generate bot response after a short delay
        setTimeout(generateResponse, 600);
    };

    chatInput.addEventListener("input", () => {
        // Adjust the height of the input textarea based on its content
        chatInput.style.height = `${inputInitHeight}px`;
        chatInput.style.height = `${chatInput.scrollHeight}px`;
    });

    sendChatbtn.addEventListener("click", handleChat);
});