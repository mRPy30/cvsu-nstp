<style>


    /*****Sidebar*****/ 
 
  .bg-section .sidebar {
    position: absolute;
     top: 0px;
     left: 0;
     bottom: 0;
     width: 250px;
     height: 170vh;
     overflow-y: auto;
     background: rgba(255, 255, 255, 0.92);
     box-shadow: 2px 2px 8px 1px rgba(0,0,0,0.44);
   } 
  .sidebar .navbar-nav{
        margin: 10px 30px;
    }
  .sidebar .navbar-nav .pcoded-inner-navbar {
        flex-direction: column;
    }
   .navbar-nav .pcoded-inner-navbar ul{
        width: 100%;
    }
    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }
    .sidebar .nav .nav-link{
        padding: 15px 25px;
        color: #000000;
        font-size: 17px;
        font-family: 'Poppins';
        font-style: normal;
        line-height: 30px;
    }
    .sidebar .nav .nav-link i {
        margin-right: 5px;
        font-size: 20px;
    }
    .sidebar .nav .nav-link.active {
        color: #008A0E;
    }
   /*******RESPONSIVE**********/

@media (max-width: 992px){ 
    .bg-section .sidebar {
    position: relative;
    top: 70px;
    left: 0px;
    bottom: 0;
    width: 250px;
    height: 90vh;
    overflow-y: auto;
    background: rgba(255, 255, 255, 0.92);
   } 
}
@media (max-width: 768px){
    .bg-section .sidebar {
    position: relative;
    top: 70px;
    left: 0px;
    bottom: 0;
    width: 250px;
    height: 90vh;
    background: rgba(255, 255, 255, 0.92);
   } 
    
}
/****End Sidebar*****/
 </style>
 
 <!---------Sidebar------------>
  <nav class="sidebar navbar-collapsed" >
            <div class="navbar-wrapper">
                    <div class="navbar-nav">
                       <ul class="nav pcoded-inner-navbar">
                        <li><a class="nav-link active" aria-current="page" href="adminpage.php"><i class="fa-sharp fa-solid fa-house"></i> Home </a></li>
                        <li><a class="nav-link" href="admin-shedule.php"><i class="fa-sharp fa-regular fa-calendar-days"></i> Schedule </a></li>
                        <li><a class="nav-link" href="admin-programs.php"><i class="fa-solid fa-people-group"></i> Programs </a></li>
                        <li><a class="nav-link" href="admin-feedback.php"><i class="fa-solid fa-comment"></i> Feedback </a></li>
                        <li><a class="nav-link" href="admin-records.php"><i class="fa-sharp fa-regular fa-rectangle-list"></i> Records </a></li>
                        <li><a class="nav-link" href="admin-reports.php"><i class="fa-sharp fa-solid fa-chart-pie"></i> Reports </a></li>
                        <li><a class="nav-link" href="admin-compliance.php" style="font-size: 15px; margin "><i class="fa-solid fa-clipboard-check"></i> Compliance </a></li>
                        <li><a class="nav-link" href="admin-external.php" style="font-size: 15px; margin "><i class="fa-solid fa-arrow-up-right-from-square"></i> External Pages </a></li>                       
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
<!-------End Sidebar------------>        