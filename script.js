document.addEventListener('DOMContentLoaded', () => {
    const startButton = document.getElementById('startButton');
    const videoContainer = document.getElementById('videoContainer');
    const video = document.getElementById('video');
    const chatButton = document.getElementById('chatButton');
    const chatContainer = document.getElementById('chatContainer');
    const sendButton = document.getElementById('sendButton');
    const chatInput = document.getElementById('chatInput');

    startButton.addEventListener('click', () => {
        startButton.style.display = 'none';
        videoContainer.style.display = 'block';
        video.play();
    });

    video.addEventListener('ended', () => {
        videoContainer.style.display = 'none';
        chatButton.style.display = 'block';
    });

    chatButton.addEventListener('click', () => {
        chatButton.style.display = 'none';
        chatContainer.style.display = 'flex';
    });

    sendButton.addEventListener('click', () => {
        const message = chatInput.value;
        if (message.trim() !== '') {
            fetch('save_message.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message }),
            })
            .then(response => response.text())
            .then(data => {
                alert('Tin nhắn đã được lưu!');
                chatInput.value = '';
            })
            .catch(error => console.error('Error:', error));
        }
    });
});
