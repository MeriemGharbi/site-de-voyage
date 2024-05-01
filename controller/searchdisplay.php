<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="search">
    <label>
    
        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." oninput="handleSearchInput()">
</label>

        <div id="searchresult"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                    var input =$(this).val();
                   // alert(input);
                   if(input!=""){
                    $.ajax({
                        url:"livesearch.php",
                        method:"POST",
                        data:{input:input},
                        success:function(data){
                            $("#searchresult").html(data);
                        }
                    });
                   }
                else{
                    $("#searchresult").css("display","none");
                }
            });
        });
    

</script>
        </body>
        </html>