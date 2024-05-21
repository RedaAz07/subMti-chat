import React, { useState } from 'react';
import  ReactDOM from "react-dom/client"


export default function Login() {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const [errorMessage, setErrorMessage] = useState('');

    const handleSubmit = (e) => {
        e.preventDefault();


        // You can perform form validation here
        // For simplicity, I'm skipping validation in this example

        // Perform login API request
        fetch('/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email, password })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Login failed');
            }
            // Redirect to dashboard or handle successful login
            window.location.href = '/dashboard';
        })
        .catch(error => {
            setErrorMessage('Invalid email or password');
        });
    };

    return (
        <div className="container">
            <div className="design">
                <img src="/img/login.png" alt="Example Image" />
            </div>

            <div className="login">
                <form onSubmit={handleSubmit} id="form">
                    <h3 className="title">User Login</h3>
                    <div className="text-input">
                        <i className="ri-user-fill"></i>
                        <input
                            type="text"
                            placeholder="Username"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                        />
                    </div>
                    <span className="error">{errorMessage}</span>

                    <div className="text-input">
                        <i className="ri-lock-fill"></i>
                        <input
                            type="password"
                            placeholder="Password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                        />
                    </div>
                    <span className="error">{errorMessage}</span>

                    <button className="login-btn" type="submit">LOGIN</button>
                </form>

                <a href="#" className="forgot">Forgot Username/Password?</a>
            </div>
        </div>
    );
}


const container = document.getElementById("Hello-react")
const root = ReactDOM.createRoot(container)
root.render(<Login />);

