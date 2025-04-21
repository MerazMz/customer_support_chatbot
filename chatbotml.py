from flask import Flask, request, jsonify
from flask_cors import CORS
import google.generativeai as genai
import os
from dotenv import load_dotenv
import base64

app = Flask(__name__)
CORS(app)

# Load API key from .env file
load_dotenv()
api_key = os.getenv("GEMINI_API_KEY")

if not api_key:
    print("Error: GEMINI_API_KEY not found. Please set it in a .env file.")
    exit(1)

# Configure Gemini API
genai.configure(api_key=api_key)
# Use gemini-1.5-pro instead of gemini-2.0-flash for multimodal capabilities
model = genai.GenerativeModel('gemini-1.5-pro')

# Initialize chat sessions storage
chat_sessions = {}

ROLE_INSTRUCTION = """
You are an AI doctor name Medibot chatbot developed by Meraz and Vanshika . You are specializing in health-related issues and can analyze the image of presciption and medicine. Your goal is to provide concise, helpful, and friendly responses to users' medical inquiries. 
You should:
- Keep responses minimal and to the point.
- Stay within the domain of healthcare and medical advice.
- Never provide information unrelated to medical topics.
- Redirect users if they ask about non-medical subjects.
- End responses on a positive note.
"""

@app.route('/chat', methods=['POST'])
def chat():
    try:
        data = request.json
        user_message = data.get('message', '')
        session_id = data.get('session_id', 'default')
        image_data = data.get('image', None)
        
        if not user_message and not image_data:
            return jsonify({'error': 'No message or image provided'}), 400
            
        response = chat_with_gemini(user_message, session_id, image_data)
        return jsonify({'response': response})
        
    except Exception as e:
        print(f"Chat error: {str(e)}")
        return jsonify({'error': str(e)}), 500

def chat_with_gemini(prompt, session_id, image_data=None):
    try:
        # Initialize or get existing chat history
        if session_id not in chat_sessions:
            chat_sessions[session_id] = []

        # Get current session history
        session_history = chat_sessions[session_id]
        
        # Build context from history
        context = ROLE_INSTRUCTION + "\n\nPrevious conversation:\n"
        # Include entire conversation history instead of just last 3 messages
        for msg in session_history:
            context += f"{msg}\n"
        
        # Add current prompt
        user_prompt = f"User: {prompt}"
        if image_data:
            user_prompt += " (image attached)"
        
        # For history tracking
        session_history.append(user_prompt)
        
        # For multimodal input handling
        if image_data:
            # Convert base64 image to bytes
            try:
                # Remove data URL prefix if present
                if "base64," in image_data:
                    image_data = image_data.split("base64,")[1]
                
                image_bytes = base64.b64decode(image_data)
                
                # Create multimodal content
                response = model.generate_content(
                    [context, user_prompt, {"mime_type": "image/jpeg", "data": image_bytes}]
                )
            except Exception as img_error:
                print(f"Image processing error: {str(img_error)}")
                return "I couldn't process the image you sent. Please make sure it's a valid image file."
        else:
            # Text-only response
            full_prompt = context + "\n" + user_prompt
            response = model.generate_content(full_prompt)
        
        # Store the conversation
        if response and response.text:
            session_history.append(f"Assistant: {response.text.strip()}")
        
        # Check if response was generated successfully
        if response and response.text:
            return response.text.strip()
        
        return "I'm having trouble understanding. Could you rephrase that?"

    except Exception as e:
        print(f"Gemini API error: {str(e)}")
        return "I'm having trouble connecting. Please try again."

@app.route('/clear-history', methods=['POST'])
def clear_history():
    try:
        data = request.json
        session_id = data.get('session_id', 'default')
        
        if session_id in chat_sessions:
            chat_sessions[session_id] = []
            
        return jsonify({'message': 'Chat history cleared successfully'})
    except Exception as e:
        return jsonify({'error': str(e)}), 500

@app.route('/get-history', methods=['GET'])
def get_history():
    try:
        session_id = request.args.get('session_id', 'default')
        history = chat_sessions.get(session_id, [])
        return jsonify({'history': history})
    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == "__main__":
    print(f"Starting server with API key: {api_key[:10]}...")
    app.run(debug=True, port=5000)