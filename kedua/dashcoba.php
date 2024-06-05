<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif
}

body {
    margin-top: 30px;
    background-color:#eee;
}

.container {
    /* min-height: 100vh; */
    padding: 20px 0;
    display: flex;
    flex-wrap: wrap;
   justify-content: center;
}

p {
    margin: 0px
}

.card {
    width: 280px;
    height: 150px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    background: #fff;
    transition: all 0.5s ease;
    cursor: pointer;
    user-select: none;
    z-index: 10;
    overflow: hidden;
}

.card .backgroundEffect {
    bottom: 0;
    height: 0px;
    width: 100%
}

.card:hover {
    color: #fff;
    transform: scale(1.025);
    box-shadow: rgba(0, 0, 0, 0.24) 0px 5px 10px
}

.card:hover .backgroundEffect {
    bottom: 0;
    height: 320px;
    width: 100%;
    position: absolute;
    z-index: -1;
    background: #1b9ce3;
    animation: popBackground 0.3s ease-in
}

@keyframes popBackground {
    0% {
        height: 20px;
        border-top-left-radius: 50%;
        border-top-right-radius: 50%
    }

    50% {
        height: 80px;
        border-top-left-radius: 75%;
        border-top-right-radius: 75%
    }

    75% {
        height: 160px;
        border-top-left-radius: 85%;
        border-top-right-radius: 85%
    }

    100% {
        height: 320px;
        border-top-left-radius: 100%;
        border-top-right-radius: 100%
    }
}

.card .text-muted {
    font-size: 12px
}

.card:hover .text-muted {
    color: #fff !important
}

.card .content {
    padding: 0 20px
}

.card .content .btn {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 5px 10px;
    background-color: #1b9ce3;
    border-radius: 25px;
    font-size: 12px;
    border: none
}

.card:hover .content .btn {
    background: #fff;
    color: #1b9ce3;
    box-shadow: #0000001a 0px 3px 5px
}

.card .content .btn .fas {
    font-size: 10px;
    padding-left: 5px
}

.card .content .foot .admin {
    color: #1b9ce3;
    font-size: 12px
}

.card:hover .content .foot .admin {
    color: #fff
}

.card .content .foot .icon {
    font-size: 12px
}


/* hello */

.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.card-hello {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    width: 500px;
    height: 100px;
    margin-left: 170px;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}

.satu{
    font-size: 30px;
    padding-top: 10px;
    padding-left: 10px;
}
        </style>
    </head>
    <body>
    <table>
 <tr>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container-hello">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card-hello bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="satu">Hallo <b>Puspita</b>
                    </h6>
                    <p class="dua">selamat mengerjakan tugasmu digudang</p>
                </div>
            </div>
        </div>
            </tr>
            <tr>
        <div class="container"> 
           <div class="d-lg-flex"> <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
            <div class="backgroundEffect"></div><div class="content"> <p class="h-1 mt-4">DATA ARTIKEL</p>s
            <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
            <div class="btn btn-primary">Masuk<span class="fas fa-arrow-right"></span></div> 
            </div> </div> </div>
                         
            <div class="d-lg-flex"> <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                <div class="backgroundEffect"></div><div class="content"> <p class="h-1 mt-4">DATA COLOR</p>s
                      <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                        <div class="btn btn-primary">Masuk<span class="fas fa-arrow-right"></span></div> 
                         </div> </div> </div>
               
            <div class="d-lg-flex"> <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                <div class="backgroundEffect"></div><div class="content"> <p class="h-1 mt-4">DATA RAK</p>s
                      <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                        <div class="btn btn-primary">Masuk<span class="fas fa-arrow-right"></span></div> 
                         </div> </div> </div></tr>

            <tr>
            <div class="container"> 
            <div class="d-lg-flex"> <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                <div class="backgroundEffect"></div><div class="content"> <p class="h-1 mt-4">DATA SLOT</p>s
                      <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                        <div class="btn btn-primary">Masuk<span class="fas fa-arrow-right"></span></div> 
                         </div> </div> </div>
                    
            <div class="d-lg-flex"> <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                <div class="backgroundEffect"></div><div class="content"> <p class="h-1 mt-4">DATA BUYER</p>s
                      <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                        <div class="btn btn-primary">Masuk<span class="fas fa-arrow-right"></span></div> 
                         </div> </div> </div>
        
            <div class="d-lg-flex"> <div class="card border-0 me-lg-4 mb-lg-0 mb-4"> 
                <div class="backgroundEffect"></div><div class="content"> <p class="h-1 mt-4">DATA SUPPLIER</p>s
                      <div class="d-flex align-items-center justify-content-between mt-3 pb-3"> 
                        <div class="btn btn-primary">Masuk<span class="fas fa-arrow-right"></span></div> 
                         </div> </div> </div>
</div>        
</tr>
</table>
            
</body>

<script>


</script>
</html>