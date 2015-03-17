<html>
<head>
</head>
<body>
<div id='stars'></div>
<style type='text/css'>
<!-- class with full star -->
.staron
{
    float: left;
    height: 16px;
    width: 16px;
    background-image: url(./images/stars.png);
    background-position: 0px 16px;
}
<!-- class with empty star -->
.staroff
{
    float: left;
    height: 16px;
    width: 16px;
    background-image: url(./images/stars.png);
    background-position: 0px 0px;
}
</style>
<script type='text/javascript'>
//we pass id of star where mouse cursor is
//and change class for every previous star
function star(rate)
{
    for(var i = 1; i <= rate; i++)
    {
        document.getElementById("rate_" + i).setAttribute("class", "staron");
    }
}
//we change class of all stars back to empty star
function unstar(max)
{
    for(var i = 1; i <= max; i++)
    {
        document.getElementById("rate_" + i).setAttribute("class", "staroff");
    }
}
//generate stars
//first param - amount of stars
//second param - id of div where to attach stars
function generate_stars(max, attach)
{
    //get div container
    var container = document.getElementById(attach);
    for(var i = 1; i <= max; i++)
    {
        //create star
        var div = document.createElement("div");
        div.setAttribute("class", "staroff");
        div.setAttribute("id", "rate_" + i);
        //set events
        div.setAttribute("onmouseover", "star(" + i + ")");
        div.setAttribute("onmouseout", "unstar(" + max + ")");
        //append child to contaner
        container.appendChild(div);
    }
     
}
generate_stars(5, "stars");
</script>
</body>
</html>