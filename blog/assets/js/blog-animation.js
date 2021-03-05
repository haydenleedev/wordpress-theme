var handleScroll = function () {
    const scrollTop = $(window).scrollTop();
    if ($(window).scrollTop() <= $('.blog-header, .single-blog-post-header').height() && $(window).width() > 768) {
        $('.blog-header, .single-blog-post-header').css({
            transform: `scale(${scrollTop / 2e3 + 1}) translateY(${scrollTop / 3 * -1}px)`,
            opacity: 1 - scrollTop / 400
        });
        $('.blog-header-container, .single-blog-header-title').css({
            transform: `translateY(${scrollTop / 3 * -1}px)`,
            opacity: 1 - scrollTop / 400
        })
    }
}
window.addEventListener('scroll', handleScroll);

var currentPage = 2, fetching = false;

// We add an event listener for when the page is scrolled
$(window).ready(function () {
    $('.blog-header-read.more').click(function () {
        if (!fetching) {
            fetching = true;
            var ajaxUrl = "/blog/page/" + currentPage;
            $.get(ajaxUrl, function (data) {
                var page = $(data);
                var posts = page.find('.blog-item');

                posts.each(function () {
                    $(this).addClass('animate')
                    var blogPost = $(this).wrap('<div></div>');
                    setTimeout(function () {
                        $('.blog-list-container').append(blogPost);
                    }, 100);
                });

                // There were no posts
                console.log(posts.length)
                if (posts.length < 10) {
                    $('.blog-header-read.more').hide()
                    return;
                }

                setTimeout(function () {
                    currentPage += 1;
                    fetching = false;
                }, 100);
            });
        }
    })
})