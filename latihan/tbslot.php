<html>
    <head>
        <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <style>
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
                text-decoration: none}
                .header{width: 100%;
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
                    font-size: 1.5rem;cursor: pointer}
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
                                display: flex;flex-direction: column;justify-content: space-between;
                                overflow: hidden
                            }
                            .nav_logo, .nav_link{
                                display: grid;
                                grid-template-columns: max-content max-content;
                                align-items: center;
                                column-gap: 1rem;padding: .5rem 0 .5rem 1.5rem}
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
      /* content tabel */
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #007bff;
        color: #fff;
    }
</style>
    </head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> 
                <i class='bx bx-layer nav_logo-icon'>

                </i> 
                <span class="nav_logo-name">PT. Globalindo Intimates</span> </a>
                <div class="nav_list"> <a href="#" class="nav_link active"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                <span class="nav_name">Dashboard</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-user nav_icon'></i> 
                <span class="nav_name">Kartu Masuk</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-message-square-detail nav_icon'></i> 
                <span class="nav_name">Reminder</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-home nav_icon'></i> 
                <span class="nav_name">Profile</span> </a> <a href="#" class="nav_link"> 
                    <i class='bx bx-folder nav_icon'></i>
            </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> 
            <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>

    <!--Container Main start-->
    <div class="height-100 bg-light">
    <?php 
    //require_once 'menu.php'; 
    ?> 
    <div class="content">
        <h2>Data Artikel</h2>
        <div class="mb-3">
        <a href="formslot.php"><button type="button" class="btn btn-primary"> Tambah Slot </button>
        </div>
        <table>
            <tr>
                <th>Kode Slot</th>
                <th>Nama Slot</th>
                <th>Nama Rak</th>
            </tr>
            <?php
            // Mengambil data produk dari database
            require_once 'config.php';

            $sql = "SELECT * FROM slot
            INNER JOIN rak on slot.kode_rak = rak.kode_rak";
                    
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["kode_slot"] . "</td>";
                    echo "<td>" . $row["nama_slot"] . "</td>";
                    echo "<td>" . $row["nama_rak"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data produk.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>

    </div>
     <!--Container Main end-->
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