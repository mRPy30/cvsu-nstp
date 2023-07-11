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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
     <!----------FONTS------------>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Inter:wght@400;800&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

    <!----------ICONS------------>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/11a4f2cc62.js" crossorigin="anonymous"></script>


     <!---Inner topbar--->
     <?php include('topbar.php');?>

    <style type="text/css">
                            .container {
                                position: absolute;
                                display: flex;
                                flex-direction: row;
                                border: 1px solid black;
                                padding: 10px;
                                width: 1100px;
                                height: 670px;
                                 top: 380px;
                                left: 930px;
                                transform: translate(-50%, -50%);
                                
                                
                            }  
                            
                            .nstp {
                            position: relative;
                            border: 1px black solid;
                            width: 735px;
                            height: 217px;
                            margin: 10px;
                            padding: 10px; 
                            background-color: #FFE193;
                            border-radius: 10px
                                                  

                            }

                          

                            .statusbox {
                            border: 1px black solid;
                            width: 400px;
                            height: 217px;
                            margin: 10px;
                            padding: 1px;

                            }

                            .box {
                            border: 1px black solid;
                            width: 1060px;
                            height: 380px;
                            background-color: #FFFFFF;
                            position: absolute;
                            left: 20px;
                            top: 270px;
                            border-radius: 10px;
                            margin-top:0px;
                            
                            }

                            .status { 
                            position: relative;
                            border: 1px black solid;
                            width: 365px;
                            height: 93px;
                            margin: 10px;
                            background-color: #FFFFFF;
                            border-radius: 10px;
                            text-align: bottom; 
                            
                            
                            }

                            .courseandsection {
                            position: relative;
                            border: 1px black solid;
                            width: 365px;
                            height: 93px;
                            margin: 10px;
                            background-color: #FFFFFF;
                            border-radius: 10px;
                            }

                            .bottom-left {
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            padding: 1px;
                            margin: 10px;
                            }

                           

                        </style>





</head>

<!----Body----->
<body>

   <!---------Sidebar------------>
   

   <section class="bg-section">
   <?php include('sidebar-instructor.php');?>
   
    <!---------End Sidebar--------->
        

        <!--Main Content-->
        

                             <!--Main Content codeeeee-->


                             <div class="container">
                            
                            <div class="nstp"><h1>NSTP 1</h1></div>

                            <div class="statusbox"> 

                            
                            <div class="status"><p class="bottom-left">Status</p></div>
                            <div class="courseandsection"><p class="bottom-left">Course and Section</p></div>
                            </div>
                            <div class="box"></div>
                           
                            
                           
                            </div>
                        



                            
                                         

                      
                          
                       
                      

                           
                            
                        </div>
                    </div>
                </div>
            </div>      

    <!-----End Main content------>        
    </section>

    
<!-----End of Body------>
</body>
</html>