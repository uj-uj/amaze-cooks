
<?php
include('database.php');
$conn=$conn
;
$GLOBALS['conn']=$conn;
define('conn', $conn);
function get_vendors($conn=conn)
{
        $sql = "SELECT name, location,category,approved FROM caters";
        $result = $conn->query($sql); 
        
        return $result;
}
function get_category($category,$conn=conn)
{  
        $sql = "SELECT name, location,category,approved FROM caters where category LIKE '%".$category."%'";
        $result = $conn->query($sql); 
        
        return $result;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <script href="/assets/bootstrap/css/bootstrap.min.css"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/main-script.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</head>
<body>
    
    <section class="py-5">
        <div class="container">
            <h1 class="text-center">MY GALLERY</h1>
            <div class="filtr-controls">
                <span class="active" onclick="get_page('')" data-filter="all">all </span>
                <span data-filter="1" onclick="get_page('veg')">Veg</span>
                <span data-filter="2" onclick="get_page('desert')">Desert </span>
                <span data-filter="3" onclick="get_page('desert')">Non Veg  </span></div>
                <form action="some_new.php" method="get"></form>
        </div>
    </section>
    <script>
        function get_page(param){
            console.log('clicked  '+param);
            url=window.location.href
            url=url.split("?")[0];
            if(param=="all")
            {
                console.log('lala');
                window.location.href=url;
                return
            }
            window.location.href=url+"?category="+param;
        }
    </script>
    <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>


        <div class="container">
            <h2 style="margin-top: 52px;margin-left: 34px;font-family: 'Open Sans', sans-serif;font-size: 22px;font-weight: 800;line-height: 32px;color: rgb(0,0,0);">Recent</h2>
            <div class="cust_bloglistintro">
                <p style="margin-left: 34px;color: rgba(255,255,255,0.5);font-size: 14px;"></p>
            </div>
            <div class="row">
        
                <?php
                if( isset($_GET['category']) )
                { 
                    $category=$_GET['category'];
                    $result=get_category($category);
                }
                else{
                    $result=get_vendors();
                }
                // approve_vendor("ujwalc");  
                if($result->num_rows > 0) { // output data of each row
                    while($row = $result->fetch_assoc()) { 
                        if($row['approved']){$approve_status="Approved";}else{$approve_status="Not Approved";}
                    echo '
                    <div class="col-md-4 cust_blogteaser" style="padding-bottom: 20px;margin-bottom: 32px;">
                    <a href="#">
                    <img class="img-fluid" style="height: 200px;padding-left: 40px;" src="chef2.jpg" /></a>
                    <h3 style="text-align: left;margin-top: 20px;font-family: \'Open Sans\', sans-serif;
                    font-size: 18px;margin-right: 0;margin-left: 24px;
                    line-height: 34px;letter-spacing: 0px;font-style: normal;font-weight: bold;">
                   '.$row["name"].'
                    <br />
                    </h3>
                    <p class="text-secondary" style="text-align: left;font-size: 14px;line-height: 22px;color: rgb(9,9,10);margin-left: 24px;">
                    '.$row["location"].'
                    </p>
                    
                    <p class="text-secondary" style="text-align: left;font-size: 14px;line-height: 22px;color: rgb(9,9,10);margin-left: 24px;">
                    '.$row["category"].'
                    </p>
                    
                    <p class="text-secondary" style="text-align: left;font-size: 14px;line-height: 22px;color: rgb(9,9,10);margin-left: 24px;">
                    '.$approve_status.'
                    </p>
                    <a class="h4" href="#"><i class="fa fa-arrow-circle-right" style="margin-left: 23px;"></i></a>
                    <button class="btn bg-success text-white  text-center d-block w-100 p-1 m-2 ml-3" onclick="call_fun(\'approve_vendor\',\''.$row["name"].'\')" type="button" >Approve</button>
                    <button class="btn bg-danger  text-white text-center d-block w-100  p-1 m-2" onclick="call_fun(\'disapprove_vendor\',\''.$row["name"].'\')" type="button">Disapprove</button>
                    </div>
                    ';
                    }
                    }
                ?>
            
            
            </div>
        </div>
    </div> 


    <script>
        function call_fun(fun,args){
          

            jQuery.ajax({
            type: "POST",
            url: 'functions.php',
            dataType: 'json',
            data: {functionname: fun, arguments: [args]},
            success: function (obj, textstatus) {
                        if( !('error' in obj) ) {
                            console.log("successfull")
                        }
                        else {
                            console.log(obj.error);
                        }
                    }
                });

                window.location.href=window.location.href;
            
        }

    </script>
</body>
</html>
