

<?php
/**
 * Template Name: GCP Page Template
 *
 */

get_header();
$class   = get_field('class');
?>
<main class="overlow-hidden">

    <?php get_template_part('template-parts/hero-new'); ?>

    <section id="primary" class="content-area<?php echo ' ' . $class; ?>">
        <article class="main no-overflow paragraph-wrapper container">

        <?php get_template_part('template-parts/flexible-content'); ?>


            <?php get_template_part('template-parts/footer-form-module'); ?>

</article><!-- #main -->
    </section><!-- #primary -->
</main>

<script>

/* Animate only once */
 const observer = new IntersectionObserver(entries => {
       entries.forEach(entry => {
           if (entry.isIntersecting) {
               entry.target.classList.add('is-inViewport');
               observer.unobserve(entry.target);
           }
       });
   });
   window.addEventListener('DOMContentLoaded', (event) => { 
        const sections =Array.from(document.querySelectorAll('[data-inviewport]'));
        for (let section of sections) {
        observer.observe(section);
        }
    });


/* Repeatable animation when scrolling */
document.addEventListener("DOMContentLoaded", () => {
    const inViewport = (entries, observer) => {
    entries.forEach(entry => {
        entry.target.classList.toggle("is-inView", entry.isIntersecting);
    });
    };

    const Obs = new IntersectionObserver(inViewport);
    const obsOptions = {}; //See: https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API#Intersection_observer_options

    // Attach observer to every [data-inviewport] element:
    const ELs_inViewport = document.querySelectorAll('.bounce');
    ELs_inViewport.forEach(EL => {
    Obs.observe(EL, obsOptions);
    });


 
});

// Start: Sticky header

$(document).ready (function () {
window.onscroll = function () {
  stickyHeader();
};
var header = document.querySelector(".header");
var sticky = header.offsetTop;
function stickyHeader() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
});
// END: Sticky header


 /*
document.addEventListener("DOMContentLoaded", () => {
    const inViewport = (entries, observer) => {
    entries.forEach(entry => {
        entry.target.classList.toggle("is-inViewport", entry.isIntersecting);
    });
    };

    const Obs = new IntersectionObserver(inViewport);
    const obsOptions = {}; //See: https://developer.mozilla.org/en-US/docs/Web/API/Intersection_Observer_API#Intersection_observer_options

    // Attach observer to every [data-inviewport] element:
    const ELs_inViewport = document.querySelectorAll('[data-inviewport]');
    ELs_inViewport.forEach(EL => {
    Obs.observe(EL, obsOptions);
    });
});
*/
</script>


<?php
get_footer();


