 const canvas = document.getElementById('bg');
  const ctx = canvas.getContext('2d');
  let width, height;

  function resize() {
    width = canvas.width = window.innerWidth-10;
    height = canvas.height = window.innerHeight;
  }
  window.addEventListener('resize', resize);
  resize();

  // Particle class
  class Particle {
    constructor() {
      this.x = Math.random() * width;
      this.y = Math.random() * height;
      this.vx = (Math.random() - 0.5) * 1;
      this.vy = (Math.random() - 0.5) * 1;
      this.r = 2;
    }
    move() {
      this.x += this.vx;
      this.y += this.vy;
      if (this.x < 0 || this.x > width) this.vx *= -1;
      if (this.y < 0 || this.y > height) this.vy *= -1;
    }
    draw() {
      ctx.beginPath();
      ctx.arc(this.x, this.y, this.r, 0, Math.PI*2);
      ctx.fillStyle = "#3B82F6";
      ctx.fill();
    }
  }

  const particles = [];
  for (let i = 0; i < 70; i++)
    particles.push(new Particle());

  function dist(p1, p2) {
    const dx = p1.x - p2.x;
    const dy = p1.y - p2.y;
    return Math.sqrt(dx*dx + dy*dy);
  }

  function animate() {
    ctx.clearRect(0,0,width,height);

    // move & draw particles
    for (let p of particles) {
      p.move();
      p.draw();
    }

    // draw connections
    for (let i=0; i<particles.length; i++) {
      for (let j=i+1; j<particles.length; j++) {
        const d = dist(particles[i], particles[j]);
        if (d < 150) {
          const t = 1 - d/150; // closer = bigger
          ctx.strokeStyle = `rgba(16,185,129,${t})`; // green with alpha
          ctx.lineWidth = 0.5 + 2.5 * t; // line thickness changes
          ctx.beginPath();
          ctx.moveTo(particles[i].x, particles[i].y);
          ctx.lineTo(particles[j].x, particles[j].y);
          ctx.stroke();
        }
      }
    }

    requestAnimationFrame(animate);
  }

  animate();


 $(document).ready(function(){

     var light = sessionStorage.getItem("page_light");
     if(light)
         changeColor(light,false)


     var items_in_carousel = $(window).width() < 992? 2: 4;
     $('[data-ban="carousel1"]').owlCarousel({
         items:items_in_carousel,
         loop:true,
         margin:10,
         autoplay:true,
         autoplayTimeout:2000,
         autoplayHoverPause:true
     });
     $('[data-ban="carousel2"]').owlCarousel({
         items:items_in_carousel,
         loop:true,
         margin:10,
         autoplay:true,
         rtl: true,
         autoplayTimeout:2000,
         autoplayHoverPause:true
     });

     $(document).on('click','.light-on-off',function(){
         if($(this).data('light') == 'on'){
             $(this).attr('data-light','off')
         }else{
             $(this).attr('data-light','on')
         }
     })

     $(document).on("click",".fa-eye,.fa-eye-slash",function (){
         if($(this).hasClass('fa-eye')) {
             $(".fa-eye-slash").removeClass('d-none')
             $('[type="password"]').attr('type','text')
         }else {
             $(".fa-eye").removeClass('d-none')
             $('[type="text"]').attr('type','password')
         }

         $(this).addClass('d-none')
     })

     $(document).on('click','.fa-lightbulb',function (){
         changeColor($("body").attr('light'),true)
     })

     function changeColor(light,is_click){
         if(light == 'on'){
             $("body").attr('light','off');
             $("body").css({'background-color':'black','color':'white'})
             $(".navbar").css({'background-color':'black','color':'white'})
             $(".nav-link").css({'color':'white'})
             $(".black_letters").addClass('d-none')
             $(".white_letters").removeClass('d-none')
             if(is_click) {
                 sessionStorage.removeItem("page_light")
                 sessionStorage.setItem("page_light", "on");
             }
         }else{
             $("body").attr('light','on');
             $("body").css({'background-color':'white','color':'black'})
             $(".navbar").css({'background-color':'white','color':'white'})
             $(".nav-link").css({'color':'#595959FF'})
             $(".white_letters").addClass('d-none')
             $(".black_letters").removeClass('d-none')
             if(is_click) {
                 sessionStorage.removeItem("page_light")
                 sessionStorage.setItem("page_light", "off");
             }
         }
     }

    $(document).on('input','.fast_search',function (){
        if($('.fast_search').val().length > 2) {
            $(".collapse_text_block h2").each(function () {
                if (!$(this).text().toUpperCase().includes($(".fast_search").val().toUpperCase()))
                    $(this).closest('.collapse_text_block').addClass('d-none')
                else
                    $(this).closest('.collapse_text_block').removeClass('d-none')
            })

            if($(".collapse_text_block h2:visible").length == 0)
                $('.data_not_found').removeClass('d-none')
            else
                $('.data_not_found').addClass('d-none')
        }else {
            $(".collapse_text_block h2").each(function () {
                $(this).closest('.collapse_text_block').removeClass('d-none')
            })
            $('.data_not_found').addClass('d-none')
        }
    })


     $('.collapse').on('show.bs.collapse', function (e) {
         $(this).stop().slideDown(1000); // open in 1 second
     });

     $('.collapse').on('hide.bs.collapse', function (e) {
         $(this).stop().slideUp(1000); // close in 1 second
     });
 });