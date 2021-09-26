// https://www.youtube.com/watch?v=91qEdc6dSUs
/* ./src/App.js
Attempted import error: './components/LoginForm' does not contain a default export (imported as 'LoginForm').
*/

import React, { useState } from 'react';
import LoginForm from './components/LoginForm';

function App() {
  const adminUser = {
    email: "admin@admin.com",
    password: "admin123"
  }

  const [user, setUser] = useState({name: "", email: ""});
  const [error, setError] = useState("");

  const Login = details => {
    console.log(details);
    
    if (details.email == adminUser.email && details.password == adminUser.password){
      console.log("Logged in");
      setUser({
        email: details.email
      });
    } else  {
      console.log("details do not match!");
      setError("Details do not match!");
    }
  }

  const Logout = () => {
    setUser({ name: "", email: ""});
  }


  return (
    <div className="App">
      {(user.email != "") ? (
        <div className="welcome">
          <h2>Welcome, <span>{user.email}</span></h2>
          <button onClick={Logout}>Logout</button>
        </div>
      ) : (
        <LoginForm Login={Login} error={error} />
      )}
    </div>
  );
}

export default App;
