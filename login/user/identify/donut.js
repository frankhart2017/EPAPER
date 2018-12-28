$(document).ready(function(){



  render_chart();

  // if(completion_status == "0"){
  //
  //   $('.tap-target').tapTarget('open');
  //
  // }
  //
  // $("#menu").addClass("hide");
  //
  // if(completion_status != "1"){
  //
  //   $("#detailed_report").addClass("hide");
  //
  // }

});

function  render_chart(){

var data = [
      {label:"Mindset",count:14.25, percentage:14.25,color: '#9E9E9F'},
        {label:"Learning",count:14.25, percentage:14.25,color: '#EEB518'},
        {label:"Thinking",count:14.25,percentage:14.25,color: '#247065'},
        {label:"Personality",count:14.5, percentage:14.5,color: '#F0852C'},
        {label:"Reflection",count:14.25, percentage:14.25,color: '#4A148C'},
        {label:"Leisure",count:14.25, percentage:14.25,color: '#1A237E'},
        {label:"Work",count:14.25, percentage:14.25,color: '#004D40'},
    ];
    var totalCount = "eResearch"   //calcuting total manually

    var width = 940,
    height = 640,
    radius = 270;

    var arc = d3.arc()
      .outerRadius(radius - 10)
      .innerRadius(140);

    var pie = d3.pie()
      .sort(null)
      .value(function(d) {
          return d.count;
      });

    var svg = d3.select('#donut').append("svg")
      .attr("width", width)
      .attr("height", height)
      .call(responsivefy)
      .append("g")
      .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

    var g = svg.selectAll(".arc")
      .data(pie(data))
      .enter().append("g");

    g.append("path")
      .attr("d", arc)
      .style("fill", function(d,i) {
        return d.data.color;
      })
       //to direct to pages
      .on("click", function(d,i){
        if(d.data.label == "Mindset") {
          window.location.href = "mindset.php";
        }
        if(d.data.label == "Learning") {
          window.location.href = "learning.php";
        }
        if(d.data.label == "Thinking") {
          window.location.href = "thinking.php";
        }
        if(d.data.label == "Personality") {
          window.location.href = "personality.php";
        }
        if(d.data.label == "Reflection") {
          window.location.href = "reflection.php";
        }
        if(d.data.label == "Leisure") {
          window.location.href = "leisure.php";
        }
        if(d.data.label == "Work") {
          window.location.href = "work.php";
        }
      })
      .on("mousemove",function(d){
         d3.select(this).style("opacity",.90);
         d3.select(this).style("stroke","brown");

      })
      .on("mouseout",function(d){
        d3.select(this).style("opacity",1);
        d3.select(this).style("stroke","none");
      });
     //for text
    g.append("text")
      .attr("transform", function(d) {
        var _d = arc.centroid(d);
        _d[0] *= 1;
        _d[1] *= 1;
        return "translate(" + _d + ")";
      })
    //to direct to pages
    .on("click", function(d,i){
        if(d.data.label == "Mindset") {
          window.location.href = "mindset.php";
        }
        if(d.data.label == "Learning") {
          window.location.href = "learning.php";
        }
        if(d.data.label == "Thinking") {
          window.location.href = "thinking.php";
        }
        if(d.data.label == "Personality") {
          window.location.href = "personality.php";
        }
        if(d.data.label == "Reflection") {
          window.location.href = "reflection.php";
        }
        if(d.data.label == "Leisure") {
          window.location.href = "leisure.php";
        }
        if(d.data.label == "Work") {
          window.location.href = "work.php";
        }
      })

    .attr("fill","white")
      .attr("dy", ".50em")
      .attr('font-size', '1.5em')
      .style("text-anchor", "middle")
      .text(function(d) {
        return d.data.label;
      });

    g.append("text")
     .attr("text-anchor", "middle")
     .attr('font-size', '3.5em')
     .attr('y', 20)
     .text(totalCount);


    // to make it responsive for all devices
    function responsivefy(svg)
    {
    // get container + svg aspect ratio
    var container = d3.select(svg.node().parentNode),
        width = parseInt(svg.style("width")),
        height = parseInt(svg.style("height")),
        aspect = width / height;

    // add viewBox and preserveAspectRatio properties,
    // and call resize so that svg resizes on inital page load
    svg.attr("viewBox", "0 0 " + width + " " + height)
        .attr("perserveAspectRatio", "xMinYMid")
        .call(resize);

    // to register multiple listeners for same event type,
    // you need to add namespace, i.e., 'click.foo'
    // necessary if you call invoke this function for multiple svgs
    // api docs: https://github.com/mbostock/d3/wiki/Selections#on
    d3.select(window).on("resize." + container.attr("id"), resize);

    // get width of container and resize svg to fit it
    function resize() {
        var targetWidth = parseInt(container.style("width"));
        svg.attr("width", targetWidth);
        svg.attr("height", Math.round(targetWidth / aspect));
    }
   }

}
