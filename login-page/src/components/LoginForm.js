import React, { useState } from "react";


function LoginForm({ Login, error }) {
    const [details, setDetails] = useState({email: "", password: ""});

    const submitHandler = e => {
        e.preventDefault();

        Login(details);
    }

    return (
        <div className="wrapper">
            <div className="box">
                <div className="left-side">

                    {/* AZ LOGO */}
                    <p className="Google">Sign in with Google</p>
                    <p className="small-text"> ----- or sign in with email -----</p>  
                          
                    <form onSubmit={submitHandler}>
                        <div className="form-inner">
                            
                            {(error != "") ? ( <div className="error">{error}</div>) : ""}
                            <div className="form-group">
                                <label htmlFor="email">Email:</label>
                                <input type="email" name="meail" id="email" 
                                onChange={e => setDetails({
                                    ...details, email: e.target.value
                                    })} value={details.email} />
                            </div>
                            <div className="form-group">
                                <label htmlFor="password">Password:</label>
                                <input type="password" name="password" id="password" 
                                onChange={e => setDetails({
                                    ...details, password: e.target.value
                                    })} value={details.password}/>
                            </div>
                            <input type="submit" value="Login" />
                        </div>
                    </form>     

                </div>

                <div className="right-side">
                    
                </div>
            </div>
        </div>
        
    )
}

export default LoginForm;