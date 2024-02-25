import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js";

const firebaseConfig = {
    apiKey: "AIzaSyCQbKvqlDHS6l0eJA73KFYyYmCgmV1BENw",
    authDomain: "web1auth.firebaseapp.com",
    projectId: "web1auth",
    storageBucket: "web1auth.appspot.com",
    messagingSenderId: "210242582176",
    appId: "1:210242582176:web:f2cb5dd820a77a80807bc5",
    measurementId: "G-5RE154X2TD"
  };
  
  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  auth.languageCode = 'en';
  const provider = new GoogleAuthProvider();

  const googleLogin = document.getElementById("signInWithGoogle");
  googleLogin.addEventListener('click', () => {
    signInWithPopup(auth, provider)
    .then((result) => {
      const credential = GoogleAuthProvider.credentialFromResult(result);
      const user = result.user;
      console.log(user);
      window.location.href = "../views/MainMenu.php";
    }).catch((error) => {
      const errorCode = error.code;
      const errorMessage = error.message
      console.log(errorMessage);
      // ...
    });
  })