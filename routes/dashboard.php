<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../index.html");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not Voted</b>';
    }
    else{
        $status = '<b style="color:green">Voted</b>';
    }
?>

<html>
    <head>
        <title>E-VOTING - Dashboard</title>
        <link rel="stylesheet" href="../routes/css/style.css">
</head>
<body>

<style>
    #backbtn{
        padding: 5px;
        font-size: 15px;
        border-radius: 5px;
        background-color: 21094e ;
        color: white;
        border-radius: 5px;
        float:left;
        margin: 10px;

    }

    #logoutbtn{
        padding: 5px;
        font-size: 15px;
        border-radius: 5px;
        background-color: 21094e ;
        color: white;
        border-radius: 5px;
        float:right;
        margin: 10px;
    }

    #Profile{
        background-color: white;
        width: 30%;
        padding: 20px;
        float: left;
        border-radius: 20px;
        border-style: dotted;
    }

    #Group{
        background-color: white;
        width: 60%;
        padding: 20px;
        float: right;
        border-radius: 20px;
        border-style: dotted;
    }

    #votebtn{
        padding: 5px;
        font-size: 15px;
        border-radius: 5px;
        background-color: 3edbf0;
        border-radius: 5px;
        width: 60px;
        cursor: pointer;
    }

    #mainpanel{
        padding: 10px;
    }

    #voted{
        padding: 5px;
        font-size: 15px;
        border-radius: 5px;
        background-color: green;
        border-radius: 5px;
        color: white;
    }

    

</style>

<div id="mainSection">
    <center>
    <div id="headerSection">
        <a href="../index.html"><button id="backbtn"> Back</button></a>
        <a href="logout.php"><button id="logoutbtn"> Logout</button></a>
        <h1>E-VOTING</h1>
    </div>
    </center> 
    <hr>

    <div id="mainpanel">
    <div id="Profile">
        <center><img src="uploads/<?php echo $userdata['photo'] ?>" height="130" width="130"></center><br><br>
        <b>Name:</b> <?php echo $userdata['name']?> <br><br>
        <b>Mobile:</b> <?php echo $userdata['mobile']?> <br><br>
        <b>Address:</b> <?php echo $userdata['address']?> <br><br>
        <b>Status:</b> <?php echo $status?> <br><br>
    </div>
    <div id="Group">
        <?php
            if($_SESSION['groupsdata']){
                for($i=0; $i<count($groupsdata); $i++){
                    ?>
                    <div>
                        <img style="float: right" src="uploads/<?php echo $groupsdata[$i]['photo'] ?>" height="110" width="110">
                        <b>Group Name: </b><?php echo $groupsdata[$i]['name'] ?><br><br> 
                        <b>Votes: </b><?php echo $groupsdata[$i]['votes'] ?><br><br> 
                        <form action="api/vote.php/" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">
                            <?php
                            if($_SESSION['userdata']['status']==0){
                                ?>
                                 <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                <?php 
                               
                            }
                            else{
                                ?>
                                 <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                <?php 
                               
                            }
                            ?>
                           
                        </form>
                    </div>
                    <hr>
                    <?php
                }
            }
            else{

            }

        ?>

    </div>
    </div>
    

</div>


    
    
</body>



</html>