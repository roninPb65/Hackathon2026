{{-- resources/views/chatbot/index.blade.php --}}
@extends('layouts.app')

@section('title', 'ATS Helper')

@section('content')
    <div class="chatbot-page">
        <section class="page-hero">
            <div class="container">
                <h1 class="page-title">ATS Resume Helper</h1>
                <p class="page-subtitle">Get instant help optimizing your resume for Applicant Tracking Systems</p>
            </div>
        </section>

        <section class="chat-section">
            <div class="container">
                <div class="chat-container">
                    <div class="chat-messages" id="chatMessages">
                        <div class="message-bot">
                            <div class="message-avatar">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M12 2C9.243 2 7 4.243 7 7V10H6C4.895 10 4 10.895 4 12V20C4 21.105 4.895 22 6 22H18C19.105 22 20 21.105 20 20V12C20 10.895 19.105 10 18 10H17V7C17 4.243 14.757 2 12 2Z"
                                        stroke="white" stroke-width="2" />
                                    <circle cx="12" cy="15" r="2" fill="white" />
                                </svg>
                            </div>
                            <div class="message-content">
                                <p><strong>Hey there!</strong> 👋 I'm your ATS Resume Helper.</p>
                                <p>I can help you optimize your resume to pass automated screening systems and get in front
                                    of real humans.</p>
                                <p><strong>Ask me about:</strong></p>
                                <ul>
                                    <li>Keywords and how to use them</li>
                                    <li>ATS-friendly formatting</li>
                                    <li>Action verbs that stand out</li>
                                    <li>How to list your skills</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="chat-input-container">
                        <div class="quick-questions">
                            <button class="quick-chip" onclick="sendQuick('How do I use keywords?')">
                                Keywords
                            </button>
                            <button class="quick-chip" onclick="sendQuick('What format should I use?')">
                                Formatting
                            </button>
                            <button class="quick-chip" onclick="sendQuick('Show me action verbs')">
                                Action Verbs
                            </button>
                            <button class="quick-chip" onclick="sendQuick('How to list skills?')">
                                Skills
                            </button>
                        </div>

                        <form id="chatForm" class="chat-form">
                            <input type="text" id="userMessage" class="chat-input"
                                placeholder="Ask me anything about ATS..." autocomplete="off">
                            <button type="submit" class="chat-submit">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M18 2L9 11M18 2L12 18L9 11M18 2L2 8L9 11" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .chatbot-page {
            background: #FAFBFC;
            min-height: 100vh;
        }

        .chat-section {
            padding: 60px 0;
        }

        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 600px;
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 32px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .message-bot,
        .message-user {
            display: flex;
            gap: 12px;
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .message-user {
            flex-direction: row-reverse;
        }

        .message-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .message-user .message-avatar {
            background: var(--secondary);
        }

        .message-content {
            max-width: 70%;
            background: var(--light-gray);
            border-radius: 12px;
            padding: 16px 20px;
            font-size: 15px;
            line-height: 1.6;
            color: var(--dark);
        }

        .message-user .message-content {
            background: var(--primary);
            color: white;
        }

        .message-content p {
            margin: 0 0 12px 0;
        }

        .message-content p:last-child {
            margin-bottom: 0;
        }

        .message-content ul {
            margin: 8px 0;
            padding-left: 20px;
        }

        .message-content li {
            margin: 6px 0;
        }

        .message-content strong {
            font-weight: 700;
        }

        .chat-input-container {
            border-top: 1px solid var(--border);
            padding: 20px;
            background: white;
        }

        .quick-questions {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .quick-chip {
            padding: 8px 16px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            color: var(--dark);
            cursor: pointer;
            transition: all 0.2s;
        }

        .quick-chip:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-1px);
        }

        .chat-form {
            display: flex;
            gap: 12px;
        }

        .chat-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 24px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.2s;
        }

        .chat-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .chat-submit {
            width: 44px;
            height: 44px;
            background: var(--primary);
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .chat-submit:hover {
            background: var(--primary-dark);
            transform: scale(1.05);
        }

        .chat-messages::-webkit-scrollbar {
            width: 6px;
        }

        .chat-messages::-webkit-scrollbar-track {
            background: var(--light-gray);
        }

        .chat-messages::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 3px;
        }

        .chat-messages::-webkit-scrollbar-thumb:hover {
            background: var(--gray);
        }

        .typing-indicator {
            display: flex;
            gap: 4px;
            padding: 12px 16px;
        }

        .typing-dot {
            width: 8px;
            height: 8px;
            background: var(--gray);
            border-radius: 50%;
            animation: typing 1.4s infinite;
        }

        .typing-dot:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dot:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {

            0%,
            60%,
            100% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-8px);
            }
        }
    </style>

    <script>
        const chatMessages = document.getElementById('chatMessages');
        const chatForm = document.getElementById('chatForm');
        const userInput = document.getElementById('userMessage');

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const message = userInput.value.trim();
            if (!message) return;

            addUserMessage(message);
            userInput.value = '';

            showTyping();

            try {
                const response = await fetch('{{ route('chatbot.chat') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message
                    })
                });

                const data = await response.json();

                removeTyping();
                addBotMessage(data.response);
            } catch (error) {
                removeTyping();
                addBotMessage('Sorry, something went wrong. Please try again.');
            }
        });

        function addUserMessage(text) {
            const div = document.createElement('div');
            div.className = 'message-user';
            div.innerHTML = `
        <div class="message-avatar">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                <circle cx="10" cy="7" r="4" stroke="white" stroke-width="2"/>
                <path d="M4 18C4 14.6863 6.68629 12 10 12C13.3137 12 16 14.6863 16 18" stroke="white" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </div>
        <div class="message-content">
            <p>${escapeHtml(text)}</p>
        </div>
    `;
            chatMessages.appendChild(div);
            scrollToBottom();
        }

        function addBotMessage(text) {
            const div = document.createElement('div');
            div.className = 'message-bot';

            // Convert markdown-style formatting
            text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            text = text.replace(/\n\n/g, '</p><p>');
            text = text.replace(/\n/g, '<br>');

            div.innerHTML = `
        <div class="message-avatar">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 2C9.243 2 7 4.243 7 7V10H6C4.895 10 4 10.895 4 12V20C4 21.105 4.895 22 6 22H18C19.105 22 20 21.105 20 20V12C20 10.895 19.105 10 18 10H17V7C17 4.243 14.757 2 12 2Z" stroke="white" stroke-width="2"/>
                <circle cx="12" cy="15" r="2" fill="white"/>
            </svg>
        </div>
        <div class="message-content">
            <p>${text}</p>
        </div>
    `;
            chatMessages.appendChild(div);
            scrollToBottom();
        }

        function showTyping() {
            const div = document.createElement('div');
            div.id = 'typingIndicator';
            div.className = 'message-bot';
            div.innerHTML = `
        <div class="message-avatar">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M12 2C9.243 2 7 4.243 7 7V10H6C4.895 10 4 10.895 4 12V20C4 21.105 4.895 22 6 22H18C19.105 22 20 21.105 20 20V12C20 10.895 19.105 10 18 10H17V7C17 4.243 14.757 2 12 2Z" stroke="white" stroke-width="2"/>
                <circle cx="12" cy="15" r="2" fill="white"/>
            </svg>
        </div>
        <div class="message-content">
            <div class="typing-indicator">
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            </div>
        </div>
    `;
            chatMessages.appendChild(div);
            scrollToBottom();
        }

        function removeTyping() {
            const typing = document.getElementById('typingIndicator');
            if (typing) typing.remove();
        }

        function scrollToBottom() {
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function sendQuick(question) {
            userInput.value = question;
            chatForm.dispatchEvent(new Event('submit'));
        }

        function escapeHtml(text) {
            const div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        }
    </script>
@endsection
