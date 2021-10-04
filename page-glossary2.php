<?php
/**
 * Template Name: Glossary Template2
 *
 */

get_header();
$class   = get_field('class');
?>

    <?php get_template_part('template-parts/hero'); ?>



    <section id="primary" class="w-800px content-area<?php echo ' ' . $class; ?>">
        <main class="main no-overflow paragraph-wrapper container">

        <div class="grid-container">
            <h1 class="glossary-title">Glossary of Contact Center Terms</h1>
            <nav class="alpha-tag-nav">
                <ul class="alpha-tags">
                </ul>
            </nav>

            <div id="display"></div>
        </div>

        <script>
            var sf = "https://docs.google.com/spreadsheets/d/1UGrgQOt2I6cwVFw1rDCU05bDy0TDHR5ve_BisOxOLRI/gviz/tq?tqx=out:json";
            $.ajax({url: sf, type: 'GET', dataType: 'text'})
            .done(function(data) {
            const r = data.match(/google\.visualization\.Query\.setResponse\(([\s\S\w]+)\)/);
            if (r && r.length == 2) {
                const obj = JSON.parse(r[1]);
                const table = obj.table;
                const header = table.cols.map(({id}) => id);
                const rows = table.rows.map(({c}) => c.map(({v}) => v));

                console.log(header);
                console.log(rows);
            }
            })
            .fail((e) => console.log(e.status));
            </script>


        <script>

                let titleData = []; 
                let navData = []; 

                console.log('DOM fully loaded and parsed');
                
                const jsonData="../wp-content/themes/ujet/convertcsv2.json";
                var myList = document.querySelector('#display');
                var navMenu = document.querySelector('.alpha-tags');

                const alphaBets = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

                fetch(jsonData)
                .then(function(response) {
                if (!response.ok) {
                    throw new Error("HTTP error, status = " + response.status);
                }
                return response.json();
                })
                .then(function(json) {
                    navMenu.innerHTML = json.map((data, index) => {
                        let nav = (navData.includes(data.id)) ? 
                        ""
                        :  '<li><a href="#' + data.id + '">' + data.id + '</a></li>';
                        navData.push(data.id);
                        return nav;
                    }).join(''); 

                    myList.innerHTML =  json.map(function (data, index) {
                        let title =  (titleData.includes(data.id)) ? 
                        ""
                        :  ('<h2 id="' + data.id + '" class="css-0"><a href="#' + data.id + '" class="glossary-anchor"><svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>' + data.id + '</h2>');
                        titleData.push(data.id);

                        let dataTitle = data.title.replace(/[- )(]/g, '-').toLowerCase();

                        let body = '<h3 id="' + dataTitle + '" class="css-0 text-blue text-600 text-20px"><a href="#' + dataTitle + '" aria-label="ast permalink" class="glossary-anchor"><svg aria-hidden="true" focusable="false" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>' + data.title + '</h3><p>' + data.desc + '</p>';
                        return title + body;

                     }).join('');     
                }).then (function click() {
                    const alphaTags = document.querySelectorAll(".alpha-tags a");

                    for (let i = 0; i < alphaTags.length; i++) {
                        alphaTags[i].addEventListener("click", function() {
                            
                            // 1. Remove Class from All Lis
                            for (let alphaTag of alphaTags) {
                                alphaTag.classList.remove('selected');
                                console.log('class removed');
                            }

                            alphaTags[i].classList.remove('selected');
                            alphaTags[i].classList.add("selected");
                        })
                    }

                    $(".alpha-tags a").on('click', function(event) {
                        if (this.hash !== "") {
                        event.preventDefault();
                        let linkHash = this.hash;
                        $('html, body').animate({
                            scrollTop: $(linkHash).offset().top - 173
                        }, 500, function(){
                        });
                        } // End if
                    });
                    $("#display a").on('click', function(event) {
                        if (this.hash !== "") {
                        event.preventDefault();
                        let linkHash = this.hash;
                        $('html, body').animate({
                            scrollTop: $(linkHash).offset().top - 185
                        }, 500, function(){
                        });
                        } // End if
                    });

                }
                
                );

                

        </script>

        </main><!-- #main -->
    </section><!-- #primary -->


<?php
get_footer();
