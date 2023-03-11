import React, { useState } from 'react'
import "../../assets/css/home/get_in_touch.css"
import axios from 'axios'


function GetInTouch() {

    const [name, setName] = useState("")
    const [message, setMessage] = useState()
    const [email, setEmail] = useState()
    const [mobile, setMobile] = useState()

    function saveData(ev){
        ev.preventDefault()
        let payload ={
            Email:email,
            Message: message,
            Mobile:mobile,
            Name:name
        }
        // axios.post("https://sheet.best/api/sheets/bad69e67-f6c0-48bb-8bdc-68346251527a",payload)
        // .then(res => {
        //     console.log(res);
        // })
        alert(`Hello ${name} we are still working with backend, you can contact us on email`)
    }

  return (
    <>
      <div id='contact' className="get-in-touch-container">
        <div className="title">
            Want to get in <span className="col-blue">touch?</span>
        </div>
        <form onSubmit={(e)=>{saveData(e)}}>
            <div className="get-in-touch-form-container">
                <div className="get-in-touch-form">
                    <div className="form-row">
                        <div className="form-col text">
                            <span> Hey, my name is </span>
                        </div>
                        <div className="get-in-touch-input">
                            <span className="get-in-touch-input-box">
                                <input type="text" onChange={(e)=>{setName(e.target.value)}} value={name} className="alert-inp" minLength="2" maxLength="30" placeholder="Your name" required />
                            </span>
                        </div>
                        <div className="form-col text">
                            <span> and i am looking for </span>
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="get-in-touch-input">
                            <span className="get-in-touch-input-box">
                                <input type="text" onChange={(e)=>{setMessage(e.target.value)}} value={message} minLength="15" maxLength="100" placeholder="Your message" required />
                            </span>
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="form-col text">
                            <span> you can contact me on my email </span>
                        </div>
                        <div className="get-in-touch-input">
                            <span className="get-in-touch-input-box">
                                <input type="email" onChange={(e)=>{setEmail(e.target.value)}} value={email} minLength="3" maxLength="30" placeholder="Your email" required />
                            </span>
                        </div>
                    </div>
                    <div className="form-row">
                        <div className="form-col text">
                            <span> and my phone number is </span>
                        </div>
                        <div className="get-in-touch-input">
                            <span className="get-in-touch-input-box">
                                <input type="number" onChange={(e)=>{setMobile(e.target.value)}} value={mobile} minLength="10" maxLength="10" className="no-number-spin-arrows" placeholder="Your phone number" required />
                            </span>
                        </div>
                    </div>
                    <div className="form-row send-bttn-container">
                        <button type='submit'>Send</button>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </>
  )
}

export default GetInTouch