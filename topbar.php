 <style>

 /******Topbar*******/
 .header-section{
    width: 100vw;
    height: 11vh;
    left: 0px;
    top: 0px;
    background-color: #6FBB76;
    align-items: center;
    box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
 }
 .header-section .row .logo img{
   position: fixed;
   width: 57px;
   height: 60px;
   left: 42px;
   top: 11px;
 }
 .header-section .row .logo .p1 p {
    font: normal 700 22px/normal 'Poppins';
    position: fixed;
    left: 104px;
    top: 14px;
    width: 203px;
    height: 32px;
 }
 .header-section .row .logo .p2 p {
    font: normal 400 16px/31px 'Abel';
    position: fixed;
    left: 104px;
    top: 37px;
    width: 195px;
    height: 29px;
 }
 .header-section .row .logout {
    position: fixed;
    height: 34px;
    left: 87vw;
    top: 22px;
    font-style: normal;
    line-height: 24px;
    max-height: 100%;
    font-family: 'Inter';
    display: inline-block;
    cursor: pointer;
 }
 .header-section .row .logout button{
    width: 110px;
    font-size: 14px;
 }
 .header-section .row .logout .fa{
    position: absolute;
 }
/*******RESPONSIVE**********/
@media (max-width: 992px){ 
    .header-section{
       
    }
    .header-section .row .logo img{
    position: fixed;
    width: 80px;
    height: 70px;
    left: 15px;
   }
    .header-section .row .logo .p1 p {
    font-family: 'Abel';
    font-style: normal;
    font-weight: 400;
    font-size: 23px;
    line-height: 31px;
    position: fixed;
    left: 120px;
    }
    .header-section .row .logo .p2 p {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 35px;
    position: fixed;
    left: 120px;
    top: 33px;
    height: 29px;
   }

}
@media (max-width: 768px) {
    .header-section{
        position: absolute;
        width: 100%;
        height: 70px;
        left: 0px;
        top: 0px;
        background: #6FBB76;
    }
    .header-section .row .logo img{
    position: fixed;
    width: 80px;
    height: 70px;
    left: 100px;
   }
    .header-section .row .logo .p1 p {
    font-family: 'Abel';
    font-style: normal;
    font-weight: 400;
    font-size: 23px;
    line-height: 31px;
    position: fixed;
    left: 320px;
    }
    .header-section .row .logo .p2 p {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 18px;
    line-height: 35px;
    position: fixed;
    left: 320px;
    top: 33px;
    height: 29px;
   }
   .header-section .row button .logout {
    position: absolute;
    width:300px;
    height: 33px;
    top: 20px;
    font-family: 'Inter';
    cursor: pointer;
   }
   .header-section .row .logout .fa{
    position: absolute;
    left: 0;
    right: 77.88%;
    top: 33.29%;
    bottom: 28.57%;
    }
}
/******End Topbar*****/
</style>


 <!-------Topbar-------->
 <script>
        function goBack() {
            window.location.href = "login.php";
        }
    </script>
    <header class=" flex-column flex-md-row bd-navbar sticky-top header-section  ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 logo ">
                   <img src="logo-nstp.png" alt="">
                    <div class="p1">
                        <p>NSTP PORTAL</p>
                    </div>
                    <div class="p2">
                    <p class="font-weight-normal">CVSU-IMUS CAMPUS</p>
                    </div>
                    <div class="logout">
                        <button type="button" class="btn btn-light rounded btn-logout float-left " onclick="goBack()"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i> LOGOUT </button>
                    </div>
                </div>
            </div>
    </header>
    <!-------End Topbar------->