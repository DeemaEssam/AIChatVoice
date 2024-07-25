# AIChatVoice


## Overview

This project is a simple chatbot application that integrates speech recognition and synthesis with a web-based interface. It uses Node.js, Express, and OpenAI API for processing user inputs and generating responses. The backend is connected to a PHP script for storing transcripts and AI responses in a MySQL database.

## Features

- **Speech Recognition**: Converts spoken language into text.
- **Speech Synthesis**: Reads out the AI responses using speech synthesis.
- **Database Integration**: Saves transcripts and AI responses to a MySQL database.
- **Web Interface**: Provides a user-friendly interface to interact with the chatbot.

## Components

1. **Frontend (`chatbot.html` & `chatbot.js`)**
   - `chatbot.html`: The HTML file that provides the user interface.
   - `chatbot.js`: JavaScript file that handles speech recognition, sending data to the server, and updating the UI.

2. **Backend (`server.js` & `chatbot.php`)**
   - `server.js`: Node.js server using Express that processes the AI responses and interacts with the OpenAI API.
   - `chatbot.php`: PHP script that handles storing transcripts and AI responses in a MySQL database.

3. **Database**
   - MySQL database with two tables: `transcripts` for storing user transcripts and `chatbotai` for storing AI responses.

## Installation

### Prerequisites

- Node.js and npm
- MySQL
- PHP and a local server environment like XAMPP

### Setup

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/chatbot-project.git
   cd chatbot-project
   ```

2. **Install Node.js Dependencies**

   ```bash
   npm install
   ```

3. **Configure the PHP Script**

   - Update `chatbot.php` with your MySQL database credentials.
   - Ensure that `chatbot.php` is accessible from your Node.js server.

4. **Create Database and Tables**

   - Import the SQL schema for creating the `transcripts` and `chatbotai` tables.

   ```sql
   CREATE TABLE transcripts (
       id INT AUTO_INCREMENT PRIMARY KEY,
       text TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   CREATE TABLE chatbotai (
       id INT AUTO_INCREMENT PRIMARY KEY,
       response TEXT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```

5. **Run the Node.js Server**

   ```bash
   node server.js
   ```

6. **Start the PHP Server**

   Ensure your PHP server is running (e.g., XAMPP or similar).

## Usage

1. Open your web browser and navigate to `http://localhost:3000`.
2. Click the "Start" button to begin speech recognition.
3. Speak into your microphone to send a transcript to the server.
4. The AI response will be displayed on the screen and read aloud.

## Troubleshooting

- **Selected voice not found**: Check available voices in the browser and update the voice selection in `chatbot.js`.
- **500 Internal Server Error**: Check PHP error logs and ensure database credentials are correct.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Create a new Pull Request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Feel free to modify the sections based on your project’s specifics and any additional instructions or information you'd like to include.
