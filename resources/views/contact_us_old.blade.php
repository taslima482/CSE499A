@extends('layouts.web')

@section('custom_styles')

@endsection

@section('content')

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"> --}}
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}



.contact-section{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.contact-info{
  color: #fff;
  max-width: 500px;
  line-height: 65px;
  padding-left: 50px;
  font-size: 18px;
}

.contact-info i{
  margin-right: 20px;
  font-size: 25px;
}

.contact-form{
  max-width: 700px;
  margin-right: 50px;
}

.contact-info, .contact-form{
  flex: 1;
}

.contact-form h2{
  color:bisque;
  text-align: center;
  font-size: 30px;
  text-transform: uppercase;
  margin-bottom: 30px;
}
.contact-form .text-box{
  background: #000;
  color: #fff;
  border: none;
  width: calc(50% - 10px);
  height: 50px;
  padding: 12px;
  font-size: 15px;
  border-radius: 5px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  opacity: 0.9;
}

.contact-form .text-box:first-child{
  margin-right: 15px;
}

.contact-form textarea{
  background: #000;
  color: #fff;
  border: none;
  width: 100%;
  padding: 12px;
  font-size: 15px;
  min-height: 200px;
  max-height: 400px;
  resize: vertical;
  border-radius: 5px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  margin-bottom: 20px;
  opacity: 0.9;
}

.contact-form .send-btn{
  float: right;
  background: #2E94E3;
  color: #fff;
  border: none;
  width: 120px;
  height: 40px;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 2px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  transition-property: background;
}

.contact-form .send-btn:hover{
  background: #001935;
}

@media screen and (max-width: 950px){
  .contact-section{
    flex-direction: column;
  }

  .contact-info, .contact-form{
    margin: 30px 50px;
  }

  .contact-form h2{
    font-size: 30px;
  }

  .contact-form .text-box{
    width: 100%;
  }
}

/*css for alert messages*/

.alert-success{
  z-index: 1;
  background: #D4EDDA;
  font-size: 18px;
  padding: 20px 40px;
  min-width: 420px;
  position: fixed;
  right: 0;
  top: 10px;
  border-left: 8px solid #3AD66E;
  border-radius: 4px;
}

.alert-error{
  z-index: 1;
  background: #FFF3CD;
  font-size: 18px;
  padding: 20px 40px;
  min-width: 420px;
  position: fixed;
  right: 0;
  top: 10px;
  border-left: 8px solid #FFA502;
  border-radius: 4px;
}
      
   
    /* .contactus{
        position: relative;
        min-height: 100vh;
        padding: 50px 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-size: cover;
        max-width: 800px;
        text-align: center;
    } 
    .contactus h2{
        font-size: 36px;
        font-weight: 500;
        color: #fff;
    }
    .contactus p{
        font-weight: 300;
        color: #fff;
    }
    .contact{
        width: 100%;
        display:flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }
    .contact .contactusInfo{
        width: 50%;
        display: flex;
        flex-direction: column;
    }
    .contact .contactusInfo .box{
        position: relative;
        padding: 20px 0;
        display: flex;
    }
    .contact .contactusInfo .box .icon{
        min-width: 60px;
        height: 60px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        font-size: 22px;
        color:darkblue;
     
    }
    .contact .contactusInfo .box .text{
        display: flex;
        margin-left: 20px;
        font-size: 16px;
        color: #fff;
        flex-direction: column;
        font-weight: 300;
    }
    .contact .contactusInfo .box .text h3{
        
     
        color: #00bcd4;
      
        font-weight: 500;
    }
    .contactusform{
        width: 40%;
        padding: 40px;
        background: #fff;
    }
    .contactusform h2{
        font-size: 30px;
        color:black;
        font-weight: 500;
    } 
    .contactusform .inputBox{
        position: relative;
        width: 100%;
        margin-top: 10px;
    }
    .contactusform .inputBox input,
    .contactusform .inputBox textarea{
        width: 100%;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        border: none;
        border-bottom: 2px solid #333;
        outline: none;
        resize: none;
    }
    .contactusform .inputBox span{
        position: absolute;
        left:0;
        padding: 5px 0;
        font-size: 16px;
        margin: 10px 0;
        pointer-events: none;
        transition:0.5s;
        color:black;
    }
    .contactusform .inputBox input:focus ~ span,
    .contactusform .inputBox input:valid ~ span,
    .contactusform .inputBox textarea:focus ~ span,
    .contactusform .inputBox textarea:valid ~ span {
        color:#00bcd4;
        font-size: 12px;
        transform: translateY(-20px);

    }
    .contactusform .inputBox input[type="submit"]{
        width: 100px;
        background: #fa8231;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
    }
    @media (max-width: 991px){
        .contactus{
           flex-direction: column;
        }
        .contactus .contactusInfo{
            margin-bottom: 40px;
        }
        .contactus .contactusInfo,
        .contactusform{
            width: 100%;
        }
    } */



    /* .contactusform{
    width: 300px;
    height: 450px;
    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: -20px;
    left: 870px;
    transform: translate(0%,-5%);
    border-radius: 10px;
    padding: 25px;
}

.contactusform h2{
    width: 220px;
    font-family: sans-serif;
    text-align: center;
    color: #ff7200;
    font-size: 22px;
    background-color: #fff;
    border-radius: 10px;
    margin: 2px;
    padding: 8px;
}

.contactusform input{
    width: 240px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 30px;
    font-family: sans-serif;
}

.contactusform input:focus{
    outline: none;
}

::placeholder{
    color: #fff;
    font-family: Arial;
}

.btnn{
    width: 240px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
}
.btnn:hover{
    background: #fff;
    color: #ff7200;
} */

</style>

    <section class="page-title title-bg12">
        <div class="d-table">
            <div class="d-table-cell">
                <h2>Contact Us</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <div class="lines">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </section>
        {{-- <section class="contactus">

        <div class="contact">
                <div class="contactusInfo">
                    
                    <div class="box">
                        <span>
                        <div class="icon"><i class="fas fa-phone-alt"></i></div></span>
                        <div class="text">
                        <h3>
                            Phone:
                        </h3>
                        <p><a href="tel: +88 01749 117117 ">
                                +88 01749 117117
                            </a></p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon"><i class="fas fa-envelope"></i></div>
                        <div class="text">
                        <h3>
                            Email:
                        </h3>
                        <p><a href="mailto: contact@hilinkz.com">
                                contact@hilinkz.com
                            </a></p>
                        </div>
                    </div>

                    <div class="box">
                        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="text">
                        <h3>
                            Address:
                        </h3>
                        <p>Basundhara R/A,<br> Dhaka,<br> Bangladesh</p>
                        </div>
                    </div>
                </div>
                
        @if(Session::has('message_sent'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message_sent')}}
                </div>

        @endif
            
       
            <div class="contactusform">
            <form method="POST" action="">
                @csrf
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="name" required="required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required="required">
                        <span>Email</span>  
                    </div>   
                    <div class="inputBox">
                        <input type="phone" name="phone" required="required">
                        <span>Phone Number</span>  
                    </div>   
                    <div class="inputBox">
                        <textarea type="text" name="msg" required="required"></textarea>
                        <span>Type Your Message...</span>  
                    </div> 
                    <div class="inputBox">
                        <input type="submit" name="" value="Send">
                    </div>
                </form>
                </div>
            </div>
        </div>

        </section> --}}



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

  

    <!--alert messages start
    <div class="alert-success">
      <span>Message Sent! Thank you for contacting us.</span>
    </div>
    <div class="alert-error">
      <span>Something went wrong! Please try again.</span>
    </div>
    alert messages end-->

    <!--contact section start-->
    <div class="contact-section">
      <div class="contact-info">
        <div><i class="fas fa-map-marker-alt"></i>Basundhara R/A, Dhaka,Bangladesh</div>
        <div><i class="fas fa-envelope"></i>contact@hilinkz.com</div>
        <div><i class="fas fa-phone"></i>  +88 01749 117117</div>
      </div>
      <div class="contact-form">
        <h2>Send Message</h2>
        <form class="contact" method="POST" action="{{ route('sendMessage') }}">
           @csrf
        
          <input type="text" name="name" class="text-box" placeholder="Your Name" required>
          <input type="email" name="email" class="text-box" placeholder="Your Email" required>
          <input type="phone" name="phone" class="text-box" placeholder="Your Phone Number" required>
          <textarea name="message" rows="5" placeholder=" Type Your Message..." required></textarea>
          <input type="submit" name="submit" class="send-btn" value="Send">
        </form>
      </div>
    </div>
    <!--contact section end-->



      
    </div>
</div>





@endsection

@section('custom_js')

@endsection
