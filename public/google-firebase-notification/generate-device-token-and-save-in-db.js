import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
import { getMessaging,getToken,onMessage } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-messaging.js";
import { getUnseenNotification } from "/allUsers/customer/customer.js";

      // Firebase config
      const firebaseConfig = {
        apiKey: "AIzaSyD-2AWbuYDzwkYHk5zx28jn74mEkJFcX1c",
        authDomain: "xtraevent-56034.firebaseapp.com",
        projectId: "xtraevent-56034",
        storageBucket: "xtraevent-56034.firebasestorage.app",
        messagingSenderId: "499202750673",
        appId: "1:499202750673:web:86e15a533537017abb6df0",
        measurementId: "G-T95F2F0VKX"
      };

      // Initialize Firebase
      const app = initializeApp(firebaseConfig);
      const messaging = getMessaging(app);

      // Register service worker and get token
      navigator.serviceWorker.register('/google-firebase-notification/firebase-messaging-sw.js')
        .then((registration) => {
          return getToken(messaging, {
            vapidKey: 'BJeFvHCg9ootwJOAGcHGE-BJAW-aqNaG5NUUe3KTpWw6zy9AYWvcfms28f9p4sS13obIUmk5UFXWRNwmcoQSado',
            serviceWorkerRegistration: registration
          });
        })
        .then((token) => {
          console.log('✅ FCM Token:', token);

          if (window.location.pathname.includes('dashboard')) {


            $.ajax({
              url: '/save-fcm-device-token', // BEST (dynamic URL)
              type: 'POST',
              data: {
                token: token,
                device_type: 'web'
              },
              success: function(response) {
                console.log(response);
              },
              error: function(xhr) {
                console.log(xhr.responseText);
              }
            });

          }



        })
        .catch((err) => {
          console.error('❌ Error getting FCM token:', err);
        });



        onMessage(messaging, (payload) => {
            // console.log("Foreground message:", payload);
        
            if (Notification.permission === "granted") {
                new Notification(payload.notification?.title || "Notification", {
                    body: payload.notification?.body || "",
                });
            }
        
            getUnseenNotification();
        });
  
  
  
  