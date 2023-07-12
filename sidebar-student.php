<style>
    * {
        padding: 0;
        box-sizing: border-box;
        margin: 0;
    }

    /*****Sidebar*****/

    .bg-section .sidebar {
        position: relative;
        top: 0px;
        left: 0;
        bottom: 0;
        width: 250px;
        height: 140vh;
        overflow-y: auto;
        background: rgba(255, 255, 255, 0.92);

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

    .sidebar .nav .nav-link.active {
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

                <li class="nav-link active">
                    <a href="studentpage.php" class="<?php if ($page == "studentpage.php") {
                        echo "nav-link active";
                    } else {
                        echo "nav-link";
                    } ?> "> <i class="fa-sharp fa-solid fa-house"></i> Home </a>
                </li>

                <li class="nav-link">
                    <a href="student-classes.php" class="<?php if ($page == "student-classes.php") {
                        echo "nav-link active";
                    } else {
                        echo "nav-link";
                    } ?> "> <i class="fa-solid fa-book"></i> Classes </a>
                </li>

                <li class="nav-link">
                    <a href="student-programs.php" class="<?php if ($page == "student-programs.php") {
                        echo "nav-link active";
                    } else {
                        echo "nav-link";
                    } ?> "> <i class="fa-solid fa-group"></i> Programs </a>
                </li>

                <li class="nav-link">
                    <a href="student-feedback.php" class="<?php if ($page == "student-feedback.php") {
                        echo "nav-link active";
                    } else {
                        echo "nav-link";
                    } ?> "> <i class="fa-solid fa-comment"></i> Feedback </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>

<!---------End Sidebar--------->