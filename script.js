   const modal = document.getElementById('login-signup-modal');
   const openModalBtn = document.getElementById('login-signup-btn');
   const closeModalSpan = document.querySelector('.close');
   const loginBtn = document.getElementById('login-btn');
   const signupBtn = document.getElementById('signup-btn');

   openModalBtn.onclick = function() {
       modal.style.display = 'block';
   }

   closeModalSpan.onclick = function() {
       modal.style.display = 'none';
   }

   window.onclick = function(event) {
       if (event.target == modal) {
           modal.style.display = 'none';
       }
   }

   loginBtn.onclick = function() {
       modal.style.display = 'none';
       window.location.href = "signup.html";
   }

   signupBtn.onclick = function() {
       modal.style.display = 'none';
       window.location.href = "signup2.html";
   }
