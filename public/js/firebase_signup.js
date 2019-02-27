// initialize firebase app
var config = {
    apiKey: "AIzaSyDiRNk24nc-FI8MC6_DqfF2tBBz3fQVRjc",
    authDomain: "rentro-official00.firebaseapp.com",
    databaseURL: "https://rentro-official00.firebaseio.com",
    projectId: "rentro-official00",
    storageBucket: "rentro-official00.appspot.com",
    messagingSenderId: "45495480751"
};
firebase.initializeApp(config);

const uiConfig = {
    signInSuccessUrl: 'index.html',
    signInOptions: [
        firebase.auth.EmailAuthProvider.PROVIDER_ID,
        firebase.auth.GoogleAuthProvider.PROVIDER_ID,
        firebase.auth.FacebookAuthProvider.PROVIDER_ID,
    ],
    callbacks: {
        signInSuccessWithAuthResult: function(authResult, redirectUrl) {
            // User successfully signed in.
            // Return type determines whether we continue the redirect automatically
            // or whether we leave that to developer to handle.
            console.log('user logged in: ' + authResult); 
            return true;
        },
        uiShown: function() {
            // The widget is rendered.
            // Hide the loader.
            //document.getElementById('loader').style.display = 'none';
            console.log('ui is shown');
        }
    },
    signInFlow: 'popup',
    tosUrl: '<your-tos-url>',
    privacyPolicyUrl: function() {
        window.location.assign('<your-privacy-policy-url>');
    }
};

var ui = new firebaseui.auth.AuthUI(firebase.auth());
if (ui.isPendingRedirect()) {
    ui.start('#firebaseui-auth-container', uiConfig); 
}
ui.start('#firebaseui-auth-container', {
    signInOptions: [
        {
            provider: firebase.auth.GoogleAuthProvider.PROVIDER_ID,
            authMethod: 'https://accounts.google.com',
            // Required to enable ID token credentials for this provider.
            // This can be obtained from the Credentials page of the Google APIs
            // console.
            clientId: '45495480751-1jgkl31m8i9pm69lkemk5vrss74e755d.apps.googleusercontent.com'
        },
        firebase.auth.FacebookAuthProvider.PROVIDER_ID,
        firebase.auth.EmailAuthProvider.PROVIDER_ID,
    ],
});
const initApp = function() {
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            console.log(user)
            // User is signed in.
            var displayName = user.displayName;
            var email = user.email;
            var emailVerified = user.emailVerified;
            var photoURL = user.photoURL;
            var uid = user.uid;
            var phoneNumber = user.phoneNumber;
            var providerData = user.providerData;
            user.getIdToken().then(function(accessToken) {
                //document.getElementById('sign-in-status').textContent = 'Signed in';
                //document.getElementById('sign-in').textContent = 'Sign out';
                //document.getElementById('account-details').textContent = JSON.stringify({
                    //displayName: displayName,
                    //email: email,
                    //emailVerified: emailVerified,
                    //phoneNumber: phoneNumber,
                    //photoURL: photoURL,
                    //uid: uid,
                    //accessToken: accessToken,
                    //providerData: providerData
                //}, null, '  ');
            });
        } else {
            // User is signed out.
            //document.getElementById('sign-in-status').textContent = 'Signed out';
            //document.getElementById('sign-in').textContent = 'Sign in';
            //document.getElementById('account-details').textContent = 'null';
            console.log('user signed out');
        }
    }, function(error) {
        console.log(error);
    });
};

window.addEventListener('load', function() {
    initApp()
});
