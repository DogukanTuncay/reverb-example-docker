<template>
    <div>
      <h1>Chat Room</h1>
      <div v-if="messages.length">
        <ul>
          <li v-for="(message, index) in messages" :key="index">
            {{ message }}
          </li>
        </ul>
      </div>
      <div v-else>
        <p>No messages yet.</p>
      </div>
      <form @submit.prevent="sendMessage">
        <input v-model="newMessage" type="text" placeholder="Type your message..." />
        <button type="submit">Send</button>
      </form>
    </div>
  </template>

  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';

  // Reactive variables
  const newMessage = ref('');
  const messages = ref([]);

  // Function to send a new message
  const sendMessage = async () => {
    try {
      await axios.post('/send-message', { message: newMessage.value });
      newMessage.value = ''; // Clear input field after sending
    } catch (error) {
      console.error('Failed to send message:', error);
    }
  };

  // Listen for new messages from the channel
  onMounted(() => {
    setTimeout(() => {
        console.log(window.Echo);
        window.Echo.channel('user_chat')
          .listen('UserMessageEvent', (e) => {
            messages.value.push(e.message);
            alert(e);
          });
      }, 500); // 1 saniye gecikme
  });
  </script>

  <style scoped>
  /* Style adjustments go here */
  </style>
