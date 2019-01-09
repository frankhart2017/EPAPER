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

function  render_chart(colors = [0, 0, 0, 0, 0, 0, 0, 0]){

var color_code = ["#f44336", "#ffeb3b", "#4caf50"];

var data = [
        {label:"Abstract",count:12.5, percentage:12.5,color: color_code[colors[0]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
        {label:"Introduction",count:12.5, percentage:12.5,color: color_code[colors[1]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
        {label:"Analysis",count:12.5,percentage:12.5,color: color_code[colors[2]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
        {label:"Design",count:12.5, percentage:12.5,color: color_code[colors[3]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
        {label:"Development",count:12.5, percentage:12.5,color: color_code[colors[4]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
        {label:"Implement",count:12.5, percentage:12.5,color: color_code[colors[5]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
        {label:"Evaluation",count:12.5, percentage:12.5,color: color_code[colors[6]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
        {label:"Conclusion",count:12.5, percentage:12.5,color: color_code[colors[7]]},
        {label:"",count:0.1, percentage:0.1,color: '#ffffff'},
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
        if(d.data.label == "Abstract") {
          window.location.href = "abstract.php";
        }
        if(d.data.label == "Introduction") {
          window.location.href = "introduction.php";
        }
        if(d.data.label == "Analysis") {
          window.location.href = "analysis.php";
        }
        if(d.data.label == "Design") {
          window.location.href = "design.php";
        }
        if(d.data.label == "Development") {
          window.location.href = "development.php";
        }
        if(d.data.label == "Implement") {
          window.location.href = "implement.php";
        }
        if(d.data.label == "Evaluation") {
          window.location.href = "evaluation.php";
        }
        if(d.data.label == "Conclusion") {
          window.location.href = "conclusion.php";
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
        if(d.data.label == "Abstract") {
          window.location.href = "abstract.php";
        }
        if(d.data.label == "Introduction") {
          window.location.href = "introduction.php";
        }
        if(d.data.label == "Analysis") {
          window.location.href = "analysis.php";
        }
        if(d.data.label == "Design") {
          window.location.href = "design.php";
        }
        if(d.data.label == "Development") {
          window.location.href = "development.php";
        }
        if(d.data.label == "Implement") {
          window.location.href = "implement.php";
        }
        if(d.data.label == "Evaluation") {
          window.location.href = "evaluation.php";
        }
        if(d.data.label == "Conclusion") {
          window.location.href = "conclusion.php";
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
