const startButton = document.getElementById("startButton");
const outputDiv = document.getElementById("output");
const aiResponseDiv = document.getElementById("aiResponse");
const languageSelect = document.getElementById("languageSelect");

const recognition = new (window.SpeechRecognition ||
    window.webkitSpeechRecognition ||
    window.mozSpeechRecognition ||
    window.msSpeechRecognition)();

recognition.onstart = () => {
    startButton.textContent = "Listening...";
};

recognition.onresult = (event) => {
    const transcript = event.results[0][0].transcript;
    outputDiv.textContent = transcript;

    // Send the transcript to the server using fetch
    fetch('/voiceToText', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `transcript=${encodeURIComponent(transcript)}&language=${encodeURIComponent(languageSelect.value)}`,
    })
        .then(response => response.text())
        .then(data => {
            aiResponseDiv.textContent = data;
            speakText(data); // Convert the AI response text to speech
        })
        .catch(error => {
            console.error('Error fetching AI response:', error);
            aiResponseDiv.textContent = 'Error fetching AI response.';
            speakText('Error fetching AI response.'); // Convert error message to speech
        });
};

recognition.onend = () => {
    startButton.textContent = "Start";
};

startButton.addEventListener("click", () => {
    recognition.lang = languageSelect.value; // Set language for speech recognition
    recognition.start();
});

// Function to convert text to speech
function speakText(text) {
    if ('speechSynthesis' in window) {
        const utterance = new SpeechSynthesisUtterance(text);

        // Get available voices
        const voices = speechSynthesis.getVoices();

        // Find a voice that matches the selected language
        const selectedLanguage = languageSelect.value;
        const selectedVoice = voices.find(voice => voice.lang === selectedLanguage);

        if (selectedVoice) {
            utterance.voice = selectedVoice;
        } else {
            console.warn('Selected voice not found. Using default voice.');
        }

        utterance.onerror = () => {
            console.error('Error speaking text');
        };

        window.speechSynthesis.speak(utterance);
    } else {
        console.error('SpeechSynthesis API not supported');
    }
}
