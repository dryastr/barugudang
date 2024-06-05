<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://badoystudio.com/cloudme.fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> Responsive Sidebar Menu  | CodingLab </title>
    <link rel="stylesheet" href="sidebar1.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <style type="text/css">
      @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');
body {
  box-sizing: border-box;
}
/* CSS for main section */
.bungkus{
  background-color: rgba(255,255,255,0.7);
  width: 800px;
  height: 300px;
  color: black;
  margin: 20px auto;
    box-shadow: 8px 8px 8px rgba(0,0,0,0.8);
    padding: 10px;
    border: 1px solid grey;
    padding-top: 50px;
    padding-bottom: 40px;
}

.achievements {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 40px 80px;
}

.achievements .work {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
}

.achievements .work i {
  width: fit-content;
  font-size: 50px;
  color: #333333;
  border-radius: 50%;
  border: 2px solid #333333;
  padding: 12px;
}

.achievements .work .work-heading {
  font-size: 20px;
  color: #333333;
  text-transform: uppercase;
  margin: 10px 0;
}

.achievements .work .work-text {
  font-size: 15px;
  color: #585858;
  margin: 10px 0;

}

.about-me {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 80px;
  border-top: 2px solid #eeeeee;
}

.about-me img {
  width: 500px;
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.about-me-text h2 {
  font-size: 30px;
  color: #333333;
  text-transform: uppercase;
  margin: 0;
}

.about-me-text p {
  font-size: 15px;
  color: #585858;
  margin: 10px 0;
}
/* CSS for footer */
.footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #302f49;
  padding: 40px 80px;
}

.footer .copy {
  color: #fff;
}

.bottom-links {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 40px 0;
}

.bottom-links .links {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
}

.bottom-links .links span {
  font-size: 20px;
  color: #fff;
  text-transform: uppercase;
  margin: 10px 0;
}

.bottom-links .links a {
  text-decoration: none;
  color: #a1a1a1;
  padding: 10px 20px;
}
    form {
      margin: auto;
      width: min(600px, 80%);
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

    }

    h2 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    textarea,
    select,
    #Tanggal-masuk {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
      opacity: 0.5;
    }

    textarea {
      height: 100px;
      resize: vertical;
    }

    .checkboxes {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      margin: 20px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
    }

    .checkbox {
      display: flex;
      align-items: flex-start;
      margin-right: 20px;
    }

    .checkboxes label {
      margin-right: 20px;
    }

    table {
      width: 100%;
      margin-bottom: 20px;
      border-collapse: collapse;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
      color: #fff;
      font-size: 18px;
    }

    .buttons {
      display: flex;
      justify-content: center;
    }

    .buttons button {
      background-color: #854d28;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      width: 150px;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px;
    }

    .buttons button:hover {
      background-color: #6e4225;
    }
    /* sidebar */
    @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");
    :root{
        --header-height: 3rem;
        --nav-width: 68px;
        --first-color: #4723D9;
        --first-color-light: #AFA5D9;
        --white-color: #F7F6FB;
        --body-font: 'Nunito', sans-serif;
        --normal-font-size: 1rem;
        --z-fixed: 100}*,::before,::after{
            box-sizing: border-box}
     body{
    position: relative;
    margin: var(--header-height) 0 0 0;
    padding: 0 1rem;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    transition: .5s}
    a{
    text-decoration: none
}
    .header{
        width: 100%;
        height: var(--header-height);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 1rem;
        background-color: var(--white-color);
        z-index: var(--z-fixed);transition: .5s
     }
    .header_toggle{
    color: var(--first-color);
    font-size: 1.5rem;cursor: pointer
}
    .header_img{
     width: 35px;
    height: 35px;
    display: flex;
    justify-content: center;
    border-radius: 50%;
    overflow: hidden
}
    .header_img img{
    width: 40px
 }
.l-navbar{
position: fixed;
top: 0;
left: -30%;
width: var(--nav-width);
height: 100vh;
background-color: var(--first-color);
padding: .5rem 1rem 0 0;transition: .5s;z-index: var(--z-fixed)
}
.nav{
height: 100%;
display: flex;flex-direction: column;
justify-content: space-between;
overflow: hidden
}
.nav_logo, .nav_link{
display: grid;
grid-template-columns: max-content max-content;
align-items: center;
column-gap: 1rem;padding: .5rem 0 .5rem 1.5rem
}
.nav_logo{
margin-bottom: 2rem
}
.nav_logo-icon{
font-size: 1.25rem;
color: var(--white-color)
}
.nav_logo-name{
color: var(--white-color);
font-weight: 700
}
.nav_link{
position: relative;
color: var(--first-color-light);
margin-bottom: 1.5rem;
transition: .3s
}
.nav_link:hover{
color: var(--white-color)
}
.nav_icon{
font-size: 1.25rem}
.show{
left: 0
}
                                    .body-pd{
                                        padding-left: calc(var(--nav-width) + 1rem)
                                    }
                                        .active{color: var(--white-color)}
                                        .active::before{
                                            content: '';
                                            position: absolute;
                                            left: 0;
                                            width: 2px;
                                            height: 32px;
                                            background-color: var(--white-color)}
                                            .height-100{height:100vh}
                                @media screen and (min-width: 768px){
                                    body{
                                        margin: calc(var(--header-height) + 1rem) 0 0 0;
                                        padding-left: calc(var(--nav-width) + 2rem)
                                    }
                                        .header{
                                            height: calc(var(--header-height) + 1rem);padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
                                        }
                                        .header_img{
                                            width: 40px;
                                            height: 40px}
                                        .header_img img{
                                            width: 45px
                                        }
                                        .l-navbar{
                                            left: 0;
                                            padding: 1rem 1rem 0 0
                                        }
                                        .show{
                                            width: calc(var(--nav-width) + 156px)
                                        }
                                        .body-pd{
                                            padding-left: calc(var(--nav-width) + 188px)}
                                        }
    </style>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> 
                <i class='bx bx-layer nav_logo-icon'>

                </i> 
                <span class="nav_logo-name">BBBootstrap</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link active"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-user nav_icon'></i> 
                <span class="nav_name">Users</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-message-square-detail nav_icon'></i> 
                <span class="nav_name">Messages</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-home nav_icon'></i> 
                <span class="nav_name">Bookmark</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-folder nav_icon'></i>
                 <span class="nav_name">Files</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                 <span class="nav_name">Stats</span> </a> </div>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> 
            <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
  <section class="home-section">
  <div class="wrap">
<main>
  <div class="intro">
<div class="w3-content w3-margin-top" style="max-width:1400px;">

<!-- The Grid -->
<div class="w3-row-padding">

</div>

    <div class="w3-twothird">

<div class="w3-container w3-card w3-white w3-margin-bottom" style="margin: 30px">
<h2 class="w3-text-grey w3-padding-16">KARTU STOK MASUK</h2>
<div class="w3-container">
<h5 class="w3-opacity"><b>isikan data dibawah ini dengan benar</b></h5>
 <form>
    <label for="first-name">Kode masuk:</label>
    <input type="text" id="Kode-masuk" name="Kode-masuk" required>

    <label for="last-name">Tanggal masuk:</label>
    <input type="date" id="Tanggal-masuk" name="Tanggal-masuk" required>

    <label for="email">Nama Buyer:</label>
    <input type="email" id="Nama-buyer" name="Nama-buyer" required>

    <label for="email">Color:</label>
    <input type="email" id="Color" name="Color" required>

    <label for="mobile">Artikel:</label>
    <input type="tel" id="Artikel" name="Artikel" required>

    <label for="email">Unit:</label>
    <input type="email" id="Unit" name="Unit" required>

    <label for="pin-code">Nama Supplier:</label>
    <input type="text" id="Nama-supplier" name="Nama-supplier" required>
    
    <label for="address">No Invoice:</label>
    <textarea id="No-invoice" name="No-invoice" required></textarea>

    <label for="city">No PO:</label>
    <input type="text" id="No-PO" name="No-PO" required>

    <label for="pin-code">Lot:</label>
    <input type="text" id="Lot" name="Lot" required>

    <br><tr>
    <div class="mb-3">
    <button type="button" class="btn btn-primary btn-sm">Small button</button>
    </div>
    </tr>

    </div>
</form>
</div>
</main>
  </div>
  </section>
  <script>

  document.addEventListener("DOMContentLoaded", function(event) {
   
   const showNavbar = (toggleId, navId, bodyId, headerId) =>{
   const toggle = document.getElementById(toggleId),
   nav = document.getElementById(navId),
   bodypd = document.getElementById(bodyId),
   headerpd = document.getElementById(headerId)
   
   // Validate that all variables exist
   if(toggle && nav && bodypd && headerpd){
   toggle.addEventListener('click', ()=>{
   // show navbar
   nav.classList.toggle('show')
   // change icon
   toggle.classList.toggle('bx-x')
   // add padding to body
   bodypd.classList.toggle('body-pd')
   // add padding to header
   headerpd.classList.toggle('body-pd')
   })
   }
   }
   
   showNavbar('header-toggle','nav-bar','body-pd','header')
   
   /*===== LINK ACTIVE =====*/
   const linkColor = document.querySelectorAll('.nav_link')
   
   function colorLink(){
   if(linkColor){
   linkColor.forEach(l=> l.classList.remove('active'))
   this.classList.add('active')
   }
   }
   linkColor.forEach(l=> l.addEventListener('click', colorLink))
   
    // Your code to run since DOM is loaded and ready
   });
  </script>
</body>
</html>