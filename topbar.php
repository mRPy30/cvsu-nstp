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
   width: 80px;
   height: 73px;
   left: 23px;
   top: 2px;
 }
 .header-section .row .logo .p1 p {
    font-family: 'Abel';
    font-style: normal;
    font-weight: 400;
    font-size: 20px;
    line-height: 31px;
    position: fixed;
    left: 104px;
    top: 12px;
    width: 203px;
    height: 32px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    webkit-box-align: center;
 }
 .header-section .row .logo .p2 p {
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    font-size: 20px;
    line-height: 29px;
    position: fixed;
    left: 104px;
    top: 35px;
    width: 195px;
    height: 29px;
 }
 .header-section .row .logout {
    position: fixed;
    width: 121px;
    height: 34px;
    left: 87vw;
    top: 18px;
    font-style: normal;
    font-size: 15px;
    line-height: 24px;
    max-height: 100%;
    font-family: 'Inter';
    display: inline-block;
    cursor: pointer;
 }
 .header-section .row .logout .fa{
    position: absolute;
    left: 10.62%;
    right: 77.88%;
    top: 33.29%;
    bottom: 28.57%;
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
    font-size: 21px;
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
    font-size: 21px;
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
                   <img src="logo.png" alt="">
                    <div class=" p1">
                        <p class="font-weight-normal">CVSU-IMUS CAMPUS</p>
                    </div>
                    <div class="p2">
                        <p>NSTP PROGRAM</p>
                    </div>
                    <div class="logout">
                        <button type="button" class="btn btn-light rounded btn-logout float-left " onclick="goBack()"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i> LOGOUT </button>
                    </div>
                </div>
            </div>
    </header>
    <!-------End Topbar------->