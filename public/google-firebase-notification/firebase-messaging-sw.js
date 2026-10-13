// firebase-messaging-sw.js

importScripts('https://www.gstatic.com/firebasejs/11.6.1/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/11.6.1/firebase-messaging-compat.js');


firebase.initializeApp({
  apiKey: "AIzaSyD-2AWbuYDzwkYHk5zx28jn74mEkJFcX1c",
  authDomain: "xtraevent-56034.firebaseapp.com",
  projectId: "xtraevent-56034",
  storageBucket: "xtraevent-56034.firebasestorage.app",
  messagingSenderId: "499202750673",
  appId: "1:499202750673:web:86e15a533537017abb6df0",
  measurementId: "G-T95F2F0VKX"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
//   console.log('[firebase-messaging-sw.js] Received background message ', payload);
// getUnseenNotification();
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    // icon: 'https://jiffix.app/logo.png' // Optional icon
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
  
  self.clients.matchAll({ type: 'window', includeUncontrolled: true })
    .then(function(clients) {
      clients.forEach(function(client) {
        client.postMessage({
          type: 'NEW_NOTIFICATION'
        });
      });
    });
  
});





