// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.
importScripts('https://www.gstatic.com/firebasejs/8.6.7/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.7/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in
// your app's Firebase config object.
// https://firebase.google.com/docs/web/setup#config-object
firebase.initializeApp({
    apiKey: "AIzaSyAzRAelJcnFhnUED_libprWdAS04n8nlXk",
    authDomain: "laravelcheat.firebaseapp.com",
    projectId: "laravelcheat",
    storageBucket: "laravelcheat.appspot.com",
    messagingSenderId: "745685446121",
    appId: "1:745685446121:web:72eb5306c6696f9d1b6f78",
    measurementId: "G-97FVPL815S"
  });


const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {

    console.log(

        "[firebase-messaging-sw.js] Received background message ",

        payload,

    );

    /* Customize notification here */

    const notificationTitle = "Background Message Title";

    const notificationOptions = {

        body: "Background Message body.",

        icon: "/itwonders-web-logo.png",

    };

  

    return self.registration.showNotification(

        notificationTitle,

        notificationOptions,

    );

});