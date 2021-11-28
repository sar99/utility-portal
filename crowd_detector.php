<div style="margin-top: 7vh;">
    <img src="./img/food.png" style=" display: block; margin-left: auto; margin-right: auto; width: 900px; max-width: 80vw;"/>

    <div id="alert" class="alert alert-success" role="alert" style=" font-size: 2.5vh;width: 70vw;text-align: center;margin: auto;margin-bottom: 2vh;">
        Current number of students in the mess is <span id="number" style="font-size: 4vh;">0</span> and the maximum number of students allowed in the mess at once is 1
    </div>
<div>

<!-- JQuery CDN -->
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>



<!-- Script to fetch current number of people in mess continuously   -->
<script type="text/javascript">


    var pageExecute = {

    fileContents:"Null",
        pagePrefix:"Null",
        slides:"Null",

        init: function () {
            $.ajax({
                url: "../people-counting-opencv/current_peopl.txt",
                async: false,
                success: function (data){
                    pageExecute.fileContents = data;
                    console.log("hII");
                    console.log(data);
                }
            });
        }
    };

</script>


<!-- Script to change the alert features according to current number and threshold -->
<script > 
    // Fetching done every 1 second
    window.setInterval(function(){

        pageExecute.init();
        document.getElementById("number").innerHTML = (pageExecute.fileContents);
        console.log(pageExecute.fileContents);

        // Alert should be red if the number crosses the threshold limit
        if(pageExecute.fileContents >=2 )
        {
            if(document.getElementById("alert").classList.contains("alert-success"))
            {
                document.getElementById("alert").classList.remove("alert-success");
                document.getElementById("alert").classList.add("alert-danger");
            }
        }
        else
        {
            if(document.getElementById("alert").classList.contains("alert-danger"))
            {
                document.getElementById("alert").classList.remove("alert-danger");
                document.getElementById("alert").classList.add("alert-success");
            }
        }
    },1000); 
</script>