<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Activity</title>
    <link rel="stylesheet" href="../view/backoffice/assets/css/style.css">
</head>
<body>


 <!-- ========================= TODO: recherche ==================== -->
    
<div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
    <div class="search">
             <label>
                <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search..." oninput="handleSearchInput()">
             </label>

        <div id="searchresult"></div>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function(){
                    // Function to handle search input changes
                    function handleSearchInput() {
                        var input = $("#live_search").val();
                        // Store the search value in localStorage
                        localStorage.setItem('searchValue', input);
                    }
                    // Attach the handleSearchInput function to the input element's input event
                    $("#live_search").on('input', function() {
                        handleSearchInput();

                        var input = $(this).val();
                        if(input != ""){
                            $.ajax({
                                url:"livesearch.php",
                                method : "POST",
                                data:{input:input},
                                success:function(data){
                                    // Hide the existing activities container
                                    $(".table-container").hide();
                                    // Show the search results container
                                    $("#searchresult").html(data).show();
                                }
                            });
                        } else {
                            // If the input is empty, show all results again
                            $.ajax({
                                url:"showactivity.php", // Change the URL to the PHP file that fetches all results
                                method : "POST",
                                success:function(data){
                                    // Show the existing activities container
                                    $(".table-container").show();
                                    // Hide the search results container
                                    $("#searchresult").html("").hide();
                                }
                            });
                        }
                    });

                    // Check if there is a stored search value
                    var storedSearch = localStorage.getItem('searchValue');
                    if (storedSearch) {
                        // Populate the search input field with the stored value
                        $("#live_search").val(storedSearch);
                    }
                });
            </script>    
   </div>
    <div id="search-results"></div>
 <!-- ========================= TODO: logo ==================== -->
                <div class="logo">
                    <img src="backoffice/img/xplore.png" alt="">
                </div>
</div> 
 <!-- ========================= TODO: call for showactivity file==================== -->

<?php
 error_reporting(0);
include '../controller/activite/showActivity.php';

?>

