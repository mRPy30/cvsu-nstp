<style>
    /*****Sidebar*****/

    .bg-section .sidebar {
        position: absolute;
        top: 0px;
        left: 0;
        bottom: 0;
        width: 250px;
        height: 160vh;
        overflow-y: auto;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 2px 2px 8px 1px rgba(0, 0, 0, 0.44);
    }

    .sidebar .navbar-nav {
        margin: 0px 5px;
    }

    .sidebar .navbar-nav .pcoded-inner-navbar {
        flex-direction: column;
    }

    .navbar-nav .pcoded-inner-navbar ul {
        width: 100%;
    }

    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .sidebar .nav .nav-link {
        padding: 10px 25px;
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

    .sidebar .nav .nav-link a.active {
        color: #008A0E;
    }

    /*******RESPONSIVE**********/

    @media (max-width: 992px) {
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

    @media (max-width: 768px) {
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
<nav class="sidebar navbar-collapsed">
    <div class="navbar-wrapper">
        <div class="navbar-nav">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-link">
                    <a href="instructorpage.php" class="<?php if ($page == "instructorpage.php") {
                        echo "nav-link active";
                    } else {
                        echo "nav-link";
                    } ?> " href="instructorpage.php"> <i class="fa-sharp fa-solid fa-house"></i>
                        Home
                    </a>
                </li>

                <li class="nav-link">
                    <a href="instructor-classes.php?=instructor-classes_section" class="<?php if ($page == "instructor-classes.php") {
                        echo "nav-link active";
                    } else {
                        echo "nav-link";
                    } ?> " href="instructor-classes.php"><i class="fa-solid fa-book"></i> Classes </a>
                </li>

                <li class="nav-link">
                    <a href="instructor-programs.php" class="<?php if ($page == "instructor-programs.php") {
                        echo "nav-link active";
                    } else {
                        echo "nav-link";
                    } ?> " href="instructor-programs.php"><i class="fa-solid fa-group"></i>
                        Programs </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
<!---------End Sidebar--------->