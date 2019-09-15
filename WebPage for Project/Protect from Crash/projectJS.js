window.onload=function(){
      
    var particles = Particles.init({
    selector: '.background',
    maxParticles: 350,
    speed: 0.215,
    color: ['#ff00ff', '#0000ff'],
    connectParticles: true,
    responsive: [{
      breakpoint: 1200,
      options: {
        color: '#000000',
        speed: 0.5,
        sizeVariations: 6,
        maxParticles: 250,
        connectParticles: true
      }},{

        breakpoint: 1000,
      options:{
        color: '#00C9B1',
        speed: 1,
        maxParticles: 100,
        connectParticles: false
      }
      },{
      
        breakpoint: 800,
        options:{
          color: '#00C9B1',
          speed: 10,
          sizeVariation: 10,
          maxParticles: 100,
          connectParticles:false
        }        
    }]
  });
}

var checked = $(".cbox");

checked.click(function() {
  if (checked.prop("checked")) {
    $(".add").text("Hit Enter to Submit");
  }

  if (!checked.prop("checked")) {
    $(".message").val("");
    $(".add").text("Add Comment");
  }
});
