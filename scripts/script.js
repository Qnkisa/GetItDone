var menu = document.getElementById("menu");
var hamburger = document.getElementById("hamburger");

hamburger.addEventListener("click",function(){
    hamburger.classList.toggle("active");
    menu.classList.toggle("active");
});

var bragSection = document.querySelectorAll(".brag-div");
var testimonials = document.querySelectorAll(".testimonial");

const observer = new IntersectionObserver(entries=>{
    entries.forEach(entry=>{
        if(entry.isIntersecting){
            entry.target.classList.add("active");
        }
    });
});

bragSection.forEach(brag=>{
    observer.observe(brag);
});

testimonials.forEach(testimonial=>{
    observer.observe(testimonial);
});





var faq1 = document.getElementById("faq1");
var faq2 = document.getElementById("faq2");
var faq3 = document.getElementById("faq3");
var faq4 = document.getElementById("faq4");

var faqp1 = document.getElementById("faqp1");
var faqp2 = document.getElementById("faqp2");
var faqp3 = document.getElementById("faqp3");
var faqp4 = document.getElementById("faqp4");

faq1.addEventListener("click",function(){
    faqp1.style.display = "block";
    faqp2.style.display = "none";
    faqp3.style.display = "none";
    faqp4.style.display = "none";
});

faq2.addEventListener("click",function(){
    faqp1.style.display = "none";
    faqp2.style.display = "block";
    faqp3.style.display = "none";
    faqp4.style.display = "none";
});

faq3.addEventListener("click",function(){
    faqp1.style.display = "none";
    faqp2.style.display = "none";
    faqp3.style.display = "block";
    faqp4.style.display = "none";
});

faq4.addEventListener("click",function(){
    faqp1.style.display = "none";
    faqp2.style.display = "none";
    faqp3.style.display = "none";
    faqp4.style.display = "block";
});