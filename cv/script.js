$(document).ready(function () {
    // Smooth scroll for any future navigation
    $('a').click(function (e) {
        if (this.hash) {
            e.preventDefault();
            const target = this.hash;
            $('html, body').animate(
                {
                    scrollTop: $(target).offset().top,
                },
                800
            );
        }
    });

    // Log a message when the page is ready
    console.log("CV Page is Ready!");
});
