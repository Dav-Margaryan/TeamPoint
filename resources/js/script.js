const text = "TeamPoint";
const logo_letters = document.getElementById("logo_letters");

text.split("").forEach((char, i) => {
    const span = document.createElement("span");
    span.classList.add("letter");
    span.textContent = char;
    logo_letters.appendChild(span);

    setTimeout(() => {
        span.classList.add("show");
    }, i * 150);
});

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
      this.r = 5;
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
  var partical_count = 250;
  if(window.innerWidth < 786)
      partical_count = 65;
  for (let i = 0; i < partical_count; i++)
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


const observer = new MutationObserver(() => {
    const el = document.querySelector('#lqd-ext-chatbot-trigger-img');
    if (el) {
        if($('#lqd-ext-chatbot-trigger-img').is(":visible")) {
            console.log('Element appeared!', el);
            setTimeout(function (){
                $('#lqd-ext-chatbot-welcome-bubble').addClass('d-none')
                repeatJump()
            },10000)
            observer.disconnect(); // stop watching
        }
    }
});


function repeatJump(){
    console.log('jump')
    if(!$('[data-window-state="open"] #lqd-ext-chatbot-trigger').length)
        $('#lqd-ext-chatbot-trigger').addClass('jump')
    setTimeout(function () {
        if(!$('[data-window-state="open"] #lqd-ext-chatbot-trigger').length)
            $('#lqd-ext-chatbot-trigger').removeClass('jump')
        setTimeout(function () {
            repeatJump()
        }, 1000)
    }, 10000)

}

observer.observe(document.body, {
    childList: true,
    subtree: true
});

 $(document).ready(function(){
     document.querySelectorAll('input, textarea').forEach(el => {
         el.addEventListener('focus', () => {
             el.style.fontSize = '16px';
         });
         el.addEventListener('blur', () => {
             // optional: remove inline style if you want to revert
             el.style.fontSize = '';
         });
     });

     const mascot = document.getElementById('mascot');
     const modal = document.getElementById('modal');
     const closeBtn = document.getElementById('closeBtn');
     const bubble = document.getElementById('bubble');
     const eyeLeft = document.getElementById('eye-left');
     const eyeRight = document.getElementById('eye-right');

     let direction = 1;
     const pauseTime = 5000;
     const runDuration = 5000;

     function moveMascot() {
         const windowWidth = window.innerWidth;
         const mascotWidth = mascot.offsetWidth;
         const start = direction > 0 ? 25 : windowWidth - mascotWidth - 25;
         const end = direction > 0 ? windowWidth - mascotWidth - 25 : 25;

         // Start running
         mascot.style.left = start + 'px';
         mascot.classList.add('running'); // add running animation
         // Add running class to legs
         document.querySelectorAll('#legs rect')[0].classList.add('running-leg-left');
         document.querySelectorAll('#legs rect')[1].classList.add('running-leg-right');

         setTimeout(() => { mascot.style.left = end + 'px'; }, 50);

         setTimeout(()=>{
             // Stop running
             mascot.classList.remove('running');
             document.querySelectorAll('#legs rect')[0].classList.remove('running-leg-left');
             document.querySelectorAll('#legs rect')[1].classList.remove('running-leg-right');

             // Start jump and tooltip
             mascot.classList.add('jump');
             bubble.classList.add('show');

             $('#mascot').css("z-index",'9999999999999999999999999')
             setTimeout(()=>{
                 // End jump and greeting
                 mascot.classList.remove('jump');
                 bubble.classList.remove('show');
                 direction*=-1;
                 // moveMascot();
             }, pauseTime);
         }, runDuration);
     }

     moveMascot();

// Modal click
     mascot.addEventListener('click', ()=>{ $("#modal_feedback").modal('show') });

// Eyes follow cursor
     document.addEventListener('mousemove', e=>{
         const rect = mascot.getBoundingClientRect();
         const cx = rect.left + rect.width/5;
         const cy = rect.top + 110; // approx eye center
         const dx = e.clientX - cx;
         const dy = e.clientY - cy;
         const dist = Math.min(4, Math.hypot(dx,dy)/15);
         const angle = Math.atan2(dy,dx);
         eyeLeft.setAttribute('cx', 158 + Math.cos(angle)*dist);
         eyeLeft.setAttribute('cy', 112 + Math.sin(angle)*dist);
         eyeRight.setAttribute('cx', 202 + Math.cos(angle)*dist);
         eyeRight.setAttribute('cy', 112 + Math.sin(angle)*dist);
     });


     $(document).on('mouseenter','.tp-root',function (){
         bubble.classList.add('show')
     })
     $(document).on('mouseleave','.tp-root',function (){
         bubble.classList.remove('show');
     })



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

     $(document).on("click","form .fa-eye,.fa-eye-slash",function (){
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

     $(document).on('click','.multi_lang_content .languages div',function (){
         var selected_lang = $(this).data('lang');
         $(".languages div").each(function (){
             $(this).removeClass('active')
         })
         $(this).addClass('active')
         $(".lang_blocks .block").each(function (){
             if($(this).data('lang-block') != selected_lang) {
                 $(this).addClass('d-none');
             }else {
                 $(this).removeClass('d-none')
             }
         })
     })
     $('.navbar-toggler-icon').on('click', function() {
         $(this).toggleClass('active');
     });
     function changeColor(light,is_click){
         if(light == 'on'){
             $("body").attr('light','off');
             $("body").css({'background-color':'#0f172a','color':'white'})
             $(".navbar").css({'background-color':'black','color':'white'})
             $(".nav-link").css({'color':'white'})
             $("#logo_letters").css('color','white')
             $('.navbar-toggler-icon').removeClass('dark')
             $('.navbar-toggler').css('border','1px solid white')
             $('.fa-lightbulb').css('color','white')
             $('.mobile_lang_collapse').css('color','white')
             // $('#lqd-ext-chatbot-wrap[data-ready=true] #lqd-ext-chatbot-welcome-bubble').css('color','white !important')
             $('.person_account_mobile').css('color','white')
             $("#lqd-ext-chatbot-wrap[data-ready=true] #lqd-ext-chatbot-welcome-bubble").css('color','white')

             if(is_click) {
                 sessionStorage.removeItem("page_light")
                 sessionStorage.setItem("page_light", "on");
             }
         }else{
             $("body").attr('light','on');
             $("body").css({'background-color':'white','color':'black'})
             $(".navbar").css({'background-color':'white','color':'white'})
             $(".nav-link").css({'color':'#595959FF'})
             $("#logo_letters").css('color','black')
             $('.navbar-toggler-icon').addClass('dark')
             $('.fa-lightbulb').css('color','greenyellow')
             $('.mobile_lang_collapse').css('color','black')
             $('.person_account_mobile').css('color','black')
             $('#lqd-ext-chatbot-wrap[data-ready=true] #lqd-ext-chatbot-welcome-bubble').css('color','black')

             // $("#lqd-ext-chatbot-wrap[data-ready=true] #lqd-ext-chatbot-welcome-bubble").css('color','#595959FF')
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
         if($(this).attr('id') != 'navbarCollapse')
            $(this).closest('div').parent().find(".fa-chevron-down").toggleClass('rot')
     });

     $('.collapse').on('hide.bs.collapse', function (e) {
         if($(this).attr('id') != 'navbarCollapse')
            $(this).closest('div').parent().find(".fa-chevron-down").toggleClass('rot')
     });


     document.addEventListener('click', () => {
         document.querySelectorAll('.menu-popup').forEach(p => p.style.display = 'none');
         $('.collapse').each(function (){
             if($(this).hasClass('show') && $(this).attr('id') != 'navbarCollapse'  && $(this).attr('id') != 'collapseResponse') {
                 $(this).collapse('hide')
                 // $(this).closest('div').parent().find(".fa-chevron-down").toggleClass('rot')
             }
         })
     });

     $(document).on("click",".attach_button",function (){
         $(this).closest('div').find('input').click();
     })

     $(document).on('change','.attach_image',function (){
         const previewImage = $(this).closest('div').find('.general_image')

         console.log(previewImage)
         const file = $(this)[0].files[0];
         console.log()
         if (file) {
             const reader = new FileReader();

             reader.onload = function(e) {
                 previewImage.css('background-image','url('+e.target.result+')');
                 // previewImage.css('display','block');
             };

             reader.readAsDataURL(file);
         }
     })

     document.querySelectorAll('.modal-dialog').forEach(dialog => {
         const header = dialog.querySelector('.modal-header');

         if(header) {
             let offsetX = 0, offsetY = 0, isDown = false;

             header.style.cursor = "move";

             header.addEventListener('mousedown', e => {
                 isDown = true;
                 offsetX = dialog.offsetLeft - e.clientX;
                 offsetY = dialog.offsetTop - e.clientY;
             });

             document.addEventListener('mouseup', () => isDown = false);

             document.addEventListener('mousemove', e => {
                 if (isDown) {
                     dialog.style.left = e.clientX + offsetX + 'px';
                     dialog.style.top = e.clientY + offsetY + 'px';
                     dialog.style.position = "absolute";
                 }
             });
         }
     });
 });



 //// JS
 // async function sendMessage(message){
 //     const response = await fetch('send_message.php', {
 //         method: 'POST',
 //         headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
 //         body: `message=${encodeURIComponent(message)}`
 //     });
 //     const result = await response.text(); // կամ response.json()
 //     console.log(result); // տեսնում ես ինչ վերադարձավ
 // }

 // const data = await response.json();
 // console.log(data.message, data.id);