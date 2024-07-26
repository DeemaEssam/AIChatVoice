# AIChatVoice

https://github.com/user-attachments/assets/bbbad12f-2184-4fd5-becb-8aa6fae97876

## Overview

AIChatVoice is a chatbot application that integrates speech recognition and synthesis with a web-based interface. Built with Node.js, Express, and the OpenAI API, this project provides an interactive experience by converting spoken language into text and delivering vocal responses. The application includes a feature to choose between English and Arabic languages and records user transcripts and AI responses in a MySQL database through a PHP script.

## Features
**Speech Recognition**: Converts spoken input into text.

**Speech Synthesis**: Reads out AI responses in the chosen language.

**Language Selection**: Allows users to choose between English and Arabic.

**Database Integration**: Saves user transcripts and AI responses in a MySQL database.

**Web Interface**: Provides an intuitive user interface for chatbot interaction.

## Components

1. **Frontend (`chatbot.html` & `chatbot.js`)**
   - `chatbot.html`: The HTML file that provides the user interface.
   - `chatbot.js`: JavaScript file that handles speech recognition, sending data to the server, and updating the UI.

2. **Backend (`server.js` & `chatbot.php`)**
   - `server.js`: Node.js server using Express that processes the AI responses and interacts with the OpenAI API.
   - `chatbot.php`: PHP script that handles storing transcripts and AI responses in a MySQL database.

3. **Database**
   - MySQL database with two tables: `chatbotUser` for storing user transcripts and `chatbotAi` for storing AI responses.

## Installation

### Prerequisites

- Node.js and npm
- MySQL
- PHP and a local server environment like XAMPP

### Setup


1. **Install Node.js Dependencies**

   ```bash
   npm install
   ```

2. **Configure the PHP Script**

   - Update `chatbot.php` with your MySQL database credentials.
   - Ensure that `chatbot.php` is accessible from your Node.js server.

3. **Create Database and Tables**

   - Import the SQL schema for creating the `chatbotUser` and `chatbotAi` tables.

```ruby
CREATE TABLE chatbotAi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    response TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE chatbotUser (
    id INT AUTO_INCREMENT PRIMARY KEY,
    text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. **Run the Node.js Server**

   ```ruby
   node server.js
   ```

5. **Start the PHP Server**

   Ensure your PHP server is running (e.g., XAMPP or similar).

## Usage

1. Open your web browser and navigate to `http://localhost:3000`.
2. Click the "Start" button to begin speech recognition.
3. Speak into your microphone to send a transcript to the server.
4. The AI response will be displayed on the screen and read aloud.
