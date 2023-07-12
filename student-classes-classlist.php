<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----------TITLE------------>
    <link rel="shortcut icon" href="logo.png" type="">
    <title><?php echo "Student Page"; ?></title>

     <!----------CSS------------>
    <link rel="stylesheet" href="style_students.css">

     <!----------BOOTSTRAP------------>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>


     <!---Inner topbar--->
     <?php include('topbar.php');?>
</head>
<!----Body----->
<body>

   <!---------Sidebar------------>
   

   <section class="bg-section">
   <?php include('sidebar-student.php');?>
    <!---------End Sidebar--------->


        <!--Main Content-->

                             <!--Main Content codeeeee-->

        <main class="pcoded-main-content">
            <div class="container pt-4 ">
                <div class="col-lg-12"> 
                <div class="content-instructor">   
                             <div class="class-list"> 
                                <p> CLASS LIST </p>
                                <a href="student-classes.php" class="go-back-button"><ion-icon
                                    name="arrow-back-circle-outline"></ion-icon></a> 
                            </div>

                             <div class="row"> 
                             <div class="col-sm-12"> 
                             <div class="class-list-box"> 
                             
                             <table class="table-bordered">
                                <thead>
                                    <tr>
                                  
                                    <th>STUDENT NAME</th>
                                    <th>STATUS</th>
                                  
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>Maricar Malimban Glorioso</td>
                                    <td>ENROLLED</td>
                            
                                    </tr>
                                    <tr>
                                    <td></td>
                                    <td></td>                       
                                    </tr>

                                    <tr>
                                    <td></td>
                                    <td></td>
                                    </tr>

                                    <tr>
                                    <td></td>
                                    <td></td>                                
                                    </tr>

                                    <tr>
                                    <td></td>
                                    <td></td>                        
                                    </tr>

                                    <tr>
                                    <td></td>
                                    <td></td>
                                    </tr>

                                    <tr>
                                    <td> </td>
                                    <td> </td>
                                    </tr>
                                   
                                    
                                </tbody>
                                </table>
                             
                             </div>

                             </div>
                             </div>
                             </div> 
                             </div>
                </div>
            </div>      
            </div>
            </div>
        </main>     

    <!-----End Main content------>        
    </section>

    
<!-----End of Body------>
</body>
</html>